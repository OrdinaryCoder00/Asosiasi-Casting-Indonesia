<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class VideoStreamController extends Controller
{
    public function stream(Request $request, $filename)
    {
        $path = storage_path('app/public/casting_submissions/' . $filename);

        if (!file_exists($path)) {
            abort(404);
        }

        $size = filesize($path);
        $start = 0;
        $length = $size;
        $status = 200;

        if ($request->headers->has('range')) {
            $range = $request->header('range');
            preg_match('/bytes=(\d+)-(\d*)/', $range, $matches);
            $start = intval($matches[1]);
            $end = isset($matches[2]) && $matches[2] !== '' ? intval($matches[2]) : $size - 1;
            $length = $end - $start + 1;
            $status = 206;
        }

        $response = new StreamedResponse(function () use ($path, $start, $length) {
            $handle = fopen($path, 'rb');
            fseek($handle, $start);
            $buffer = 1024 * 8; // 8KB
            $bytesSent = 0;

            while (!feof($handle) && $bytesSent < $length) {
                $read = min($buffer, $length - $bytesSent);
                echo fread($handle, $read);
                flush();
                $bytesSent += $read;
            }

            fclose($handle);
        }, $status);

        $response->headers->set('Content-Type', 'video/mp4');
        $response->headers->set('Accept-Ranges', 'bytes');
        $response->headers->set('Content-Length', $length);
        $response->headers->set('Content-Range', "bytes $start-" . ($start + $length - 1) . "/$size");

        return $response;
    }
}