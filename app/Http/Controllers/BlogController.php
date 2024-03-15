<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function posts()
    {
        $categories = Category::all();
        $posts = Post::all();
        return view('posts')->with(['posts' => $posts, 'categories' => $categories]);
    }
    public function single_post($id)
    {
        $categories = Category::all();
        $tags = Post::pluck('tag');
        $post = Post::findorfail($id);
        $comments = Comment::where('post_id', $post->id)->get();
        return view('post')->with(['post' => $post, 'categories' => $categories, 'tags' => $tags, 'comments' => $comments]);
    }
}
