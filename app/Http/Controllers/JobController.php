<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
  
    public function __construct(){
        $this->middleware('auth');
    }

    public function create() {
        return view('/about/job/create');
    }
  
    public function store() {
      Job::create(request()->validate([
        'company' => ['required', 'min:3'],
        'position' => ['required', 'min:3'],
        'started_at' => ['required', 'min:3'],
        'quitted_at' => ['required', 'min:3'],
        'note' => ['nullable']
      ]));
  
      return redirect('/about');
    }
  
    public function edit(Job $job) {
      return view('/about/job/edit', [
        'job' => $job
      ]);
    }
  
    public function update(Job $job) {
  
      $job->update(request()->validate([
        'company' => ['required', 'min:3'],
        'position' => ['required', 'min:3'],
        'started_at' => ['required', 'min:3'],
        'quitted_at' => ['required', 'min:3'],
        'note' => ['nullable']
      ]));
  
      return redirect('/about');
    }
}
