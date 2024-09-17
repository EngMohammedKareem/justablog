<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{

    public function index()
    {
        $notifications = auth()->user()->notifications()->paginate(10);
        return view('users.notifications', ['notifications' => $notifications]);
    }

    public function destroy()
    {
        auth()->user()->notifications()->delete();
        return redirect()->back();
    }
}
