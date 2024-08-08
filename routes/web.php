<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Mail\JobPosted;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/about', 'about');
Route::view('/contact', 'contact');

//Route::get('mail', function (){
//    \Illuminate\Support\Facades\Mail::to('johndoe@example.com')->send(new JobPosted());
//    return 'done';
//});


Route::controller(JobController::class)->group(function () {

    Route::get('/jobs','index');
    Route::get('/jobs/create', 'create');
    Route::post('/jobs/create', 'store');

    Route::get('/jobs/edit/{job}', 'edit')
        ->middleware('auth')
        ->can('edit', 'job')
        ->can('delete', 'job');

    Route::patch('/jobs/edit/{job}', 'update');
    Route::delete('/jobs/delete/{job}', 'destroy')
        ->middleware('auth');

    Route::get('/jobs/{job}', 'show');

});

Route::controller(RegisteredUserController::class)->group(function () {
    Route::get('/register', 'create');
    Route::post('/register', 'store');
});

Route::controller(SessionController::class)->group(function () {
    Route::get('/login', 'create')->name('login');
    Route::post('/login', 'store');
    Route::post('/logout', 'destroy');

});

Route::controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'show')->middleware('auth');
   Route::get('/profile/edit', 'edit')->middleware('auth');
   Route::patch('/profile/edit', 'update')->middleware('auth');
   Route::delete('/profile/delete', 'destroy')->middleware('auth');

});



