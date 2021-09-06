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
        'developers' => \App\Models\User::developer()->orderBy('id')->get(),
        'templates' => \App\Models\Template::whereHas('elements')->paginate(3),
    ]);
})->name('home');

Route::get('/profile/{user?}', [App\Http\Controllers\UserController::class,'show'] )->name('profile');
Route::post('/mail/send',[App\Http\Controllers\MailController::class,'store'])->name('mail.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/email/verify', function () { return view('auth.verify-email'); })->name('verification.notice');

    Route::post('/profile/update', [App\Http\Controllers\UserController::class,'update'] )->name('profile.update');
});

Route::get('/storage/emails/{email}/attachments/{media}/{filename}', function ($email,$media,$filename){
    return response()->file(storage_path('app/emails/'.$email.'\/attachments/'.$media.'/'.$filename));
})->middleware('admin');

require __DIR__.'/auth.php';
