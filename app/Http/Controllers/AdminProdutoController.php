<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminProdutoRequest;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
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

    public function update(Produto $produto, StoreAdminProdutoRequest $request)
    {
        $input = $request->validated();

        if (!empty($input['imagem']) && $input['imagem']->isValid())
        {
            // if ($produto->imagem != null) {
            //     Storage::disk('public')->delete($produto->imagem);
            // }
            Storage::disk('public')->delete($produto->imagem ?? '');
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

    public function store(StoreAdminProdutoRequest $request)
    {
        $input = $request->validated();

        $input['slug'] = Str::slug($input['nome']);

        if (!empty($input['imagem']) && $input['imagem']->isValid())
        {
            $path = $input['imagem']->store('fotos', 'public');
            $input['imagem'] = $path;
        }

        Produto::create($input);

        return Redirect::route('admin.index');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        Storage::disk('public')->delete($produto->imagem);

        return Redirect::route('admin.index');
    }

    public function destroyImage(Produto $produto)
    {
        // Storage::delete($produto->imagem);
        Storage::disk('public')->delete($produto->imagem);
        $produto->imagem = null;
        $produto->save();

        return Redirect::back();
    }
}
