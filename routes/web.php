<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Models\Film;
use App\Models\News;
use App\Models\BoardOfOfficer;
use App\Http\Controllers\CastingSubmissionController;
use App\Http\Controllers\VideoStreamController;

use function PHPSTORM_META\map;

// Route::get('/', function () {

//     /*
//     |--------------------------------------------------------------------------
//     | TEAM / BOARD OF OFFICERS
//     |-------------------------------------------------------------------
//     */
//     $team = BoardOfOfficer::with('films')
//         ->orderBy('order')
//         ->get()
//         ->map(function ($officer) {

//             // SEGMENT Portfolio Cards
//             $portfolio = $officer->films->map(function ($film) {
//                 return [
//                     'judul' => $film->title,
//                     'poster' => $film->poster
//                         ? Storage::url($film->poster)
//                         : 'https://via.placeholder.com/200x300',
//                 ];
//             })->toArray();

//             // Completed Projects texsts
//             $proyek_selesai = $officer->films->map(function ($film) {
//                 return $film->title . ' (' . $film->year . ')';
//             })->toArray();

//             return [
//                 'id' => $officer->id,
//                 'nama' => $officer->name,
//                 'position' => '',
//                 'image' => $officer->photo
//                     ? Storage::url($officer->photo)
//                     : 'https://via.placeholder.com/150',
//                 'pengenalan_singkat' => $officer->intro ?? '',
//                 'portfolio' => $portfolio,
//                 'proyek_selesai' => $proyek_selesai,
//             ];
//         });

//     /*
//     |--------------------------------------------------------------------
//     | FILM SECTION
//     |--------------------------------------------------------------------------
//     */
//     $film = Film::with('castingDirector')
//         ->orderBy('year', 'desc')
//         ->get()
//         ->map(function ($f) {

//             return [
//                 'id' => $f->id,

//                 // SEGMENT Basic Film Info
//                 'Nama_Film' => $f->title,
//                 'Deskripsi_singkat' => $f->description ?? '',

//                 // SEGMENT Casting Director Info
//                 'casting_director_id' => $f->casting_director_id,
//                 'nama_casting_director' => $f->castingDirector->name ?? 'N/A',

//                 // SEGMENT Poster
//                 'image' => $f->poster
//                     ? Storage::url($f->poster)
//                     : 'https://via.placeholder.com/200x300',
//             ];
//         });
//     $news = \App\Models\News::orderBy('published_at', 'desc')->take(10)->get()->toArray();
//     return view('welcome', compact('team', 'film', 'news'));
// });

Route::get('/casting-submission', [CastingSubmissionController::class, 'index'])->name('casting.form');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/casting-submission', [CastingSubmissionController::class, 'store'])->name('casting.submit');
Route::get('/casting-video/{filename}', [VideoStreamController::class, 'stream'])
    ->where('filename', '.*')
    ->name('casting.video.stream');
