<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePessoaRequest;
use App\Http\Requests\UpdatePessoaRequest;
use App\Models\Pessoa;
use Illuminate\Support\Facades\Redirect;

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
        //
        // SEM VALIDAÇÃO
        //
        // if ($request->nome == null || $request->dataNasc == null || $request->sexo == null) {
        //     return redirect()->route('pessoas.create');
        // }
        // else {
        //     Pessoa::create([
        //         // 'matricula' => fake()->randomNumber(9, true),
        //         'matricula' => $this->gerarMatricula(),
        //         'nome' => $request->nome,
        //         'dataNasc' => $request->dataNasc,
        //         'sexo' => $request->sexo,
        //     ]);

        //     return redirect()->route('pessoas.index');
        // }



        //
        // COM VALIDAÇÃO NO CONTROLLER
        //
        // $input = $request->validate([
        //     'nome' => 'required|string',
        //     'dataNasc' => 'required',
        //     'sexo' => 'required',
        // ]);

        // $p = Pessoa::create([
        //     'matricula' => $this->gerarMatricula(),
        //     'nome' => $input['nome'],
        //     'dataNasc' => $input['dataNasc'],
        //     'sexo' => $input['sexo'],
        // ]);

        // dd($p->toArray());




        //
        // COM VALIDAÇÃO NO StorePessoaRequest
        //
        // $input = $request->validated();
        // // Atribuir matrícula
        // $input['matricula'] = $this->gerarMatricula();

        // // Buscar o caminho da foto
        // $path = $input['foto']->store('fotos', 'public');
        // $input['foto'] = $path;
        // Pessoa::create($input);

        // return Redirect::route('pessoas.index');


        //
        // Método PROFISSIONAL
        //

        // validator => variável global reservada
        $validator = $this->testarSenhas($request->senha, $request->confirmSenha);

        if (!$validator)
        {
            $input = $request->validated();
            // atribuir matrícula
            $input['matricula'] = $this->gerarMatricula();

            // Buscar o caminho da foto
            $path = $input['foto']->store('fotos', 'public');
            $input['foto'] = $path;

            // $input['senha'] = bcrypt($request->senha);
            dd($input);

            Pessoa::create($input);
            return Redirect::route('pessoas.index');
        }
        else
        {
            // Retorna os erros das senhas
            return redirect()->back()->withErrors($validator)->withInput();
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
        //
        // MÉTODO TRADICIONAL
        //
        // Pessoa::find($pessoa->id)->update([
        //     'nome' => $request->nome,
        //     'dataNasc' => $request->dataNasc,
        //     'sexo' => $request->sexo,
        // ]);

        //
        // MÉTODO MAIS RECENTE
        //
        Pessoa::find($pessoa->id)
            ->fill($request->only('nome', 'dataNasc', 'sexo'))
            ->save();
        return redirect()->route('pessoas.index');
    }

    public function destroy(Pessoa $pessoa)
    {
        Pessoa::find($pessoa->id)->delete();
        return redirect()->route('pessoas.index');
    }

    private function gerarMatricula()
    {
        //
        // Gerar a matrícula: ano_inscricao modalidade_ensino turma seq_aluno
        //

        $ano = random_int(2017, 2023);

        // MODALIDADES -> 1. regular | 2. técnico
        $modalidade = random_int(1, 2);

        // TURMAS -> 1-4 qnt de turmas
        $turma = str_pad(random_int(1, 4), 2, 0, STR_PAD_LEFT);

        // $seq = random_int(1, 40); // 1-40 número de alunos
        $seq = str_pad(random_int(1, 40), 2, 0, STR_PAD_LEFT);


        return "$ano$modalidade$turma$seq";
    }

    private function testarSenhas($senha, $confirmSenha)
    {
        if ($senha == null) {
            return "O campo SENHA é obrigatório";
        }
        elseif ($confirmSenha == null) {
            return "O campo CONFIRME A SENHA é obrigatório";
        }
        elseif ($senha != $confirmSenha) {
            return "As senhas são DIFERENTES.";
        }
        else {
            // Se retornar FALSE, o programa seguirá para os próximos passos
            return false;
        }

    }
}
