<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThugGameLinkController;
use App\Http\Controllers\ThugGameController;
use App\Http\Controllers\IndexController;

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
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [IndexController::class, 'index'])
        ->name('dashboard');

    Route::post('/thug-game-link', [ThugGameLinkController::class, 'store'])
        ->name('thug.game.link.store');

    Route::put('/thug-game-link/{thugGameLink}', [ThugGameLinkController::class, 'deactivate'])
        ->where('thugGameLink', '[0-9]+')
        ->name('thug.game.link.deactivate');

    Route::get('/thug-game/{thugGameLink:token}', [ThugGameController::class, 'index'])
        ->where('thugGameLink', '^[a-zA-Z-0-9]{10}$')
        ->name('thug.game');

    Route::prefix('thug-game')->group(function () {
        Route::post('/{thugGameLink:token}', [ThugGameController::class, 'store'])
            ->where('thugGameLink', '^[a-zA-Z-0-9]{10}$')
            ->name('thug.game.store');

        Route::get('/history/{thugGameLink:token}', [ThugGameController::class, 'history'])
            ->where('thugGameLink', '^[a-zA-Z-0-9]{10}$')
            ->name('thug.game.history');
    });
});

require __DIR__.'/auth.php';
