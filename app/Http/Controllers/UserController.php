<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function show($username)
    {
        $user = User::where('username', $username)->firstorFail();
        return view('users.show', ['user' => $user, 'posts' => $user->posts()->with(['user', 'likes'])->latest()->get()]);
    }
    public function follow($username)
    {
        $user = User::where('username', $username)->firstorFail();
        if (Auth::user()->id === $user->id) {
            return redirect()->back();
        }
        Auth::user()->following()->attach($user->id);
        return redirect()->back();
    }

    public function unfollow($username)
    {
        $user = User::where('username', $username)->firstorFail();
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
