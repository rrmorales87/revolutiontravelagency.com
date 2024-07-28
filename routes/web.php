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
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'home'])->name('home');

    Route::get('/subscription', [\App\Http\Controllers\BuilderController::class, 'index'])->name('subscription');
    //Reservations
    Route::get('/reservations/{origin?}/{destiny?}', [\App\Http\Controllers\ReservationsController::class, 'index'])->name('reservations');
    Route::post('/reservations/store', [\App\Http\Controllers\ReservationsController::class, 'store'])->name('reservations.store');
    Route::post('/reservations/confirm', [\App\Http\Controllers\ReservationsController::class, 'confirm'])->name('reservations.confirm');

    Route::middleware([
        'is.admin'
    ])->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'home'])->name('dashboard');
        //TopDestinations
        Route::get('/top-destinations', [\App\Http\Controllers\Admin\TopDestinationsController::class, 'index'])->name('topDestinations');
        Route::get('/top-destinations/create', [\App\Http\Controllers\Admin\TopDestinationsController::class, 'create'])->name('createTopDestinations');
        Route::get('/top-destinations/{id}', [\App\Http\Controllers\Admin\TopDestinationsController::class, 'edit'])->name('destination.edit');
        Route::put('/top-destinations', [\App\Http\Controllers\Admin\TopDestinationsController::class, 'update'])->name('destination.update');
        Route::delete('/top-destinations/{id}', [\App\Http\Controllers\Admin\TopDestinationsController::class, 'remove'])->name('destination.delete');
        Route::post('/top-destinations', [\App\Http\Controllers\Admin\TopDestinationsController::class, 'store'])->name('destination.store');
        Route::post('/store/image', [\App\Http\Controllers\ImageController::class, 'store'])->name('image.store');
        //Origins
        Route::get('/origins', [\App\Http\Controllers\Admin\OriginsController::class, 'index'])->name('origins');
        Route::get('/origins/create', [\App\Http\Controllers\Admin\OriginsController::class, 'create'])->name('create.origins');
        Route::get('/origins/{id}', [\App\Http\Controllers\Admin\OriginsController::class, 'edit'])->name('origins.edit');
        Route::put('/origins', [\App\Http\Controllers\Admin\OriginsController::class, 'update'])->name('origins.update');
        Route::delete('/origins/{id}', [\App\Http\Controllers\Admin\OriginsController::class, 'remove'])->name('origins.delete');
        Route::post('/origins', [\App\Http\Controllers\Admin\OriginsController::class, 'store'])->name('origins.store');
        //Users
        Route::get('/users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('user.index');
        Route::post('/changeRole', [\App\Http\Controllers\Admin\UserController::class, 'changeRole'])->name('user.change.roles');
        //Reservations
        Route::get('/admin/reservations', [\App\Http\Controllers\Admin\ReservationsController::class, 'index'])->name('reservations.admin.index');
        Route::get('/admin/reservations/new', [\App\Http\Controllers\Admin\ReservationsController::class, 'newReservation'])->name('reservations.admin.new');
        Route::get('/admin/reservations/{id?}', [\App\Http\Controllers\Admin\ReservationsController::class, 'confirmReservation'])->name('reservations.admin.confirm');
        Route::get('/admin/reservations/edit/{id?}', [\App\Http\Controllers\Admin\ReservationsController::class, 'editReservation'])->name('reservations.admin.edit');
        Route::post('/admin/reservations/approve', [\App\Http\Controllers\Admin\ReservationsController::class, 'approveReservation'])->name('reservations.admin.approve');
        Route::post('/admin/reservations/store', [\App\Http\Controllers\Admin\ReservationsController::class, 'storeReservation'])->name('reservations.admin.store');
        Route::post('/admin/reservations/update', [\App\Http\Controllers\Admin\ReservationsController::class, 'updateReservation'])->name('reservations.admin.update');
    });
});
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])->name("login");
Route::get('/signIn', [\App\Http\Controllers\LoginController::class, 'signIn'])->name("signIn");
Route::post('/inAction', [\App\Http\Controllers\LoginController::class, 'signInAction'])->name("signInAction");
Route::get('/signUp', [\App\Http\Controllers\LoginController::class, 'signUp'])->name("signUp");
Route::get('/login/google', [\App\Http\Controllers\GoogleLoginController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/login/google/callback', [\App\Http\Controllers\GoogleLoginController::class, 'handleGoogleCallback']);
Route::post('/register', [\App\Http\Controllers\LoginController::class, 'registerAction'])->name('register');
Route::post('/email-validate', [\App\Http\Controllers\LoginController::class, 'registerAction'])->name('register');
Route::get('/change-locale', [\App\Http\Controllers\LanguageController::class, 'index'])->name('changeLocale');
Route::get('/support', [\App\Http\Controllers\ContactUsController::class, 'index'])->name('support');
Route::get('/aboutUs', [\App\Http\Controllers\ContactUsController::class, 'index'])->name('support');
Route::post('/support_create', [\App\Http\Controllers\ContactUsController::class, 'create'])->name('support_create');
Route::get('/pprivacy', [\App\Http\Controllers\BuilderController::class, 'index'])->name('ppprivacity');
Route::get('/term', [\App\Http\Controllers\BuilderController::class, 'index'])->name('term');
