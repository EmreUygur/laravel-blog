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
        $biography = Biography::first();

        if($biography == NULL) {
            return view('about/biography/create');
        }

        return view('about/biography/edit', [
            'biography' => $biography
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
