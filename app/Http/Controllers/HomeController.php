<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        //
        // SEM filtro
        //
        // $produtos = Produto::all();

        //
        // COM filtro
        //
        // $produtos = Produto::where('nome', 'like', "%$request->pesquisar%")->get();

        //
        // recomendável
        //
        $produtos = Produto::query();

        $produtos->when($request->pesquisar, function($query, $vl) {
            $query->where('nome', 'like', '%'. $vl. '%');
        });

        $produtos = $produtos->get();

        return view('home', compact('produtos'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
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
