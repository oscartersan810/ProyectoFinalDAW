<?php

use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\SeriesController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Explorer\ExplorerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminMovieController;
use App\Http\Controllers\AvatarSelectionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//Prueba Conexión con Angular

Route::get('/ping', function () {
    return response()->json([
        'message' => 'Pong desde MovieHubServer!'
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/seleccionar-avatar', [AvatarSelectionController::class, 'show'])->name('select.avatar');
Route::post('/seleccionar-avatar', [AvatarSelectionController::class, 'store'])->name('select.avatar.store');

//Admin 
Route::prefix('admin')->group(function () {

    // Movies
    Route::prefix('movies')->group(function () {
        Route::get('/', [MovieController::class, 'index'])->name('admin.movies');
        Route::get('/create', [MovieController::class, 'create'])->name('admin.movies.create');
        Route::post('/', [MovieController::class, 'store'])->name('admin.movies.store');
        Route::get('/{movie}/edit', [MovieController::class, 'edit'])->name('admin.movies.edit');
        Route::put('/{movie}', [MovieController::class, 'update'])->name('admin.movies.update');
        Route::delete('/{movie}', [MovieController::class, 'destroy'])->name('admin.movies.destroy');
    });

    // Series
    Route::prefix('series')->group(function () {
        Route::get('/', [SeriesController::class, 'index'])->name('admin.series');
        Route::get('/create', [SeriesController::class, 'create'])->name('admin.series.create');
        Route::post('/', [SeriesController::class, 'store'])->name('admin.series.store');
        Route::get('/{serie}/edit', [SeriesController::class, 'edit'])->name('admin.series.edit');
        Route::put('/{serie}', [SeriesController::class, 'update'])->name('admin.series.update');
        Route::delete('/{serie}', [SeriesController::class, 'destroy'])->name('admin.series.destroy');
    });

    Route::prefix('admin')->middleware('auth')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('admin.users');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    });

});

Route::get('/explore', [ExplorerController::class, 'index'])->name('explore');


require __DIR__.'/auth.php';
