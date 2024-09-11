<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve the search term from the request
        $searchTerm = request('search');

        // Initialize query for posts
        $query = Post::query()->latest()->with(['user', 'likes', 'comments']);

        if ($searchTerm) {
            // Apply search filter
            $query->where('title', 'like', '%' . $searchTerm . '%');
        } else {
            // Get the current user's following IDs
            $user = Auth::user();
            $followingIds = $user->following->pluck('id');

            if ($followingIds->isNotEmpty()) {
                // Include posts from users the current user follows
                $query->whereIn('user_id', $followingIds);
            }

            // Include the current user's own posts
            $query->orWhere('user_id', $user->id);
        }

        // Fetch posts with pagination
        $posts = $query->paginate(5);
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
        // Validate request data
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        // Create new post
        $request->user()->posts()->create($request->only('title', 'body'));

        // Redirect with success message
        return redirect()->route('posts.index')->with('post_created', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // Load relationships eagerly
        $post = $post->load(['user', 'likes', 'comments.user']);

        // Paginate comments
        $comments = $post->comments()->with('user')->latest()->paginate(5);

        // Return the view with the post and comments
        return view('posts.show', [
            'post' => $post,
            'comments' => $comments
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // Authorize user
        Gate::authorize('update', $post);

        // Return the view with the post
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Authorize user
        Gate::authorize('update', $post);

        // Validate request data
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        // Update the post
        $post->update($request->only('title', 'body'));

        // Redirect with success message
        return redirect()->route('posts.show', $post)->with('post_updated', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Authorize user
        Gate::authorize('delete', $post);

        // Delete the post
        $post->delete();

        // Redirect with success message
        return redirect()->route('posts.index')->with('post_deleted', 'Post deleted successfully!');
    }

    /**
     * Toggle like status of a post.
     */
    public function like(Post $post)
    {
        $userId = Auth::user()->id;
        $like = Like::where('post_id', $post->id)->where('user_id', $userId)->first();

        if ($like) {
            // If like exists, delete it
            $like->delete();
        } else {
            // If like does not exist, create it
            Like::create([
                'post_id' => $post->id,
                'user_id' => $userId
            ]);
        }

        // Redirect back with a success message
        return redirect()->back();
    }

    public function report(Post $post)
    {
        $embed = ['embeds' => [[
            'title' => $post->title,
            'description' => $post->body,
            'color' => 16711680,
            'url' => URL::route('posts.show', $post->id),
            'footer' => [
                'text' => 'Reported by ' . Auth::user()->name . "at " . now()
            ]
        ]]];

        $resp = Http::post(env('DISCORD_WEBHOOK'), $embed);
        if ($resp->successful()) {
            return redirect()->back()->with('post_reported', 'Post reported successfully!');
        } else {
            return redirect()->back()->with('post_report_failed', 'Post report failed!');
        }
        return redirect()->back();
    }
}
