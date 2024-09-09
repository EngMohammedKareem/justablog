<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ReplyController extends Controller
{
    public function store(Request $request, Post $post, Comment $comment)
    {
        $request->validate([
            'body' => 'required|string|max:255',
        ]);

        $comment->replies()->create([
            'body' => $request->body,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('posts.show', $post)->with('reply_created', 'Reply created successfully!');
    }


    public function edit(Post $post, Comment $comment, Reply $reply)
    {
        Gate::authorize('update', $reply);
        return view('replies.edit', [
            'reply' => $reply,
            'post' => $post,
            'comment' => $comment
        ]);
    }


    public function update(Request $request, Post $post, Comment $comment, Reply $reply)
    {
        Gate::authorize('update', $reply);
        $reply->update($request->all());
        return redirect()->route('posts.show', $post)->with('reply_updated', 'Reply updated successfully!');
    }


    public function destroy(Post $post, Comment $comment, Reply $reply)
    {
        Gate::authorize('delete', $reply);
        $reply->delete();
        return redirect()->route('posts.show', $post)->with('reply_deleted', 'Reply deleted successfully!');
    }
}
