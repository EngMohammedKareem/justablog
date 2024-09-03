<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve the search term from the request
        $searchTerm = request('search');

        if ($searchTerm) {
            // If a search term is present, retrieve posts with matching titles
            $posts = Post::where('title', 'like', '%' . $searchTerm . '%')->latest()->paginate(5);
        } else {
            // If no search term, get the current user's following IDs
            $user = Auth::user();
            $followingIds = $user->following->pluck('id');

            // Initialize a query for posts
            $query = Post::query();

            if ($followingIds->isNotEmpty()) {
                // If the user follows others, include their posts as well
                $query->whereIn('user_id', $followingIds);
            }

            // Also include the current user's own posts
            $query->orWhere('user_id', $user->id);

            // Fetch the posts, sorted by latest first
            $posts = $query->latest()->paginate(5);
        }

        // Return the view with the posts
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $request->user()->posts()->create([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'comments' => $post->comments()->with('user')->latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        Gate::authorize('update', $post);
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        Gate::authorize('update', $post);
        $post->update([
            'title' => $request->title,
            'body' => $request->body
        ]);
        return redirect()->route('posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function like(Post $post)
    {
        $post->increment('likes');
        return redirect()->route('posts.index');
    }
}
