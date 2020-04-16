<?php

namespace App\Http\Controllers;

use App\Biography;
use App\Job;
use App\Education;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home () 
    {
        return view('index');
    }
    
    public function about()
    {
        $biography = Biography::first();
        $jobs = Job::orderby('id', 'desc')->get();
        $educations = Education::orderby('finished_at', 'desc')->get();


        return view('about.index', [
            'biography' => $biography,
            'jobs' => $jobs,
            'educations' => $educations
        ]);
    }

    public function contact() 
    {
        return view('contact');
    }
}
