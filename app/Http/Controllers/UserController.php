<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users=User::get();
        return view('users.index',compact('users'));
    }
    public function admin($id)
    {
        $user= User::findOrFail($id);
        $user->role='admin';
        $user->save();
        return redirect()->back();
    }
    public function customer($id)
    {
        $user= User::findOrFail($id);
        $user->role='customer';
        $user->save();
        return redirect()->back();
    }
}