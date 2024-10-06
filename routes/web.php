<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {

    return view('home');
});

//All Jobs
Route::get('/jobs', function () {
    $job = Job::with('employer')->latest()->simplePaginate(5);
    return view('jobs.index', [
        'jobs'=>$job
    ]);
});

//Create Job
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

//Show a job
Route::get('/jobs/{id}', function ($id) {

        $job = Job::find( $id );
    return view('jobs.show',['job' => $job] );
});



//Add a new Job
Route::post('/jobs', function () {
    request()->validate([
'title'=>['required', 'min:3'],
'salary'=>['required'],
    ]);
  Job::create([
    'title'=> request('title'),
    'salary'=>request('salary'),
    'employer_id'=>1,
  ]);

  return redirect('/jobs');
});

//Edit a Job
Route::get('/jobs/{id}/edit', function ($id) {

    $job = Job::find( $id );
return view('jobs.edit',['job' => $job] );
});
Route::get('/contact', function () {
    return view('contact');
});
