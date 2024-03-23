<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        $categories= Category::all();
        $tags= Tag::all();
        return view('blogCrud.post.index',compact('posts','categories','tags'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags =Tag::all();
        return view('blogCrud.post.createAndEdit',compact('categories','tags'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = Post::create([
            "title" => $request->title,
            "slug" => $request->title,
            "content" => $request->content,
            "categoryId" => $request->categoryId,
            'userId' => Auth::user()->id,
        ]);
        $post->tags()->attach(request("tags"));
        return redirect()->route("posts")->with("success", "");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags =Tag::all();
        return view('blogCrud.post.createAndEdit',compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        }
        $post->update([
            "title" => $request->title,
            "slug" => $request->title,
            "content" => $request->content,
            "categoryId" => $request->categoryId,
            'userId' => Auth::user()->id
        ]);
        return redirect()->route("posts")->with("successUpdate", "Post Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route("posts")->with("success", "");
    }
}
