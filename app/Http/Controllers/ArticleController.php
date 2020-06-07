<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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


    public function store(Request $request)
    {
        
        $article = new Article($this->validation());

        if($request->hasFile('cover_image')) {
            $filename = $request->file('cover_image')->getClientOriginalName();
            $extension = $request->file('cover_image')->extension();

            $fileNameToStore = $filename."_".time().".".$extension;

            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = "noimage.jpg";
        }

        $article->cover_image = $fileNameToStore;

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


    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        
        $this->validation();

        
        if($request->hasFile('cover_image')) {
            $filename = $request->file('cover_image')->getClientOriginalName();
            $extension = $request->file('cover_image')->extension();

            $fileNameToStore = $filename."_".time().".".$extension;

            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
            $article->cover_image = $fileNameToStore;
            if($article->cover_image != 'noimage.jpg') {
                Storage::delete('public/cover_images/'.$article->cover_image);
            }
        }

        $article->tags()->detach();
        $article->tags()->attach(request('tags'));

        return view('blog.show', [
            "article" => $article
        ]);
    }

    public function destroy(Article $article)
    {
        if($article->cover_image != 'noimage.jpg') {
            Storage::delete('public/cover_images/'.$article->cover_image);
        }
        $article->delete();

        return redirect('/blog');    
    }

    protected function validation() {
        return request()->validate([
            'title' => ['required', 'min:3'],
            'excerpt' => ['required', 'min:3'],
            'cover_image' => 'image|nullable|max:1999',
            'body' => ['required', 'min:50'],
            'tags' => 'exists:tags,id',
        ]);
    }
}
