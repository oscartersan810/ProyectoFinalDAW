<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\ReviewsController;
use App\Http\Controllers\Admin\SeriesController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Explorer\ExplorerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AvatarSelectionController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReviewMovieController;
use App\Http\Controllers\ReviewSerieController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\User\FavoritesController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\Auth\NewPasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Reseñas del usuario
Route::get('/dashboard/resenas', [UserDashboardController::class, 'resenas'])->name('dashboard.resenas');

// Películas y series puntuadas
Route::get('/dashboard/puntuadas', [UserDashboardController::class, 'puntuadas'])->name('dashboard.puntuadas');

Route::middleware(['auth'])->group(function () {
    // ...otras rutas...
    Route::get('/dashboard/favorites', [FavoritesController::class, 'index'])->name('dashboard.favorites');
});
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
    // Usuarios
    Route::prefix('admin')->middleware('auth')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('admin.users');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    });

    // Reviews (reseñas)
    Route::prefix('reviews')->group(function () {
        Route::get('/', [ReviewsController::class, 'index'])->name('admin.reviews');
        Route::get('/{type}/{review}/edit', [ReviewsController::class, 'edit'])->name('admin.reviews.edit');
        Route::put('/{type}/{review}', [ReviewsController::class, 'update'])->name('admin.reviews.update');
        Route::delete('/{review}', [ReviewsController::class, 'destroy'])->name('admin.reviews.destroy');
    });
});

Route::get('/explore', [ExplorerController::class, 'index'])->name('explore');


// Ver todas las reseñas de películas
Route::get('/reviews/movies', [ReviewMovieController::class, 'index'])->name('reviews.movies');

// Ver todas las reseñas de series
Route::get('/reviews/series', [ReviewSerieController::class, 'index'])->name('reviews.series');

Route::get('/resenas/create', [ReviewController::class, 'create'])->name('resenas.create');
Route::post('/resenas', [ReviewController::class, 'store'])->name('resenas.store');

Route::post('/resenas/movies', [ReviewMovieController::class, 'store'])->name('resenas.pelicula.store');
Route::post('/resenas/series', [ReviewSerieController::class, 'store'])->name('resenas.serie.store');

Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show');
Route::get('/series/{id}', [SeriesController::class, 'show'])->name('series.show');

Route::get('/tops', [TopController::class, 'index'])->name('tops');


Route::middleware(['auth'])->group(function () {
    Route::post('/favorite/toggle', [FavoriteController::class, 'toggle'])->name('favorite.toggle');
});

// Para reseñas de películas
Route::delete('/reviews/movies/{review}', [App\Http\Controllers\ReviewMovieController::class, 'destroy'])
    ->name('reviews.movies.destroy');

// Para reseñas de series (si tienes ReviewSerieController)
Route::delete('/reviews/series/{review}', [App\Http\Controllers\ReviewSerieController::class, 'destroy'])
    ->name('reviews.series.destroy');

Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');

Route::view('/soporte', 'pages.soporte')->name('soporte');

require __DIR__ . '/auth.php';
