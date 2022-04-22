<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $tags;

    public function __construct()
    {
        $this->tags = Tag::orderBy('title')->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($post)
    {
        $post = Post::where('id', decrypt($post))->first();
        return view('posts.index', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tags = $this->tags;
        return view('posts.add',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $tags = [];
        $request->validated();
        foreach($request->tags as $tag){
            array_push($tags, decrypt($tag));
        }
        try{
            Post::create([
                'title' => $request->title,
                'description' => $request->description,
                'tags' => $tag,
                'author_id' => Auth::user()->id,
                'post_date' => $request->post_date,
            ]);
            return redirect()->route('home')->withSuccess(['New post added.']);
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($post)
    {
        try{
            $post = Post::find(decrypt($post));
            $tags = $this->tags;
            return view('posts.edit',compact('post','tags'));
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request)
    {
        $tags = [];
        $request->validated();
        foreach($request->tags as $tag){
            array_push($tags, decrypt($tag));
        }
        try{
            $post = Post::where('id', decrypt($request->post))->first();
            if($post->author_id == Auth::user()->id){
                $post->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'tags' => $tags,
                    'post_date' => $request->post_date,
                ]);
            }
            return redirect()->route('home')->withSuccess(['Post Updated.']);
        }
        catch(\Exception $e){
            dd($e->getMessage());
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($post)
    {
        try{
            $post = Post::find(decrypt($post));
            if($post->comments->count() == 0){
                $post->delete();
            }
            return redirect()->route('home')->withSuccess(['Post deleted successfully.']);
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }
}
