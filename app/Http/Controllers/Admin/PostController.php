<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tags = Post::pluck('tag');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $image = $request->file('image');
        $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('posts/images'), $imageName);
        Post::create([
            'title' => $request->title,
            'tag' => $request->tag,
            'image' => $imageName,
            'content' => $request->content,
            'categroy_id' => $request->categroy_id
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findorfail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        $post = Post::findorfail($id);
        $image_name = $post->image;
        if ($request->hasFile('image')) {
            unlink(public_path("posts/images/$image_name"));
            $image = $request->file('image');
            $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('posts/images/'), $image_name);
        }
        $post->update([
            'title' => $request->title,
            'tag' => $request->tag,
            'image' => $image_name,
            'content' => $request->content,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::destroy($id);
    }
}
