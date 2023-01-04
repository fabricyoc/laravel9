@extends('layouts.default')

@section('conteudo')
    <h1>Cadastro de Post</h1>
    @foreach ($errors->all() as $error)
        {{$error}}
    @endforeach
    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <table>
            <tr>
                <td><label for="idTitle">Título:</label></td>
                <td><input type="text" name="title" id="idTitle" placeholder="Campo obrigatório"></td>
            </tr>
            <tr>
                <td><label for="idUser">Associar a:</label></td>
                <td>
                    <select id="idUser" name="user">
                        @foreach ($users as $user)
                            <option value="{{$user->id}}">{{strtoupper($user->name)}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Cadastrar"></td>
            </tr>
        </table>
    </form>
@endsection
