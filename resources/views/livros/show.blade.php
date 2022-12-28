@extends('layouts.default')

@section('titulo', 'SHOW')

@section('conteudo')
    <h1>Detalhes do livro: {{ strtoupper($livro->title) }} </h1>
    <h3>Autor: {{ $livro->author }}</h3>
    <h3>Assunto: {{ $livro->subject }}</h3>
    <h3>Data da aquisição: {{ date('d-m-Y', strtotime($livro->dateAcquisition)) }}</h3>
    <h3>Total de livros: {{ $livro->totBooks }}</h3>
    <form action=" {{ route('livros.destroy', $livro->id) }} " method="post">
        @csrf
        @method('delete')
        <h4>
            <a href=" {{ route('livros.index') }} ">
                <input type="button" value="Voltar">
            </a>
            <a href=" {{ route('livros.edit', $livro->id) }} ">
                <input type="button" value="Editar">
            </a>

            <input type="submit" value="Delete">
        </h4>
    </form>
@endsection
