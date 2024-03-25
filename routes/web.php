<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
*/
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/home',[\App\Http\Controllers\HomeController::class,'home'])->name('home');
});
Route::get('/',[\App\Http\Controllers\HomeController::class,'index'])->name('index');
Route::get('/login',[\App\Http\Controllers\LoginController::class,'index'])->name("login");
Route::get('/signIn',[\App\Http\Controllers\LoginController::class,'signIn'])->name("signIn");
Route::post('/inAction',[\App\Http\Controllers\LoginController::class,'signInAction'])->name("signInAction");
Route::get('/signUp',[\App\Http\Controllers\LoginController::class,'signUp'])->name("signUp");
Route::get('/login/google', [\App\Http\Controllers\GoogleLoginController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/login/google/callback', [\App\Http\Controllers\GoogleLoginController::class, 'handleGoogleCallback']);
Route::post('/register', [\App\Http\Controllers\LoginController::class, 'registerAction'])->name('register');
Route::post('/email-validate', [\App\Http\Controllers\LoginController::class, 'registerAction'])->name('register');
Route::get('/change-locale', [\App\Http\Controllers\LanguageController::class, 'index'])->name('changeLocale');
