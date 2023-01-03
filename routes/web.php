<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TopPageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\My_pageController;



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
Route::group(['middleware' => ['auth']], function(){
    Route::get('/', [TopPageController::class, 'index'])->name('TopPage');
    Route::get('/search', [SearchController::class, 'search']);
    Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit']);
    Route::get('/search/{prefecture_id}', [SearchController::class, 'search_index']);
    Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
    Route::get('/reviews/{prefecture}', [ReviewController::class, 'index']);
    Route::get('/reviews/{prefecture}/{review}', [ReviewController::class, 'show']); 
    Route::post('/reviews', [ReviewController::class, 'store']);
    Route::put('/reviews/{review}', [ReviewController::class, 'update']);
    Route::delete('//reviews/{review}', [ReviewController::class, 'delete']);
    Route::delete('/reviews/deleteimage/{review}', [ReviewController::class, 'deleteimage']);
    Route::get('/reply/nice/{review}', [ReviewController::class, 'nice']);
    Route::get('/reply/unnice/{review}', [ReviewController::class, 'unnice']);
    Route::get('/my_page', [My_pageController::class, 'index']);
});
   
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
    
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    
    require __DIR__.'/auth.php';