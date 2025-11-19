<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $team = json_decode(Storage::get('public/data/team.json'), true);
        $film = json_decode(Storage::get('public/data/film.json'), true);
        $news = json_decode(Storage::get('public/data/news.json'), true);

        usort($news, function ($a, $b) {
            return strtotime($b['created_at']) - strtotime($a['created_at']);
        });


        return view('welcome', [
            'team' => $team,
            'film' => $film,
            'news' => $news
        ]);
    }
}
