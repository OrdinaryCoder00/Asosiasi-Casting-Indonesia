<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Models\Film;
use App\Models\BoardOfOfficer;
use App\Http\Controllers\CastingSubmissionController;
use App\Http\Controllers\VideoStreamController;


Route::get('/', function () {

    /*
    |--------------------------------------------------------------------------
    | TEAM / BOARD OF OFFICERS
    |--------------------------------------------------------------------------
    */
    $team = BoardOfOfficer::with('films') // eager load film -> portfolio
        ->orderBy('order')
        ->get()
        ->map(function ($officer) {

            // Portfolio Cards
            $portfolio = $officer->films->map(function ($film) {
                return [
                    'judul' => $film->title,
                    'poster' => $film->poster 
                        ? Storage::url($film->poster) 
                        : 'https://via.placeholder.com/200x300',
                ];
            })->toArray();

            // Completed Projects Text
            $proyek_selesai = $officer->films->map(function ($film) {
                return $film->title . ' (' . $film->year . ')';
            })->toArray();

            return [
                'id' => $officer->id,
                'nama' => $officer->name,
                'position' => '',
                'image' => $officer->photo 
                    ? Storage::url($officer->photo) 
                    : 'https://via.placeholder.com/150',
                'pengenalan_singkat' => $officer->intro ?? '',
                'portfolio' => $portfolio,
                'proyek_selesai' => $proyek_selesai,
            ];
        });

    /*
    |--------------------------------------------------------------------------
    | FILM SECTION
    |--------------------------------------------------------------------------
    | + Eager load casting director
    | + Display casting director info
    */
    $film = Film::with('castingDirector')
        ->orderBy('year', 'desc')
        ->get()
        ->map(function ($f) {

            return [
                'id' => $f->id,

                // Basic Film Info
                'Nama_Film' => $f->title,
                'Deskripsi_singkat' => $f->description ?? '',

                // Casting Director Info
                'casting_director_id' => $f->casting_director_id,
                'nama_casting_director' => $f->castingDirector->name ?? 'N/A',

                // Poster
                'image' => $f->poster 
                    ? Storage::url($f->poster)
                    : 'https://via.placeholder.com/200x300',
            ];
        });

    /*
    |--------------------------------------------------------------------------
    | DUMMY NEWS
    |--------------------------------------------------------------------------
    */
    $news = [
        [
            'id' => 1,
            'title' => 'News 1',
            'excerpt' => 'Lorem ipsum dolor sit amet',
            'image' => 'https://via.placeholder.com/400x200',
            'created_at' => Carbon::now()->subDays(2),
            'author' => 'Admin ACI',
            'description' => 'Berita lengkap tentang News 1'
        ],
        [
            'id' => 2,
            'title' => 'News 2',
            'excerpt' => 'Consectetur adipiscing elit',
            'image' => 'https://via.placeholder.com/400x200',
            'created_at' => Carbon::now()->subDays(1),
            'author' => 'Admin ACI',
            'description' => 'Berita lengkap tentang News 2'
        ],
        [
            'id' => 3,
            'title' => 'News 3',
            'excerpt' => 'Sed do eiusmod tempor incididunt',
            'image' => 'https://via.placeholder.com/400x200',
            'created_at' => Carbon::now(),
            'author' => 'Admin ACI',
            'description' => 'Berita lengkap tentang News 3'
        ],
    ];

    return view('welcome', compact('team', 'film', 'news'));
});

Route::get('/casting-submission', [CastingSubmissionController::class, 'index'])->name('casting.form');
Route::post('/casting-submission', [CastingSubmissionController::class, 'store'])->name('casting.submit');
Route::get('/casting-video/{filename}', [VideoStreamController::class, 'stream'])
    ->where('filename', '.*')
    ->name('casting.video.stream');
