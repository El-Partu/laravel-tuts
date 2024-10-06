<?php

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
Route::get('/jobs/{job}', function (Job $job) {

    return view('jobs.show',['job' => $job] );
});



//store a Job
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
Route::get('/jobs/{job}/edit', function (Job $job) {

return view('jobs.edit',['job' => $job] );
});

//Update a job
Route::patch('/jobs/{job}', function (Job $job) {
//authorize(hold....)

//validate
request()->validate([
    'title'=>['required', 'min:3'],
    'salary'=>['required']
]);


//update
$job->update([
    'title'=>request('title'),
    'salary'=>request('salary'),
]);

//persist
 return redirect('/jobs/'.$job->id);

});

//Delete a job
Route::delete('/jobs/{job}', function (Job $job) {
    //authorize(hold...)

    //delete
    $job->delete();


   //persist
   return redirect('/jobs');
});


Route::get('/contact', function () {
    return view('contact');
});
