<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 'admin' && Auth::user()->role !== 'editor') {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        $userId = Auth::id();
        $posts = Post::where('user_id', $userId)->latest()->paginate(10); // Get 10 latest posts with pagination as special feature.
        return view('admin.posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id); // Get post with id.
        return view('admin.posts.show', compact('post'));
    }

    public function create()
    {
        // dd('test');
        if (Auth::user()->role !== 'admin' && Auth::user()->role !== 'editor') {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $request->request->add(['user_id' => Auth::id()]);

        Post::create($request->all());

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        if (Auth::user()->role !== 'admin' && Auth::id() !== $post->user_id || Auth::user()->role == 'viewer' ) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $post->update($request->all());
        if (Auth::user()->role === 'admin' && $post->user_id != Auth::id()) {
            return redirect()->route('dashboard')->with('success', 'Post updated successfully.');
        };
        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
