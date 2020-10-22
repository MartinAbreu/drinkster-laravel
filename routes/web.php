<?php

use App\Http\Controllers\FollowsController;
use App\Mail\NewUserWelcomeMail;
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

Auth::routes();

Route::get('/email', function () {
    return new NewUserWelcomeMail();
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::post('/follow/{user}', [App\Http\Controllers\FollowsController::class, 'store']);

Route::get('/feed', [App\Http\Controllers\PostController::class, 'index']);
Route::get('/discover', [App\Http\Controllers\PostController::class, 'discover']);
Route::get('/p/create', [App\Http\Controllers\PostController::class, 'create']);
Route::post('/p', [App\Http\Controllers\PostController::class, 'store']);
Route::get('/p/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
Route::get('/p/{post}', [App\Http\Controllers\PostController::class, 'show']);
Route::patch('/p/{post}', [App\Http\Controllers\PostController::class, 'update'])->name('posts.update');
Route::delete('/delete/p/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy');


Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');
