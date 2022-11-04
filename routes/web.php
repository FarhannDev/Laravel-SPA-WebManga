<?php

use App\Http\Livewire\Page\Homepage\AboutIndex;
use App\Http\Livewire\Page\Homepage\Blog\BlogIndex;
use App\Http\Livewire\Page\Homepage\ContactIndex;
use App\Http\Livewire\Page\HomePage\Genre\GenreShow;
use App\Http\Livewire\Page\Homepage\HomepageIndex;
use App\Http\Livewire\Page\Homepage\Komik\KomikIndex;
use App\Http\Livewire\Page\Homepage\Komik\KomikLatest;
use App\Http\Livewire\Page\Homepage\Komik\KomikPopuler;
use App\Http\Livewire\Page\Homepage\Komik\KomikShow;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomepageIndex::class)->name('homePageIndex');
Route::get('/about', AboutIndex::class)->name('aboutIndex');
Route::get('/contact', ContactIndex::class)->name('contactIndex');



Route::get('/komik', KomikIndex::class)->name('komikIndex');
Route::get('/komik/id-ID/{comic:comic_slug}', KomikShow::class)->name('komikShow');
Route::get('/komik/latest', KomikLatest::class)->name('komikLatest');
Route::get('/komik/populer', KomikPopuler::class)->name('komikPopuler');

Route::get('/genre/id-ID/{comicGenre:genre_slug}', GenreShow::class)->name('genreShow');

Route::get('/blog', BlogIndex::class)->name('blogIndex');
