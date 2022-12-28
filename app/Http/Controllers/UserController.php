<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        // return 'Estou no UserController.show '. $u;
        // return $user;
        return view('user', [
            'user' => $user,
        ]);
    }

    public function index()
    {
        // $user = User::all();
        $user = User::orderBy('name')->get();
        return view('users', compact('user'));
    }
}
