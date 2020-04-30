<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {
        return view('blog.index', [
            "articles" => Article::all()
        ]);
    }


    public function create()
    {
        return view('blog.create');
    }


    public function store()
    {
        Article::create(request()->validate([
            'title' => ['required', 'min:3'],
            'excerpt' => ['required', 'min:3'],
            'body' => ['required', 'min:50']
          ]));
    
        return redirect('/blog');    
    }


    public function show($id)
    {
        return view('blog.show', [
            "article" => Article::find($id)
        ]);
    }


    public function edit(Article $article)
    {
        return view("blog.edit", [
            "article" => $article
        ]);
    }


    public function update(Article $article)
    {
        $article->update(request()->validate([
            'title' => ['required', 'min:3'],
            'excerpt' => ['required', 'min:3'],
            'body' => ['required', 'min:50']
        ]));

        return view('blog.show', [
            "article" => $article
        ]);
    }


    public function destroy($id)
    {
        //
    }
}
