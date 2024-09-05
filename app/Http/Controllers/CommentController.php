<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use function Pest\Laravel\post;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => ['required', 'string', 'max:255'],
        ]);

        $post->comments()->create([
            'user_id' => Auth::user()->id,
            'body' => $request->body
        ]);

        return redirect()->back()->withFragment('comments');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post, Comment $comment)
    {
        Gate::authorize('update', $comment);
        return view('comments.edit', [
            'comment' => $comment,
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post, Comment $comment)
    {
        Gate::authorize('update', $comment);
        $comment->update([
            'body' => $request->body
        ]);
        return redirect()->route('posts.show', $post)->withFragment('comments')->with("comment_updated", "Comment updated! successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, Comment $comment)
    {
        Gate::authorize('delete', $comment);
        $comment->delete();
        return redirect()->route('posts.show', $post)->withFragment('comments')->with("comment_deleted", "Comment deleted! successfully");
    }
}
