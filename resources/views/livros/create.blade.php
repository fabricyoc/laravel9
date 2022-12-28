@extends('layouts.default')

@section('titulo', 'Cadastro de Livro')

@section('conteudo')
    <h1>Cadastro de Livros</h1>
    <form action=" {{ route('livros.store') }} " method="post">
        @csrf
        <table>
            <tr>
                <th><label for="idAutor">Autor:</label></th>
                <td><input type="text" name="autor" id="idAutor" maxlength="25"></td>
            </tr>
            <tr>
                <th><label for="idTitulo">Título:</label></th>
                <td><input type="text" name="titulo" id="idTitulo"></td>
            </tr>
            <tr>
                <th><label for="idAssunto">Assunto:</label></th>
                <td><input type="text" name="assunto" id="idAssunto"></td>
            </tr>
            <tr>
                <th><label for="idTotLivros">Total de livros:</label></th>
                <td><input type="number" name="totLivros" id="idTotLivros"></td>
            </tr>
            <tr>
                <th><label for="idDataAquisicao">Data da Aquisição:</label></th>
                <td><input type="date" name="dataAquisicao" id="idDataAquisicao"></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;">
                    <input type="submit" value="Cadastrar">
                    <input type="reset" value="Resetar">
                    <a href=" {{ route('livros.index') }} ">
                        <input type="button" value="Início">
                    </a>
                </td>
            </tr>
        </table>
    </form>
@endsection

{{-- @prepend('estilos')
    body{
        background-color: red;
    }
@endprepend --}}
