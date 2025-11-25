<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\CastingSubmissionController;
use App\Http\Controllers\VideoStreamController;
use App\Models\Film;
use App\Models\BoardOfOfficer;
use App\Models\News;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    $team = BoardOfOfficer::with('films')
        ->orderBy('order')
        ->get()
        ->map(function ($officer) {
            $portfolio = $officer->films->map(fn($film) => [
                'judul' => $film->title,
                'poster' => $film->poster ? Storage::url($film->poster) : 'https:via.placeholder.com/200x300',
            ])->toArray();

            $proyek_selesai = $officer->films->map(fn($film) => $film->title . ' (' . $film->year . ')')->toArray();

            return [
                'id' => $officer->id,
                'nama' => $officer->name,
                'position' => '',
                'image' => $officer->photo ? Storage::url($officer->photo) : 'https:via.placeholder.com/150',
                'pengenalan_singkat' => $officer->intro ?? '',
                'portfolio' => $portfolio,
                'proyek_selesai' => $proyek_selesai,
            ];
        });

    $film = Film::with('castingDirector')
        ->orderBy('year', 'desc')
        ->get()
        ->map(fn($f) => [
            'id' => $f->id,
            'Nama_Film' => $f->title,
            'Deskripsi_singkat' => $f->description ?? '',
            'casting_director_id' => $f->casting_director_id,
            'nama_casting_director' => $f->castingDirector->name ?? 'N/A',
            'image' => $f->poster ? Storage::url($f->poster) : 'https:via.placeholder.com/200x300',
        ]);

    $news = News::orderBy('published_at', 'desc')->get();

    return view('welcome', compact('team', 'film', 'news'));
});

// News routes
Route::prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('news.index'); // Semua news
    Route::get('/{slug}', [NewsController::class, 'show'])->name('news.show'); // Detail news
    Route::get('/filter/category', [NewsController::class, 'filter'])->name('news.filter'); // Filter via AJAX
});

// Casting Submission
Route::get('/casting-submission', [CastingSubmissionController::class, 'index'])->name('casting.form');
Route::post('/casting-submission', [CastingSubmissionController::class, 'store'])->name('casting.submit');
Route::get('/casting-video/{filename}', [VideoStreamController::class, 'stream'])
    ->where('filename', '.*')
    ->name('casting.video.stream');