<?php

use App\Http\Controllers\Admin\ManageBlogController;
use App\Http\Controllers\Admin\ManageDashboardController;
use App\Http\Controllers\Admin\ManageKomikController;
use App\Http\Controllers\Admin\ManageKomikGenre;
use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\Author\DashboardAuthorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Page\Homepage\AboutIndex;
use App\Http\Livewire\Page\Homepage\ContactIndex;
use App\Http\Livewire\Page\Homepage\HomepageIndex;
use App\Http\Livewire\Page\Homepage\Blog\BlogIndex;
use App\Http\Livewire\Page\Homepage\Blog\BlogShow;
use App\Http\Livewire\Page\Homepage\Community\CommunityIndex;
use App\Http\Livewire\Page\HomePage\Genre\GenreIndex;
use App\Http\Livewire\Page\HomePage\Genre\GenreShow;
use App\Http\Livewire\Page\Homepage\Komik\KomikShow;
use App\Http\Livewire\Page\Homepage\Komik\KomikIndex;
use App\Http\Livewire\Page\Homepage\Komik\KomikLatest;
use App\Http\Livewire\Page\Homepage\Komik\KomikPopuler;
use App\Http\Livewire\Page\Homepage\Komik\KomikTrending;
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
Route::get('/komik/latest', KomikLatest::class)->name('komikLatest');
Route::get('/komik/populer', KomikPopuler::class)->name('komikPopuler');
Route::get('/komik/trending', KomikTrending::class)->name('komikTrending');
Route::get('/genre', GenreIndex::class)->name('genreIndex');
Route::get('/genre/id/{comicGenre:genre_slug}', GenreShow::class)->name('genreShow');
Route::get('/blog', BlogIndex::class)->name('blogIndex');
Route::get('/blog/{blog:blog_slug}', BlogShow::class)->name('blogShow');

Route::get('/community', CommunityIndex::class)->name('communityIndex');

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

    Route::get('/dashboard/komik/volumes', [ManageKomikController::class, 'volume'])->name('manageVolumeIndex');
    Route::get('/dashboard/komik/volumes/{comic:comic_slug}', [ManageKomikController::class, 'show_volume'])->name('manageVolumeShow');
    Route::post('/dashboard/komik/volumes/add/{comic:id}', [ManageKomikController::class, 'insert_volumes'])->name('manageVolumeAdd');
    Route::delete('/dashboard/komik/volumes/{id}', [ManageKomikController::class, 'delete_volumes'])->name('manageVolumeDelete');
    // GENRE
    Route::get('/dashboard/komik/genre', [ManageKomikController::class, 'genres'])->name('manageGenreIndex');
    Route::post('/dashboard/komik/genre/add', [ManageKomikController::class, 'genres_add'])->name('manageGenreAdd');
    Route::delete('/dashboard/komik/genre/{id}', [ManageKomikController::class, 'genres_deleted'])->name('manageGenreDeleted');
    // Blog
    Route::get('/dashboard/blog', [ManageBlogController::class, 'index'])->name('manageBlogIndex');
    Route::get('/dashboard/blog/add', [ManageBlogController::class, 'create'])->name('manageBlogCreate');

    Route::get('/dashboard/blog/preview/{blog:blog_slug}', [ManageBlogController::class, 'show'])->name('manageBlogShow');
    Route::get('/dashboard/blog/publish', [ManageBlogController::class, 'publish'])->name('manageBlogPublish');
    Route::put('/dashboard/blog/publish/{id}', [ManageBlogController::class, 'publish_update'])->name('manageBlogPublishUpdate');

    Route::get('/dashboard/blog/draft', [ManageBlogController::class, 'draft'])->name('manageBlogDraft');
    Route::put('/dashboard/blog/draft/{id}', [ManageBlogController::class, 'draft_update'])->name('manageBlogDraftUpdate');

    Route::post('/dashboard/blog/add', [ManageBlogController::class, 'store'])->name('manageBlogStore');
    Route::get('/dashboard/blog/edit/{blog:blog_slug}', [ManageBlogController::class, 'edit'])->name('manageBlogEdit');
    Route::put('/dashboard/blog/edit/{blog:blog_slug}', [ManageBlogController::class, 'update'])->name('manageBlogUpdate');

    Route::delete('/dashboard/blog/{blog:blog_slug}', [ManageBlogController::class, 'destroy'])->name('manageBlogDestroy');

    Route::get('/dashboard/user', [ManageUserController::class, 'index'])->name('manageUserIndex');
    Route::get('/dashboard/user/author', [ManageUserController::class, 'author'])->name('manageAuthorIndex');
    Route::post('/dashboard/user/add', [ManageUserController::class, 'store'])->name('manageUserStore');
    Route::delete('/dashboard/user/{id}', [ManageUserController::class, 'destroy'])->name('manageUserDestroy');

    Route::post('ckeditor/upload', 'CkeditorController@upload')->name('ckeditor.upload');
});


Route::middleware(['auth', 'user-access:author'])->group(function () {
    Route::get('/dashboard/author', [DashboardAuthorController::class, 'index'])->name('dashboardAuthor');

    Route::get('/dashboard/author/blog', [DashboardAuthorController::class, 'blog_index'])->name('authorBlog');
    Route::get('/dashboard/author/blog/add', [DashboardAuthorController::class, 'blog_add'])->name('authorBlogAdd');
    Route::post('/dashboard/author/blog/add', [DashboardAuthorController::class, 'blog_store'])->name('authorBlogStore');

    Route::get('/dashboard/author/blog/preview/{blog:blog_slug}', [DashboardAuthorController::class, 'blog_show'])->name('authorBlogShow');
    Route::get('/dashboard/author/blog/edit/{blog:blog_slug}', [DashboardAuthorController::class, 'blog_edit'])->name('authorBlogEdit');
    Route::put('/dashboard/author/blog/edit/{blog:blog_slug}', [DashboardAuthorController::class, 'blog_update'])->name('authorBlogUpdate');
    Route::delete('/dashboard/author/blog/{blog:blog_slug}', [DashboardAuthorController::class, 'blog_destroy'])->name('authorBlogDestroy');

    Route::get('/dashboard/author/blog/publish', [DashboardAuthorController::class, 'blog_publish'])->name('authorBlogPublish');
    Route::put('/dashboard/author/blog/publish/{id}', [DashboardAuthorController::class, 'blog_publish_update'])->name('authorBlogPublishUpdate');

    Route::get('/dashboard/author/blog/draft', [DashboardAuthorController::class, 'blog_draft'])->name('authorBlogDraft');
    Route::put('/dashboard/author/blog/draft/{id}', [DashboardAuthorController::class, 'blog_draft_update'])->name('authorBlogDraftUpdate');
});
