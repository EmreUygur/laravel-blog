<?php

namespace App\Http\Controllers;

use App\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function create() 
    {
        return view('/about/education/create');
    }
  
    public function store() 
    {
        Education::create(request()->validate([
          'school_name' => ['required', 'min:3'],
          'department_name' => ['required', 'min:3'],
          'gpa' => ['nullable'],
          'note' => ['nullable'],
          'started_at' => ['required', 'min:3'],
          'finished_at' => ['required', 'min:3']
        ]));
  
        return redirect('/about');
    }
  
    public function edit(Education $education) 
    {
        return view('/about/education/edit', [
          'education' => $education
        ]);
    }
  
    public function update(Education $education) {
  
        $education->update(request()->validate([
          'school_name' => ['required', 'min:3'],
          'department_name' => ['required', 'min:3'],
          'gpa' => ['nullable'],
          'note' => ['nullable'],
          'started_at' => ['required', 'min:3'],
          'finished_at' => ['required', 'min:3']
        ]));
  
        return redirect('/about');
    }
}
