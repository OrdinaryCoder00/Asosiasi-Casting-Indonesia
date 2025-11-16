<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'year',
        'description',
        'poster',
        'casting_director_id',
    ];

    public function castingDirector()
    {
        return $this->belongsTo(BoardOfOfficer::class, 'casting_director_id');
    }
}
