@extends('layouts.default')

@section('titulo', 'Lista de Pessoas')

@section('conteudo')
    <h1>LISTA DE PESSOAS</h1>
    @if (count($pessoas) > 0)
        <table border="1">
            <tr>
                <th>Matrícula</th>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>Sexo</th>
            </tr>
            @foreach ($pessoas as $p)
                <tr>
                    <td>{{$p->matricula}}</td>
                    <td>
                        <a href="{{ route('pessoas.edit', $p->id) }}">
                            {{$p->nome}}
                        </a>
                    </td>
                    <td>{{date('d-m-Y', strtotime($p->dataNasc))}}</td>
                    <td>{{strtoupper($p->sexo)}}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4">
                    <a href="{{ route('pessoas.create') }}">
                        <input type="button" value="Nova Pessoa">
                    </a>
                </td>
            </tr>
        </table>
    @else
        não há pessoas cadastradas
    @endif
@endsection

