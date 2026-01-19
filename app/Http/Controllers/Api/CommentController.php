<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return response()->json($post->comments);
    }

    public function store(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'author_name' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $comment = $post->comments()->create($validated);

        return response()->json($comment, 201);
    }
}
