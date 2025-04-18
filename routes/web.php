<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Auth\LoginController;
//use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CacheController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
|--------------------------------------------------------------------------
| Guest Users
|--------------------------------------------------------------------------
*/
Route::middleware(['guest'])->group(function () {
    // Register - Disabled
    Route::get('/registreren', function () {
        return redirect('/');
    });
    // Route::get('/registreren', [RegisterController::class, 'index'])->name('register');
    // Route::post('/registreren', [RegisterController::class, 'store'])->name('register.store');

    // Login
    Route::get('/inloggen', [LoginController::class, 'index'])->name('login');
    Route::get('/dashboard', [LoginController::class, 'index'])->name('login');
    Route::post('/inloggen', [LoginController::class, 'store'])->name('login.store');
});

/*
|--------------------------------------------------------------------------
| Authenticated Users
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::post('/uitloggen', [LoginController::class, 'destroy'])->name('login.destroy');
});

/*
|--------------------------------------------------------------------------
| Authenticated Users with Permissions
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin,editor'])->group(function () {
    // Projects
    Route::get('/projecten', [ProjectController::class, 'index'])->name('projects');
    Route::prefix('en')->group(function () {
        Route::get('/projecten', [ProjectController::class, 'index'])->name('projects.en');
    });
    Route::post('/projecten/reorder-projects', [ProjectController::class, 'reorderProjects'])->name('project.reorder-projects');

    Route::get('/nieuw-project', [ProjectController::class, 'create'])->name('project.new');
    Route::post('/nieuw-project', [ProjectController::class, 'store'])->name('project.store');

    Route::get('/projecten/{id}/bewerken', [ProjectController::class, 'edit'])->name('project.edit');
    Route::put('/projecten/{id}/bewerken', [ProjectController::class, 'update'])->name('project.update');

    Route::post('/projecten/{project}/reorder-images', [ProjectController::class, 'reorderImages'])->name('project.reorder-images');
    Route::delete('/projecten/{project}/images/{image}', [ProjectController::class, 'deleteImage'])->name('project.image.delete');

    Route::delete('/projecten/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');

    // Categories
    Route::get('/categorieen', [CategoryController::class, 'index'])->name('categories');

    Route::get('/nieuwe-categorie', [CategoryController::class, 'create'])->name('category.new');
    Route::post('/nieuwe-categorie', [CategoryController::class, 'store'])->name('category.store');

    Route::get('/categorieen/{id}/bewerken', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/categorieen/{id}/bewerken', [CategoryController::class, 'update'])->name('category.update');

    Route::delete('/categorieen/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    // Cache
    Route::post('/clear-cache', [CacheController::class, 'clearCache'])->name('clear.cache');
});

/*
|--------------------------------------------------------------------------
| Pages for All Users
|--------------------------------------------------------------------------
*/
Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/over', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/store', [PageController::class, 'shop'])->name('store');
Route::get('/projects/{project:slug}', [ProjectController::class, 'show'])->name('project.single');

/*
|--------------------------------------------------------------------------
| Pages for All Users in English
|--------------------------------------------------------------------------
*/
Route::prefix('en')->group(function () {
    Route::get('/', [PageController::class, 'index'])->name('home.en');
    Route::get('/about', [PageController::class, 'about'])->name('about.en');
    Route::get('/contact', [PageController::class, 'contact'])->name('contact.en');
    Route::get('/store', [PageController::class, 'shop'])->name('store.en');
    Route::get('/projects/{project:slug}', [ProjectController::class, 'show'])->name('project.single.en');
});
