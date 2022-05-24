<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AnonymouseController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

    Route::get('/login',[AuthenticatedSessionController::class, "create"]);
    Route::get('/register', [RegisteredUserController::class, "create"]);
    Route::get('/library', [LibraryController::class,'showAll']);
    Route::get('/category', [LibraryController::class,'category']);
    Route::get("/search",[DashboardPostController::class,'search']);
    Route::get('/', [DashboardPostController::class,'postAll']);
    

    
    

Route::middleware(['auth'])->group(function(){   
    Route::get('/read/{post}', [AnonymouseController::class, "read"]);
    Route::get('/edit/profile', [AuthenticatedSessionController::class, "update"])->name('edit.profile');
    Route::get('/edit', [AuthenticatedSessionController::class, "edit"]);
    Route::get("edit/{user}", [AuthenticatedSessionController::class, 'edit'])->name('edit.profile');
    Route::get("/profile/{username}", [AuthenticatedSessionController::class, 'show'])->name('profile');
    Route::put("edit/{user}", [AuthenticatedSessionController::class, 'update'])->name('edit.profile');
    Route::get("/{post}", [AnonymouseController::class, "show"]);
});

Route::middleware(['admin'])->group(function(){ 
    Route::get('/posts/{slug}',[PostController::class,'show']); 
    Route::get('/dashboard/posts/checkSlug',[DashboardPostController::class,'checkSlug']);
    Route::get('/dashboard', [AnonymouseController::class, "index"])->name('dashboard');
    Route::resource('/dashboard/posts',DashboardPostController::class);
}); 


require __DIR__.'/auth.php';
