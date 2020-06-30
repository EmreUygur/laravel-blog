<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use SEOMeta;
use OpenGraph;
use Twitter;

class ArticleController extends Controller
{

    public function index()
    {
        SEOMeta::setTitle('Emre UYGUR | Blog');
        SEOMeta::setDescription('Bits & pieces about software development');
        SEOMeta::setCanonical('https://www.emre-uygur.com/blog');
 
        OpenGraph::setDescription('Emre UYGUR | Blog');
        OpenGraph::setTitle('Bits & pieces about software development');
        OpenGraph::setUrl('https://www.emre-uygur.com/blog');
        OpenGraph::addProperty('type', 'articles');
 
        Twitter::setTitle('Emre UYGUR | Blog');
        Twitter::setSite('@eemreuygur');

        if (request('tag')) {
            $tag = Tag::where('name', request('tag'))->firstOrFail();
            $articles = $tag->articles;
            $title = "Articles related with ".$tag->name;
        }else if( request("search") !== NULL && request("search") != "") {
            $articles = Article::where("title", "LIKE", "%".request("search")."%")
                ->orWhere("excerpt", "LIKE", "%".request("search")."%")->latest()->get();

            if (count($articles)) {
                $title = "Search results for '".request("search")."'";
            } else {
                $title = "No results found for '".request("search")."'";
                $articles = Article::latest()->get();
            }
        } else {
            $articles = Article::latest()->get();
            $title = NULL;
        }

        return view('blog.index', [
            "articles" => $articles,
            "tags" => Tag::all(),
            "title" => $title
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
        
        $article = new Article($this->validation(NULL));

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


    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        SEOMeta::setTitle($article->title);
        SEOMeta::setDescription($article->excerpt);
        SEOMeta::setCanonical('https://www.emre-uygur.com/blog/articles/'.$article->slug);
        if(count($article->tags)){
            $keywords = array();
            foreach ($article->tags as $tag) {
                array_push($keywords, $tag->name);
            }
            SEOMeta::addKeyword($keywords);
        }
 
        OpenGraph::setTitle($article->title);
        OpenGraph::setDescription($article->description);
        OpenGraph::setUrl('https://www.emre-uygur.com/blog/articles/'.$article->slug);
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addImage('https://www.emre-uygur.com/storage/cover_images/'.$article->cover_image);
 
        Twitter::setTitle('Emre UYGUR | Blog');
        Twitter::setSite('@eemreuygur');

        return view('blog.show', [
            "article" => $article
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
        
        $this->validation($id);

        
        if($request->hasFile('cover_image')) {
            $filename = $request->file('cover_image')->getClientOriginalName();
            $extension = $request->file('cover_image')->extension();

            $fileNameToStore = $filename."_".time().".".$extension;

            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
            if($article->cover_image != 'noimage.jpg') {
                Storage::delete('public/cover_images/'.$article->cover_image);
            }
            $article->cover_image = $fileNameToStore;
        }
        
        $article->title = $request->title;
        $article->excerpt = $request->excerpt;
        $article->slug = $request->slug;
        $article->body = $request->body;
        $article->save();

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

    protected function validation($id) {
        return request()->validate([
            'title' => ['required', 'min:3'],
            'excerpt' => ['required', 'min:3'],
            'slug' => "required|min:3|unique:articles,slug,".$id,
            'cover_image' => 'image|nullable|max:1999',
            'body' => ['required', 'min:50'],
            'tags' => 'exists:tags,id',
        ]);
    }
}
