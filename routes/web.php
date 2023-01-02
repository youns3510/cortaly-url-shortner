<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShorterController;

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


Route::view('/payout-rates', 'payout-rates')->name('home.payout-rates');
Route::view('/faq', 'faq')->name('home.faq');


// Route::get('/blog/{article}', [ArticleController::class, 'show']);


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/search', 'search')->name('home.search');
    Route::get('/blog', 'showBlog')->name('home.blog');
    Route::get('/blog/{article}', 'showArticle')->name('home.article.show');;
    Route::get('/blog-tags/{tag}', 'showTag')->name('home.tag.show');
    Route::get('/blog-category/{category}', 'showCategory')->name('home.category.show');
});

Route::view('/dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile',  'edit')->name('profile.edit');
        Route::patch('/profile',  'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    Route::controller(ArticleController::class)->group(function () {
        Route::post('/editor-upload', 'editor_upload')->name('editor.img-upload');
        Route::get('/article/trashed', 'all_trashed')->name('article.trashed');
        Route::post('/article/{article}/restore', 'restore')->name('article.restore');;
        Route::delete('/article/{article}/force-delete',  'force_delete')->name('article.force-delete');;
    });




    Route::resource('article', ArticleController::class)->except(['show']);
    Route::resource('category', CategoryController::class)->except(['create', 'edit']);;
    Route::resource('tag', TagController::class)->except(['create', 'edit']);
});




Route::resource('short', ShorterController::class)->except('show');

require __DIR__ . '/auth.php';
Route::get('/{shorter}', [ShorterController::class, 'show'])->name('short.show');
