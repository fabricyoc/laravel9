@extends('layouts.default')

@section('titulo', 'Livros')

@section('conteudo')
    <h1>Livros da Biblioteca</h1>
    @if ($livros)
        <table border="1">
            <tr>
                <th>Autor</th>
                <th>Título</th>
                <th>Assunto</th>
                <th>Data da Aquisição</th>
                <th>Total de livros</th>
            </tr>
            @foreach ($livros as $l)
                <tr>
                    <td> {{ $l->author }} </td>
                    <td>
                        <a href="{{route('livros.show', $l->id)}}">
                            {{ $l->title }}
                        </a>
                    </td>
                    <td> {{ $l->subject }} </td>
                    <td> {{ date('d-m-Y', strtotime($l->dateAcquisition)) }} </td>
                    <td> {{ $l->totBooks }} </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="2">
                    <a href="{{route('livros.create')}}">
                        <input type="button" value="Novo Livro">
                    </a>
                </td>
            </tr>
        </table>
    @else
        Não há livros disponíveis na biblioteca
    @endif
@endsection

