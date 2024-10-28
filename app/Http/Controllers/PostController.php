<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // Apply middleware to ensure user is authenticated for certain actions
    public function __construct()
    {
        // Middleware to authenticate user for create, store, edit, update, and destroy actions
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    // Display a listing of the posts
    public function index()
    {
        $posts = Post::all(); // Fetch all posts
        return view('posts.index', compact('posts')); // Pass posts to the index view
    }

    // Show the form for creating a new post
    public function create()
    {
        return view('posts.create'); // Return the create post view
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
    
        // Create a new post with the user_id set to the authenticated user's ID
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id(), // Get the ID of the authenticated user
        ]);
    
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }
    

    

    

    // Alternatively, using findOrFail
    public function show($id)
    {
        try {
            $post = Post::findOrFail($id);
            return view('posts.show', compact('post'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('posts.index')->with('error', 'Post not found.');
        }
    }

    // Show the form for editing the specified post
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post')); // Pass the post to the edit view
    }

    // Update the specified post in storage
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update($request->only('title', 'content')); // Update post data

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.'); // Redirect with success message
    }

    // Remove the specified post from storage
    public function destroy(Post $post)
    {
        $post->delete(); // Delete the post
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.'); // Redirect with success message
    }

    // Dashboard for authenticated user to view their posts
    public function dashboard()
    {
        $posts = Post::where('user_id', Auth::id())->get(); // Fetch the authenticated user's posts
        return view('dashboard', compact('posts')); // Pass posts to the dashboard view
    }
}
