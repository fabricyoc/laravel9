@extends('layouts.default')

@section('titulo', 'Cadastrar Pessoa')

@section('conteudo')
    <h1>Cadastro de Pessoa</h1>
    <form action="{{ route('pessoas.store') }}" method="post">
        @csrf
        <table>
            <tr>
                <td><label for="idNome">Nome:</label></td>
                <td><input type="text" name="nome" id="idNome"></td>
            </tr>
            <tr>
                <td><label for="idDataNasc">Data de Nascimento:</label></td>
                <td><input type="date" name="dataNasc" id="idDataNasc"></td>
            </tr>
            <tr>
                <td><label for="idSexo">Sexo:</label></td>
                <td>
                    {{-- <input type="radio" name="sexo" id="idMasc" value="m">
                    <label for="idMasc">Masculino</label>

                    <input type="radio" name="sexo" id="idFem" value="f">
                    <label for="idFem">Feminino</label>

                    <input type="radio" name="sexo" id="idNot" value="n" checked>
                    <label for="idNot">Não Informar</label> --}}

                    <select name="sexo" id="idSexo">
                        <option value="m">Masculino</option>
                        <option value="f">Feminino</option>
                        <option value="n">Não informar</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Cadastrar">
                    <a href="{{ route('pessoas.index') }}">
                        <input type="button" value="Voltar">
                    </a>
                </td>
            </tr>
        </table>
    </form>
@endsection
