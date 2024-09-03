<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
}
