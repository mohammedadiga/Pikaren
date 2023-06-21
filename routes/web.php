<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VcardController;
use App\Http\Controllers\LocalizationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () { return redirect()->route('login'); });

Route::resource('locale', LocalizationController::class);


Route::resource('admin', AdminController::class)->middleware([ 'auth', 'verified', 'isAdmin']);
Route::resource('user',  UserController::class )->middleware([ 'auth', 'verified']);

Route::resource('vcard', VcardController::class);



Route::middleware([ 'auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
});
