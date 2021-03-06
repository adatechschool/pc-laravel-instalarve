<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;

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

Route::get('/', function () {
    if(Auth::check()) {
        return redirect()->route('posts.index');
    }
    return view('welcome');
});

Route::resource('posts', PostController::class);

Route::resource('users', UserController::class);

Route::resource('comments', CommentController::class);

Route::resource('likes', LikeController::class);



Route::get('/dashboard', function () {
    return view('dashboard',
    [ 'name' => auth()->user()->name]);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
