@extends('layouts.default')

@section('titulo', 'SHOW')

@section('conteudo')
    <h1>Estou na rota livros.show</h1><br>
    <h3> Detalhes do livro de {{ $livro->author }} </h3>
@endsection
