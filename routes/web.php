<?php

use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

/**
 * PUBLIC ROUTES
 */
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::get('/send-notification', [NotificationController::class, 'sendNotification'])->name('send.notification');
Route::get('/', [WebsiteController::class, 'home'])->name('landingPage');
Route::get('/blog', [WebsiteController::class, 'index'])->name('blog');
Route::get('/author', [WebsiteController::class, 'about'])->name('about');
Route::get('/author/{slug}', [WebsiteController::class, 'author'])->name('author');
Route::get('/the-novel', [WebsiteController::class, 'novel'])->name('novel');
Route::get('/articles/{slug}', [WebsiteController::class, 'articleDetails'])->name('article-details');
Route::get('/category/{slug}', [WebsiteController::class, 'categoryDetails'])->name('category');
Route::get('/search', [WebsiteController::class, 'searchArticle'])->name('search');
Route::get('/columnist', [WebsiteController::class, 'getColumnistPage'])->name('columnist');
Route::get('tag/{slug}', [WebsiteController::class, 'tagDetails'])->name('tag');
Route::post('/newsLetter', [WebsiteController::class, 'newsLetters'])->name('newsLetter');
Route::post('/postComment', [WebsiteController::class, 'postComment'])->name('comment');
/**
 * ADMIN ROUTES
 */

Route::get('language/{locale}', function ($locale) {
    app()->setLocale('en');
    session()->put('locale', $locale);
    return redirect()->back();
});

Route::get('/dashboard/{any}', [ApplicationController::class, 'index'])->where('any', '(.*)');

Route::get('/{slug}/{nextSlug}', function ($slug, $nextSlug) {
    if ($nextSlug == "amp" || $nextSlug == "feed") {
        return redirect()->route('article-details', ['slug' => $slug]);
    }
    abort(404);
    return false;
});
