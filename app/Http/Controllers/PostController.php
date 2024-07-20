<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        Post::create($request->all());
        return redirect('posts')->with('success', 'Post created successfully.');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('Post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return redirect('posts')->with('success', 'Post updated successfully.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('posts')->with('success', 'Post deleted successfully.');
    }
    //
}
