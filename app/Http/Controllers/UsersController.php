<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['create', 'store']
        ]);
    }


    public function create()
    {
        return view('users.create');
    }
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|max:50|unique:users',
            'email' => 'required|email|unique:users|max:255',
            'password'=>'required|confirmed|min:6'

        ]);

        $user = User::create([
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);



        Auth::login($user);
        session()->flash('info', '注册成功');

        return redirect()->route('users.show', [$user]);
    }
    public function show(User $user)
    {
        $this->authorize('self', $user);

        return view('users.show', compact('user'));
    }



    public function edit(User $user)
    {
        $this->authorize('self', $user);

        return view('users.edit', compact('user'));
    }
    public function update(User $user, Request $request)
    {
        $this->authorize('self', $user);

        $this->validate($request, [
           'username'=>'required|max:50',
            'password'=>'nullable|confirmed|min:6'
        ]);

        $data=[];
        $data['username'] = $request->username;
        if($request->password)
        {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);
        session()->flash('info', '更新成功');
        return redirect()->route('users.edit', $user);
    }
}
