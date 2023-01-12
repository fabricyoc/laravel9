<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class AdminProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('admin.produtos', compact('produtos'));
    }

    public function edit(Produto $produto)
    {
        return view('admin.produto_edit', [
            'produto' => $produto
        ]);
    }

    public function update(Produto $produto, Request $request)
    {
        $input = $request->validate([
            'nome' => 'string|required|min:2',
            'preco' => 'string|required',
            'estoque' => 'integer|nullable',
            'imagem' => 'file|nullable',
            'descricao' => 'string|nullable',
        ]);

        if (!empty($input['imagem']) && $input['imagem']->isValid())
        {
            $path = $input['imagem']->store('fotos', 'public');
            $input['imagem'] = $path;
        }

        $produto->fill($input);
        $produto->save();

        return Redirect::route('admin.index');
    }

    public function create()
    {
        return view('admin.produto_create');

    }

    public function store(Request $request)
    {
        // dd($request->toArray());
        $input = $request->validate([
            'nome' => 'string|required|min:2',
            'preco' => 'string|required',
            'estoque' => 'integer|nullable',
            'imagem' => 'file|nullable',
            'descricao' => 'string|nullable',
        ]);

        $input['slug'] = Str::slug($input['nome']);

        if (!empty($input['imagem']) && $input['imagem']->isValid())
        {
            $path = $input['imagem']->store('fotos', 'public');
            $input['imagem'] = $path;
        }

        Produto::create($input);

        return Redirect::route('admin.index');
    }
}
