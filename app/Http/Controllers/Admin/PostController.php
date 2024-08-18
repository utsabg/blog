<?php
// namespace App\Http\Controllers\Admin;
namespace App\Http\Controllers\Admin;


use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // View all posts (for viewers, editors, and admins)
    public function index()
    {
        if (Auth::user()->role == 'editor') {
            // Show only the editor's own posts
            $posts = Post::where('user_id', Auth::id())->get();
        } else {
            // Show all posts for viewers and admins
            $posts = Post::all();
        }

        return view('posts.index', compact('posts'));
    }

    public function allpost()
    {

            // Show all posts for viewers and admins
            $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    // Show a single post
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    // Create a post (only for editors and admins)
    public function create()
    {
        return view('posts.create');
    }

    // Store a new post (only for editors and admins)
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = Auth::id();
        $post->save();

        return redirect()->route('posts.index');
    }

    // Edit a post (only for the post owner or admin)
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        // Ensure only the owner or an admin can edit
        if (Auth::user()->role != 'admin' && $post->user_id != Auth::id()) {
            return redirect()->route('posts.index');
        }

        return view('posts.edit', compact('post'));
    }

    // Update a post (only for the post owner or admin)
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        if (Auth::user()->role != 'admin' && $post->user_id != Auth::id()) {
            return redirect()->route('posts.index');
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('posts.index');
    }

    // Delete a post (only for the post owner or admin)
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if (Auth::user()->role != 'admin' && $post->user_id != Auth::id()) {
            return redirect()->route('posts.index');
        }

        $post->delete();

        return redirect()->route('posts.index');
    }
}
