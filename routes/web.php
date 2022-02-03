<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});
*/

// Route::get('/', function () {
//     return view('test');
// });
Route::get('/', [PostController::class, 'index']);

// Route::resource('posts', 'App\Http\Controllers\PostController');

Route::get('posts/', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('posts/', [PostController::class, 'store'])->name('posts.store');
Route::get('posts/show/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
Route::patch('posts/show/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
// Route::resource('students', StudentController::class);
// Route::get('/', [StudentController::class, 'index']);
// Route::get('/create', [StudentController::class, 'create']);
// Route::post('/store', [StudentController::class, 'store']);
// Route::get('/show/{id}', [StudentController::class, 'show']);
// Route::get('/edit/{id}', [StudentController::class, 'edit']);
// Route::post('/update/{id}', [StudentController::class, 'update']);
// Route::get('/delete/{id}', [StudentController::class, 'destroy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
