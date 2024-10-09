<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/','home');

Route::controller(JobController::class)->group(function(){
    Route::get('/jobs',  'index');
    Route::get('/jobs/create', 'create')->middleware('auth');
    Route::get('/jobs/{job}', 'show');
    Route::post('/jobs', 'store');

    Route::get('/jobs/{job}/edit',  'edit')
    ->middleware('auth')
    ->can('edit','job');

    Route::patch('/jobs/{job}', 'update');

    Route::delete('/jobs/{job}', 'destroy')
    ->middleware('auth')
    ->can('edit','job');

});
// Route::resource('jobs', JobController::class)->middleware('auth');
Route::view('/contact', 'contact');
//All Jobs

//sign up
Route::get('/register',[RegisterUserController::class, 'create']);
Route::post('/register',[RegisterUserController::class, 'store']);

//login

Route::get('/login',[SessionController::class, 'create'])->name('login');
Route::post('/login',[SessionController::class, 'store']);

Route::post('/logout',[SessionController::class, 'destroy']);
