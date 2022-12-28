@extends('layouts.default')


@section('titulo', 'Editar')

@section('conteudo')
    <h1>Editar Livro</h1>
    <form action=" {{ route('livros.update', $livro->id) }} " method="post">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td><label for="idAutor">Autor:</label></td>
                <td><input type="text" name="autor" id="idAutor" maxlength="25" value="{{$livro->author}}"></td>
            </tr>
            <tr>
                <td><label for="idTitulo">Título:</label></td>
                <td><input type="text" name="titulo" id="idTitulo" value="{{$livro->title}}"></td>
            </tr>
            <tr>
                <td><label for="idAssunto">Assunto:</label></td>
                <td><input type="text" name="assunto" id="idAssunto" value="{{$livro->subject}}"></td>
            </tr>
            <tr>

                <td><label for="idTotLivros">Total de livros:</label></td>
                <td><input type="number" name="totLivros" id="idTotLivros" value="{{$livro->totBooks}}"></td>
            </tr>
            <tr>

                <td><label for="idDataAquisicao">Data da Aquisição:</label></td>
                <td><input type="date" name="dataAquisicao" id="idDataAquisicao" value="{{$livro->dateAcquisition}}"></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;">
                    <input type="submit" value="Editar">
                    <a href=" {{ route('livros.show', $livro->id) }} ">
                        <input type="button" value="Voltar">
                    </a>
                </td>
            </tr>
        </table>
    </form>
@endsection
