<?php

use App\Models\Post;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/', function (){
    return view('welcome');
});

// Route::get('/', function () {
//     return view('welcome', ['name' => 'Samantha']);
// });

Route::get('/about', function (){
    // return 'test';
    return view('about', ['name' => 'RH-Emran']);
});

Route::get('/dashboard', function () {
    // $posts = Post::all();
    $posts = Post::orderBy('id', 'ASC')->get();
    return view('dashboard', [
        'posts' => $posts
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Post route
    Route::get('/add-post', [PostController::class, 'create'])->name('add-post');
    Route::post('/save-post', [PostController::class, 'store'])->name('save-post');
    Route::get('/edit-post/{id}', [PostController::class, 'edit'])->name('edit-post');
    Route::post('/update-post/{id}', [PostController::class, 'update'])->name('update-post');
    Route::post('/delete-post/{id}', [PostController::class, 'destroy'])->name('delete-post');
});

require __DIR__.'/auth.php';