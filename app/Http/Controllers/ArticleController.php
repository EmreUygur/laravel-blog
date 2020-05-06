<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {
        if (request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else {
            $articles = Article::latest()->get();
        }

        return view('blog.index', [
            "articles" => $articles,
            "tags" => Tag::all()
        ]);
    }


    public function create()
    {
        return view('blog.create', [
            "tags" => Tag::all()
        ]);
    }


    public function store()
    {
        
        $article = new Article($this->validation());
        $article->save();

        $article->tags()->attach(request('tags'));
    
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
            "article" => $article,
            "tags" => Tag::all()
        ]);
    }


    public function update(Article $article)
    {
        $article->update($this->validation());

        $article->tags()->detach();
        $article->tags()->attach(request('tags'));

        return view('blog.show', [
            "article" => $article
        ]);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect('/blog');    
    }

    protected function validation() {
        return request()->validate([
            'title' => ['required', 'min:3'],
            'excerpt' => ['required', 'min:3'],
            'body' => ['required', 'min:50'],
            'tags' => 'exists:tags,id'
        ]);
    }
}
