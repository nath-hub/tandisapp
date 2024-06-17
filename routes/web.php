<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\ForgotPassword;
use App\Http\Controllers\InvestController;
use App\Http\Controllers\PhaseController; 
use App\Http\Controllers\UserController;
use Laravel\Fortify\Http\Controllers\ProfileInformationController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')
->middleware('auth', 'verified');

Route::view('profile/edit',  'profile.edit')->name('profile.edit')->middleware('auth');

Route::get('/', [EnterpriseController::class, 'index'])->name('enterprise.index');

Route::get('/cont', function () {
    return view('contrat');
});

Route::group(['middleware' => ['web']], function () {

    Route::get('facebook/auth', [UserController::class, 'loginUsingFacebook'])->name('users.facebook');
    Route::get('facebook/callback', [UserController::class, 'callbackFromFacebook'])->name('callback');

    Route::get('auth/google', [UserController::class, 'redirectToGoogle'])->name('users.google');
    Route::get('callback/google', [UserController::class, 'handleCallback']);

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/create', [UserController::class, 'store'])->name('users.store');
        Route::get('/{user}/show', [UserController::class, 'show'])->name('users.show');
        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/update/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/{user}/delete', [UserController::class, 'destroy'])->name('users.destroy');
        Route::get('/logout', [Usercontroller::class, 'logout'])->name('users.logout')
            ->middleware('auth');

        Route::post('/forgot-password', [ForgotPassword::class, 'store']);
        Route::post('/forgot-password/{token}', [ForgotPassword::class, 'reset']);
    });

    Route::group(['prefix' => 'enterprise'], function () {
        Route::get('{enterprise}/show', [EnterpriseController::class, 'show'])->name('enterprise.show');
        Route::get('/{enterprise}/edit', [EnterpriseController::class, 'edit'])->name('enterprise.edit')->middleware('auth');
        Route::put('/{enterprise}/update', [EnterpriseController::class, 'update'])->name('enterprise.update');
 
        Route::get('/service', [EnterpriseController::class, 'service'])->name('home.service');
        Route::get('/contact', [EnterpriseController::class, 'contact'])->name('home.contact');
        Route::get('/projet', [EnterpriseController::class, 'projet'])->name('home.projet');
        Route::get('/about', [EnterpriseController::class, 'about'])->name('home.about');

    });

    Route::group(['prefix' => 'phase'], function () {
    Route::get('/', [PhaseController::class, 'index'])->name('phases.index');
    Route::get('/create', [PhaseController::class, 'create'])->name('phases.create');
    Route::post('store/', [PhaseController::class, 'store'])->name('phases.store');
    Route::get('/{phase}/show', [PhaseController::class, 'show'])->name('phases.show');
    Route::get('/{phase}/edit', [PhaseController::class, 'edit'])->name('phases.edit')->middleware('auth');
    Route::put('/{phase}/update', [PhaseController::class, 'update'])->name('phases.update')->middleware('auth');
    Route::delete('/{phase}/delete', [PhaseController::class, 'destroy'])->name('phases.destroy')->middleware('auth');
    });

    Route::group(['prefix' => 'invest'], function () {
        Route::get('/', [InvestController::class, 'index'])->name('invest.index');
        Route::get('/create/{enterprise}', [InvestController::class, 'create'])->name('invest.create')->middleware('auth');
        Route::post('/store/{enterprise}', [InvestController::class, 'store'])->name('invest.store')->middleware('auth');
        Route::get('/{invest}/show', [InvestController::class, 'show'])->name('invest.show');
        Route::get('/{invest}/edit', [InvestController::class, 'edit'])->name('invest.edit');
        Route::put('/{invest}/update', [InvestController::class, 'update'])->name('invest.update');
        Route::delete('/{invest}/delete', [InvestController::class, 'destroy'])->name('invest.destroy');
        Route::get('generate', [InvestController::class, 'succes']);
        Route::get('view-pdf', [ InvestController::class, 'viewPDF']);
        });
});     

Route::get('pdf', [InvestController::class, 'pdf']);