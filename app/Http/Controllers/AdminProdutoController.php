<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class AdminProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('admin.produtos', compact('produtos'));
    }

    public function edit()
    {
        return view('admin.produto_edit');
    }

    public function update()
    {
        # code...
    }

    public function create()
    {
        return view('admin.produto_create');

    }

    public function store()
    {
        # code...
    }
}
