<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index')->with(['comments' => $comments]);
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        Comment::create([
            'comment' => $request->comment,
            'name' => $request->name,
            'email' => $request->email,
            'post_id' => $id,
        ]);
        return redirect()->back();
    }

    public function delete(string $id)
    {
        Comment::destroy($id);
        return redirect()->back();
    }
}
