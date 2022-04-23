<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $tags;

    public function __construct()
    {
        $this->tags = Tag::orderBy('title')->get();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::latest()->paginate(2);
        $tags = $this->tags;
        return view('home', compact('posts','tags'));
    }

    public function filter(Request $request){
        if($request->filter == 'all'){
            return redirect()->route('home');
        }
        $currentFilter = isset($request->filter) ? $request->filter : session()->get('filter');
        $tag = Tag::where('title', $currentFilter)->first()->id;
        if(isset($request->filter)) session()->put('filter', $currentFilter);
        $posts = Post::whereJsonContains('tags',$tag)->orderBy('created_at','DESC')->paginate(2);
        $tags = $this->tags;
        return view('home', compact('posts','tags','currentFilter'));
    }
}
