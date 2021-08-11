<?php

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

Route::get('/', function () {
    return view('home',[
        'developers' => \App\Models\User::developer()->get(),
    ]);
})->name('home');

Route::get('/profile/{user?}', [App\Http\Controllers\UserController::class,'show'] )->name('profile');

Route::middleware(['auth'])->group(function () {
    Route::post('/profile/update', [App\Http\Controllers\UserController::class,'update'] )->name('profile.update');
});

require __DIR__.'/auth.php';
