<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CastingSubmission extends Model
{
    protected $fillable = [
        'fullname','dob','gender','height','weight','phone','email','city',
        'portfolio','projects','skills','languages','category','photo','video',
        'confirmed_info','confirmed_permission'
    ];

    protected static function booted()
    {
        static::deleting(function ($submission) {
            if ($submission->photo && Storage::disk('public')->exists($submission->photo)) {
                Storage::disk('public')->delete($submission->photo);
            }
            if ($submission->video && Storage::disk('public')->exists($submission->video)) {
                Storage::disk('public')->delete($submission->video);
            }
            $userFolder = 'casting_submissions/' . strtolower(str_replace(' ', '_', $submission->fullname));
            if (Storage::disk('public')->exists($userFolder)) {
                Storage::disk('public')->deleteDirectory($userFolder);
            }
        });
    }
}