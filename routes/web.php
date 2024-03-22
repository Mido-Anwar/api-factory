<?php
// namespaces
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;




// app routes
Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// category routes
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/category/show/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::get('/category/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::post('/category/update/{category}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
// post routes
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/post/show/{post}', [PostController::class, 'show'])->name('post.show');
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
Route::get('/post/edit/{post}', [PostController::class, 'edit'])->name('post.edit');
Route::patch('/post/update/{post}', [PostController::class, 'update'])->name('post.update');
Route::delete('/post/destroy/{post}', [PostController::class, 'destroy'])->name('post.destroy');
//tag routes
Route::get('/tags', [TagController::class, 'index'])->name('tags');
Route::get('/tag/show/{tag}', [TagController::class, 'show'])->name('tag.show');
Route::get('/tag/create', [TagController::class, 'create'])->name('tag.create');
Route::post('/tag/store', [TagController::class, 'store'])->name('tag.store');
Route::get('/tag/edit/{tag}', [TagController::class, 'edit'])->name('tag.edit');
Route::post('/tag/update/{tag}', [TagController::class, 'update'])->name('tag.update');
Route::delete('/tag/destroy/{tag}', [TagController::class, 'destroy'])->name('tag.destroy');
 // images route
Route::get('/image', [imageController::class, 'index'])->name('images');
Route::get('/image/create/logo', [imageController::class, 'create'])->name('image.create.logo');
Route::get('/image/create/postimage', [imageController::class, 'create'])->name('image.create.postimage');
Route::post('/image/store', [imageController::class, 'store'])->name('image.store');
Route::delete('/image/destroy/{image}', [imageController::class, 'destroy'])->name('image.destroy');
require __DIR__ . '/auth.php';
