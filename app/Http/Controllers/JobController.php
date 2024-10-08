<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index(){
        $job = Job::with('employer')->latest()->simplePaginate(5);
        return view('jobs.index', [
            'jobs'=>$job
        ]);
    }

    public function show(Job $job){
        return view('jobs.show',['job' => $job] );
    }

    public function edit(Job $job){
        if(Auth::guest()){
            return redirect('/jobs');
        }
        return view('jobs.edit',['job' => $job] );
    }

    public function update(Job $job){
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
] );
//persist
return redirect('/jobs/'.$job->id);
    }

    public function destroy(Job $job){
        //authorize(hold...)

    //delete
    $job->delete();


    //persist
    return redirect('/jobs');
    }
    public function create(){
        return view('jobs.create');
    }
    public function store(){
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
    }
}
