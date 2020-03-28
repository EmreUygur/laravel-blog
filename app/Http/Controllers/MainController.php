<?php

namespace App\Http\Controllers;

use App\Biography;
use App\Job;
use App\Education;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biography = Biography::first();
        $jobs = Biography::all();
        $educations = Biography::all();

        return view('about.index', [
            'biography' => $biography,
            'jobs' => $jobs,
            'educations' => $educations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Biography  $biography
     * @return \Illuminate\Http\Response
     */
    public function show(Biography $biography)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Biography  $biography
     * @return \Illuminate\Http\Response
     */
    public function edit(Biography $biography)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Biography  $biography
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Biography $biography)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Biography  $biography
     * @return \Illuminate\Http\Response
     */
    public function destroy(Biography $biography)
    {
        //
    }
}
