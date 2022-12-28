@extends('layouts.default')

@section('titulo', 'Livros')

@section('conteudo')
    <h1>Livros da biblioteca</h1>
    @if ($livros)
        <table border="1">
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Assunto</th>
                <th>Data da Aquisição</th>
                <th>Total de livros</th>
                <th>Ações</th>
            </tr>
            @foreach ($livros as $l)
                <tr>
                    <td> {{ $l->title }} </td>
                    <td> {{ $l->author }} </td>
                    <td> {{ $l->subject }} </td>
                    <td> {{ $l->dateAcquisition }} </td>
                    <td> {{ $l->totBooks }} </td>
                    <td>
                        <a href=" {{ route('livros.show', $l->id) }} ">VER</a> |
                        <a href="">EDIT</a> |
                        <a href="">DEL</a>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        Não há livros disponíveis na biblioteca
    @endif
@endsection

