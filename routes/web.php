<?php

use App\Http\Controllers\Admin\ManageKomikController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Page\Admin\Komik\ManageKomikAdd;
use App\Http\Livewire\Page\Admin\ManageAdmin;
use App\Http\Livewire\Page\Admin\ManageKomik;
use App\Http\Livewire\Page\Homepage\AboutIndex;
use App\Http\Livewire\Page\Homepage\ContactIndex;
use App\Http\Livewire\Page\Homepage\HomepageIndex;
use App\Http\Livewire\Page\Homepage\Blog\BlogIndex;
use App\Http\Livewire\Page\HomePage\Genre\GenreShow;
use App\Http\Livewire\Page\Homepage\Komik\KomikShow;
use App\Http\Livewire\Page\Homepage\Komik\KomikIndex;
use App\Http\Livewire\Page\Homepage\Komik\KomikLatest;
use App\Http\Livewire\Page\Homepage\Komik\KomikPopuler;

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

Auth::routes([
    'register' => false,
    'password.reset' => false
]);


Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/dashboard/komik', ManageKomik::class)->name('manageKomik');
    // Route::get('/dashboard/komik/add', [ManageKomikController::class, 'create'])->name('manageKomikCreate');
    // Route::get('/dashboard/manage/komik/add', ManageKomikAdd::class)->name('manageKomikAdd');
});
