<?php

namespace App\Http\Controllers;

use App\Biography;
use App\Job;
use App\Education;
use App\User;
use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use SEOMeta;
use OpenGraph;
use Twitter;


class MainController extends Controller
{
    public function home () 
    {
        SEOMeta::setTitle('Home');
        SEOMeta::setDescription('Bits & pieces about software development');
        SEOMeta::setCanonical('https://www.emre-uygur.com');
 
        OpenGraph::setDescription('Emre UYGUR | Computer Engineer');
        OpenGraph::setTitle('Bits & pieces about software development');
        OpenGraph::setUrl('https://www.emre-uygur.com');
        OpenGraph::addProperty('type', 'articles');
 
        Twitter::setTitle('Emre UYGUR | Computer Engineer');
        Twitter::setSite('@eemreuygur');

        return view('index');
    }

    public function dashboard () 
    {
        return view('dashboard');
    }
    
    public function about()
    {

        SEOMeta::setTitle('About Me');
        SEOMeta::setDescription('Get the know about me');
        SEOMeta::setCanonical('https://www.emre-uygur.com/about');
 
        OpenGraph::setDescription('About Me');
        OpenGraph::setTitle('Get the know about me');
        OpenGraph::setUrl('https://www.emre-uygur.com/about');
        OpenGraph::addProperty('type', 'articles');
 
        Twitter::setTitle('About Me');
        Twitter::setSite('@eemreuygur');

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
        SEOMeta::setTitle('Contact Me');
        SEOMeta::setDescription('I would be happy if you contact with me');
        SEOMeta::setCanonical('https://www.emre-uygur.com/contact');
 
        OpenGraph::setTitle('Contact Me');
        OpenGraph::setDescription('I would be happy if you contact with me');
        OpenGraph::setUrl('https://www.emre-uygur.com/contact');
        OpenGraph::addProperty('type', 'articles');
 
        Twitter::setTitle('Contact Me');
        Twitter::setSite('@eemreuygur');

        return view('contact');
    }

    public function submitContact() {
        request()->validate([
            "name" => "required|min:3",
            "email" => "required|email",
            "message" => "required|min:5"
        ]);

        Mail::to(env("MAIL_TO_ADDRESS"))
            ->send(new Contact(request("name"), request("email"), request("message")));

        return view('contact')->with('successMsg', 'Form successfully sent!');
    }

    public function updateUser($id, Request $request) {
        if ($request->name === "" && $request->email === "") {
            return response()->json([
                'success' => false,
                'message' => 'You should fill at least 1 field'
            ]);
        }
        
        $user = User::find($id);


        if (isset($request->email) && $request->email !== "") {
            if (filter_var($request->email, FILTER_VALIDATE_EMAIL) != false) {
                $user->email = $request->email;
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Email is not valid'
                ]);
            }
        }

        if (isset($request->name) && $request->name !== "") {
            $user->name = $request->name;
            config(["app.name" => $request->name]);
            \Artisan::call('cache:clear');
            \Artisan::call('config:clear');
            \Artisan::call('view:clear');
        }
        
        $user->save();

        return response()->json([
            'success' => true,
            'message' => "User Informations Updated"
        ]);
    }

    public function changePassword ($id, Request $request) {
        if(is_null($request->old) || is_null($request->new) || is_null($request->confirm)) {
            return response()->json([
                'success' => false,
                'message' => "Fields cannot be empty"
            ]);
        }
        $user = User::find($id);

        if(Hash::check($request->old, $user->password)) {
            $newHashedPw = Hash::make($request->confirm);
            if(Hash::check($request->new, $newHashedPw)) {
                $user->password = $newHashedPw;
                $user->save();
                return response()->json([
                    'success' => true,
                    'message' => "Password Changed"
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => "New password correction failed"
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => "Incorrect old password"
            ]);
        }
    }

    public function changeAvatar($id, Request $request) {

        if(is_null($request)) {
            return response()->json([
                'success' => false,
                'message' => 'File input cannot be null'
            ]);
        }

        $exploded = explode(',', $request->file);
        $decoded = base64_decode($exploded[1]);

        if(!Str::contains($exploded[0], 'jpeg')) {
            return response()->json([
                'success' => false,
                'message' => 'Image type should be JPG'
            ]);
        }

        $path = public_path().'\images\Avatar.jpg';
        file_put_contents($path, $decoded);

        return response()->json([
            'success' => true,
            'message' => 'Avatar Successfully Changed'
        ]);
    }
}
