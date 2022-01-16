<?php

use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\WebsiteController;
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

/**
 * PUBLIC ROUTES
 */

Route::get('/home', [WebsiteController::class, 'index'])->name('home');
Route::get('/{slug}', [WebsiteController::class, 'articleDetails'])->name('article-details');
Route::get('/category/{slug}', [WebsiteController::class, 'categoryDetails'])->name('category');
Route::get('/', [WebsiteController::class, 'searchArticle'])->name('search');
Route::get('tag/{slug}', [WebsiteController::class, 'tagDetails'])->name('tag');

/**
 * ADMIN ROUTES
 */
Route::get('/dashboard/{any}', [ApplicationController::class, 'index'])->where('any', '(.*)');

