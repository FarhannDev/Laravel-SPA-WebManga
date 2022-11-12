<?php

use App\Http\Controllers\Admin\ManageBlogController;
use App\Http\Controllers\Admin\ManageDashboardController;
use App\Http\Controllers\Admin\ManageKomikController;
use App\Http\Controllers\Admin\ManageKomikGenre;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Page\Homepage\AboutIndex;
use App\Http\Livewire\Page\Homepage\ContactIndex;
use App\Http\Livewire\Page\Homepage\HomepageIndex;
use App\Http\Livewire\Page\Homepage\Blog\BlogIndex;
use App\Http\Livewire\Page\Homepage\Blog\BlogShow;
use App\Http\Livewire\Page\Homepage\Community\CommunityIndex;
use App\Http\Livewire\Page\Homepage\Genre\GenreIndex;
use App\Http\Livewire\Page\Homepage\Genre\GenreShow;
use App\Http\Livewire\Page\Homepage\Komik\KomikShow;
use App\Http\Livewire\Page\Homepage\Komik\KomikIndex;
use App\Http\Livewire\Page\Homepage\Komik\KomikLatest;
use App\Http\Livewire\Page\Homepage\Komik\KomikPopuler;
use App\Http\Livewire\Page\Homepage\Komik\KomikVidio;
use App\Http\Livewire\Page\Homepage\TestimonialIndex;

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
Route::get('/komik/id/{comic:comic_slug}', KomikShow::class)->name('komikShow');
Route::get('/komik/videos', KomikVidio::class)->name('komikVidio');
Route::get('/genre', GenreIndex::class)->name('genreIndex');
Route::get('/genre/id/{comicGenre:genre_slug}', GenreShow::class)->name('genreShow');
Route::get('/blog', BlogIndex::class)->name('blogIndex');
Route::get('/blog/{blog:blog_slug}', BlogShow::class)->name('blogShow');

// Route::get('/community', CommunityIndex::class)->name('communityIndex');

Route::get('/success', function () {
    return view('messages.index');
})->name('successAlert');

Auth::routes([
    'register' => false,
    'password.reset' => false
]);


Route::middleware(['auth', 'user-access:admin'])->group(function () {
    // Komik
    Route::get('/dashboard', [ManageDashboardController::class, 'index'])->name('manageDashboard');

    Route::get('/dashboard/komik', [ManageKomikController::class, 'index'])->name('manageKomik');
    Route::get('/dashboard/komik/add', [ManageKomikController::class, 'create'])->name('manageKomikCreate');
    Route::post('/dashboard/komik/add', [ManageKomikController::class, 'store'])->name('manageKomikStore');
    Route::get('/dashboard/komik/show/{comic:comic_slug}', [ManageKomikController::class, 'show'])->name('manageKomikShow');

    Route::get('/dashboard/komik/edit/{comic:comic_slug}', [ManageKomikController::class, 'edit'])->name('manageKomikEdit');
    Route::put('/dashboard/komik/edit/{comic:comic_slug}', [ManageKomikController::class, 'update'])->name('manageKomikUpdate');
    Route::delete('/dashboard/komik/{comic:comic_slug}', [ManageKomikController::class, 'destroy'])->name('manageKomikDestroy');

    Route::post('/dashboard/komik/volumes/add/{comic:id}', [ManageKomikController::class, 'insert_volumes'])->name('manageVolumeAdd');
    Route::delete('/dashboard/komik/volumes/{id}', [ManageKomikController::class, 'delete_volumes'])->name('manageVolumeDelete');
    // Genre
    Route::get('/dashboard/komik/genre', [ManageKomikGenre::class, 'index'])->name('manageGenre');

    // Route::get('/dashboard/manage/komik/add', ManageKomikAdd::class)->name('manageKomikAdd');
    // Blog
    Route::get('/dashboard/blog', [ManageBlogController::class, 'index'])->name('manageBlogIndex');
    Route::get('/dashboard/blog/add', [ManageBlogController::class, 'create'])->name('manageBlogCreate');
    Route::post('/dashboard/blog/add', [ManageBlogController::class, 'store'])->name('manageBlogStore');
    Route::get('/dashboard/blog/edit/{blog:blog_slug}', [ManageBlogController::class, 'edit'])->name('manageBlogEdit');
    Route::put('/dashboard/blog/edit/{blog:blog_slug}', [ManageBlogController::class, 'update'])->name('manageBlogUpdate');

    Route::delete('/dashboard/blog/{blog:blog_slug}', [ManageBlogController::class, 'destroy'])->name('manageBlogDestroy');


    Route::post('ckeditor/upload', 'CkeditorController@upload')->name('ckeditor.upload');
});
