<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
        // if(Auth::guest()){
        //     return redirect('/login');
        // }

        //can or cannot authorization
    //    if( Auth::user()->can('edit-job', $job)){
    //         //
    //    };


        // Gate::authorize('edit-job', $job); //allows or denies
        // if($job->employer->user->isNot(Auth::user())){
        //     abort(403,'You cannot edit this job.');
        // }
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

                $user = Auth::user();
                $employer = Employer::create([
                    'user_id'=>$user->id,
                    'name'=> $user->name,
                ]);


              Job::create([
                'title'=> request('title'),
                'salary'=>request('salary'),
                'employer_id'=>$employer->id,
              ]);

              return redirect('/jobs');
    }
}
