<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::view('/','home');

// Route::controller(JobController::class)->group(function(){
//     Route::get('/jobs',  'index');
//     Route::get('/jobs/create', 'create');
//     Route::get('/jobs/{job}', 'show');
//     Route::post('/jobs', 'store');
//     Route::get('/jobs/{job}/edit',  'edit');
//     Route::patch('/jobs/{job}', 'update');
//     Route::delete('/jobs/{job}', 'delete');
// });
Route::resource('jobs', JobController::class);
Route::view('/contact', 'contact');
//All Jobs

//sign up
Route::get('/register',[RegisterUserController::class, 'create']);
Route::post('/register',[RegisterUserController::class, 'store']);

//login

Route::get('/login',[SessionController::class, 'create']);
