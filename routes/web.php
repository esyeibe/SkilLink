<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ProviderReviewController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SkillProviderController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [HomeController::class, 'about'])->name('about');


// Route::get('/', function () {
//     return view('home');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/explore', [ExploreController::class, 'index'])
        ->name('explore.index');

    Route::get('/providers/{id}', [ProviderController::class, 'show'])
        ->name('provider.show');

    Route::post('/providers/{id}/reviews', [ProviderReviewController::class, 'store'])
        ->name('provider.review.store');

});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    // Route::get('/dashboard', function () {
    //     return view('admin.dashboard');
    // })->name('dashboard');

    Route::get('/dashboard', [AdminController::class, 'dashboard'])
     ->name('dashboard');


    
    Route::resource('categories', CategoryController::class);

    Route::resource('providers', SkillProviderController::class);


});


require __DIR__.'/auth.php';
