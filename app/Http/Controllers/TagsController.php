<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store() {
        Tag::create(request()->validate([
            "name" => ["required", "min:3"]
        ]));

        return response()->json([
            'message' => 'New post created'
        ]);
    }
}
