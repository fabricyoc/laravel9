<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        // dd($user->hasPosts());


        // $user->hasPosts()->create([
        //     'title' => 'Meu primeiro post',
        //     'body' => 'Isso é um post',
        // ]);

        dd($user->hasPosts);

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
