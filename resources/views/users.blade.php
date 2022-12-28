@extends('layouts.default')

@section('titulo', "Index")

@section('conteudo')
    @if (empty($user))
        Está vazio
    @else
        <table border="1">
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
            </tr>
            @foreach ($user as $u)
                <tr>
                    <td> {{$u->name}} </td>
                    <td> {{$u->email}} </td>
                </tr>
            @endforeach
        </table>
    @endif
@endsection
