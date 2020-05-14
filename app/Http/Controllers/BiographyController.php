<?php

namespace App\Http\Controllers;

use App\Biography;
use Illuminate\Http\Request;

class BiographyController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function create () {
        return view('about/biography/create');
    }

    public function store () {
        Biography::create(request()->validate([
            'biography' => ['required', 'min:10']
          ]));
    
          return redirect('/about');    
    }

    public function edit () 
    {
        return view('about/biography/edit', [
            'biography' => Biography::first()
        ]);
    }

    public function update (Biography $biography) 
    {
        $biography->update(request()->validate([
            'biography' => ['required', 'min:10']
        ]));

        return redirect('/about');
    }
}
