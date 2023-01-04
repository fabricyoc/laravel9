<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function index()
    {
        // return Post::all();
        $post = Post::all();
        dd($post->load('user')->toArray());
    }

    public function create()
    {
        // $users = User::all();
        $users = User::orderBy('name')->get();
        return view('posts.create', compact('users'));
    }

    public function store(Request $request)
    {
        // dd($request->toArray());
        $input = $request->validate([
            'title' => 'required|string',
        ]);

        Post::create([
            'title' => $input['title'],
            'user_id' => $request->user,
        ]);

        return Redirect::route('posts.index');
    }

    // public function show($id)
    public function show(Post $post)
    {
        // dd($post->user);
        dd($post->load('user')->toArray()); // carrega a relação de usuário (on the fly)
        return $post;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
