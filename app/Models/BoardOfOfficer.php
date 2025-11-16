<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BoardOfOfficer extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'order',
        'name',
        'intro',
    ];

    public function films()
    {
        return $this->belongsToMany(Film::class, 'board_officer_film');
    }
}
