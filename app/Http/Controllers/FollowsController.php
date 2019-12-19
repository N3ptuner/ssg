<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class FollowsController extends Controller
{
    public function store(User $user)
    {
        Auth::user()->follow($user);

        return redirect()->route('users.index');

    }
    public function destroy(User $user)
    {
        Auth::user()->unfollow($user);
        return redirect()->route('users.index');

    }
    public function followers(User $user)
    {
        $users = $user->followers()->get();
        return view('follows.followers', compact('users'));
    }
    public function followings(User $user)
    {
        $users = $user->followings()->get();
        return view('follows.followings', compact('users'));
    }
}
