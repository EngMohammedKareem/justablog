<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function show(User $user)
    {
        return view('users.show', ['user' => $user, 'posts' => $user->posts()->with('user')->latest()->get()]);
    }
    public function follow(User $user)
    {
        if (Auth::user()->id === $user->id) {
            return redirect()->back();
        }
        Auth::user()->following()->attach($user->id);
        return redirect()->back();
    }

    public function unfollow(User $user)
    {
        if (Auth::user()->id === $user->id) {
            return redirect()->back();
        }
        Auth::user()->following()->detach($user->id);
        return redirect()->back();
    }

    public function search(Request $request)
    {
        if (request('username')) {
            $users = User::where('username', 'like', '%' . request('username') . '%')->get();
            return view('users.search', ['users' => $users]);
        }
        return view('users.search');
    }

    public function followers(User $user)
    {
        $followers =  $user->follower()->get();
        return view('users.followers', ['followers' => $followers, 'user' => $user]);
    }

    public function following(User $user)
    {
        $following =  $user->following()->get();
        return view('users.following', ['following' => $following, 'user' => $user]);
    }
}
