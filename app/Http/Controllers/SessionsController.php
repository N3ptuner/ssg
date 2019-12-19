<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }
    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            session()->flash('info', '欢迎回来！');
            return redirect()->route('home');
        }
        else
        {
            session()->flash('info', '登陆错误');
            return redirect()->back()->withInput();
        }
    }
    public function destroy()
    {
        Auth::logout();
        session()->flash('info', '账户已登出');
        return redirect('login');
    }
}
