<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePessoaRequest;
use App\Http\Requests\UpdatePessoaRequest;
use App\Models\Pessoa;

class PessoaController extends Controller
{
    public function index()
    {
        $pessoas = Pessoa::all();
        return view('pessoas.index', compact('pessoas'));
    }

    public function create()
    {
        return view('pessoas.create');
    }

    public function store(StorePessoaRequest $request)
    {
        if ($request->nome == null || $request->dataNasc == null || $request->sexo == null) {
            return redirect()->route('pessoas.create');
        }
        else {
            Pessoa::create([
                'matricula' => fake()->randomNumber(9, true),
                'nome' => $request->nome,
                'dataNasc' => $request->dataNasc,
                'sexo' => $request->sexo,
            ]);

            return redirect()->route('pessoas.index');
        }

    }

    public function show(Pessoa $pessoa)
    {
        //
    }

    public function edit(Pessoa $pessoa)
    {
        return view('pessoas.edit', compact('pessoa'));
    }

    public function update(UpdatePessoaRequest $request, Pessoa $pessoa)
    {
        Pessoa::find($pessoa->id)->update([
            'nome' => $request->nome,
            'dataNasc' => $request->dataNasc,
            'sexo' => $request->sexo,
        ]);
        return redirect()->route('pessoas.index');
    }

    public function destroy(Pessoa $pessoa)
    {
        Pessoa::find($pessoa->id)->delete();
        return redirect()->route('pessoas.index');
    }
}
