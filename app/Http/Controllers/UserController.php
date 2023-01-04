<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {

        // Relação N:N
        // attach vai linkando
        // $user->teams()->attach(2); // attach cria um link entre o usuário e o time de número 1
        // $user->teams()->detach(2); // deslinka

        dd($user->load('teams')->toArray());

        return $user->teams;






        // dd($user->hasPosts());


        // $user->hasPosts()->create([
        //     'title' => 'Meu primeiro post',
        //     'body' => 'Isso é um post',
        // ]);

        // dd($user->hasPosts()); // a função hasPosts() traz a relação
        // dd($user->hasPosts->toArray()); // campo posts - posts que o user têm

        dd($user->load('hasPosts')->toArray());

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
