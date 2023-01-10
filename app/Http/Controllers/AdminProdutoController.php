<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminProdutoController extends Controller
{
    public function index()
    {
        return view('admin.produtos');
    }

    public function edit()
    {
        return view('admin.produto_edit');
    }
}
