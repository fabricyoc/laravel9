@extends('layouts.default')

@section('titulo', 'Editar Pessoa')

@section('conteudo')
    <h1>Editando o cadatro de {{strtoupper($pessoa->nome)}}</h1>
    <form action="{{ route('pessoas.update', $pessoa->id) }}" method="post">
        @csrf
        @method('put')
        <table>
            <tr>
                <td><label for="idMatricula">Matrícula</label></td>
                <td><input type="text" name="matricula" id="idMatricula" value="{{$pessoa->matricula}}" disabled></td>
            </tr>
            <tr>
                <td><label for="idNome">Nome:</label></td>
                <td><input type="text" name="nome" id="idNome" value="{{$pessoa->nome}}"></td>
            </tr>
            <tr>
                <td><label for="idDataNasc">Data de Nascimento: </label></td>
                <td><input type="date" name="dataNasc" id="idDataNasc" value="{{$pessoa->dataNasc}}"></td>
            </tr>
            <tr>
                <td colspan="4">
                    @if ($pessoa->sexo == 'm')
                        <input type="radio" name="sexo" id="idMasc" value="m" checked>
                        <label for="idMasc">Masculino</label>

                        <input type="radio" name="sexo" id="idFem" value="f">
                        <label for="idFem">Feminino</label>

                        <input type="radio" name="sexo" id="idNot" value="n">
                        <label for="idNot">Não Informado</label>
                    @elseif ($pessoa->sexo == 'f')
                        <input type="radio" name="sexo" id="idMasc" value="m">
                        <label for="idMasc">Masculino</label>

                        <input type="radio" name="sexo" id="idFem" value="f" checked>
                        <label for="idFem">Feminino</label>

                        <input type="radio" name="sexo" id="idNot" value="n">
                        <label for="idNot">Não Informado</label>
                    @else
                        <input type="radio" name="sexo" id="idMasc" value="m">
                        <label for="idMasc">Masculino</label>

                        <input type="radio" name="sexo" id="idFem" value="f">
                        <label for="idFem">Feminino</label>

                        <input type="radio" name="sexo" id="idNot" value="n" checked>
                        <label for="idNot">Não Informado</label>
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Editar">

                    <a href="{{ route('pessoas.index') }}">
                        <input type="button" value="Voltar">
                    </a>

                    {{-- NÃO DÁ CERTO --}}
                    {{-- <a href="{{ route('pessoas.destroy', $pessoa->id) }}">
                        <input type="button" value="Deletar">
                    </a> --}}
                </td>
            </tr>
        </table>
    </form>
    <form action="{{ route('pessoas.destroy', $pessoa->id) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Deletar">
    </form>
@endsection
