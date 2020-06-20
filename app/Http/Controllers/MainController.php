<?php

namespace App\Http\Controllers;

use App\Biography;
use App\Job;
use App\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


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

    public function submitContact() {
        request()->validate([
            "name" => "required|min:3",
            "email" => "required|email",
            "message" => "required|min:5"
        ]);

        $data = [
            "name" => request("name"),
            "email" => request("email"),
            "body" => request("message")
        ];

        Mail::send("email.index", $data, function ($message) {
            $message->to("emre.uygur@outlook.com")
                ->from("eemreuygur@gmail.com", "www.emre-uygur.com")
                ->subject("Contact Form submitted by ".request("name"));
        });

        return view('contact')->with('successMsg', 'Form successfully sent!');
    }
}
