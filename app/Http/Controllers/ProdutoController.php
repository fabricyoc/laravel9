<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdutoRequest;
use App\Http\Requests\UpdateProdutoRequest;
use App\Models\Produto;

class ProdutoController extends Controller
{

    public function index()
    {
        return view('produto');
    }

    public function create()
    {
        //
    }

    public function store(StoreProdutoRequest $request)
    {
        //
    }

    public function show(Produto $produto)
    {
        //
    }

    public function edit(Produto $produto)
    {
        //
    }

    public function update(UpdateProdutoRequest $request, Produto $produto)
    {
        //
    }

    public function destroy(Produto $produto)
    {
        //
    }
}
