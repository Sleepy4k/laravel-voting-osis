<?php

use App\Http\Controllers\Web\Auth;
use App\Http\Controllers\Web\User;
use App\Http\Controllers\Web\Admin;
use Illuminate\Support\Facades\Route;

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

/*
|--------------------------------------------------------------------------
| Public Route
|--------------------------------------------------------------------------
|
| You can list public API for any user in here. These routes are not guarded
| by any authentication system. In other words, any user can access it directly.
| Remember not to list anything of importance, use authenticate route instead.
*/

// Route::get('/', fn() => view('welcome'))->name('landing.index');

/*
|--------------------------------------------------------------------------
| Unauthenticated Route
|--------------------------------------------------------------------------
|
| You can list public API for any user in here. These routes are meant
| to be used for guests and are not guarded by any authentication system.
| Remember not to list anything of importance, use authenticate route instead.
*/

Route::middleware('guest')->group(function() {
    Route::resource('login', Auth\LoginController::class, ['only' => ['index', 'store']]);
});

/*
|--------------------------------------------------------------------------
| Authenticated Route
|--------------------------------------------------------------------------
|
| In here you can list any route for authenticated user. These routes
| are meant to be used privately since the access is exclusive to authenticated
| user who had obtained their sanctum token from login API!
*/

Route::middleware('auth')->group(function() {
    Route::resource('logout', Auth\LogoutController::class, ['only' => ['store']]);

    // User Route
    Route::as('main.')->middleware('role:user')->group(function() {
        Route::get('/', [User\DashboardController::class, 'index'])->name('dashboard.index');
        Route::post('vote/{id}', [User\DashboardController::class, 'store'])->name('dashboard.store');
    });

    // Admin Route
    Route::prefix('admin')->as('admin.')->middleware('role:admin|superadmin')->group(function() {
        Route::resource('user', Admin\UserController::class);
        Route::resource('candidate', Admin\CandidateController::class);
        Route::get('/', [Admin\DashboardController::class, 'index'])->name('dashboard.index');

        // Custom admin prefix
        Route::as('custom.')->group(function() {
            Route::post('import', [Admin\AdminController::class, 'import'])->name('import');
            Route::get('template', [Admin\AdminController::class, 'template'])->name('template');
            Route::get('reset/{user}/{candidate}', [Admin\AdminController::class, 'reset'])->name('reset');
        });
    });
});

/*
|--------------------------------------------------------------------------
| Fallback Route
|--------------------------------------------------------------------------
| 
| Please don't touch the code below unless you know what you're doing.
| Also keep in mind to put this code at the bottom of the route for any route
| listed below this code will not function or listed properly.
*/

Route::any('{any}', fn() => view('errors.404'))->where('any', '.*')->name('fallback');