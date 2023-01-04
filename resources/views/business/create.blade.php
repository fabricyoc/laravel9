@extends('layouts.default')


@section('conteudo')
    <h1>Cadastro de Business</h1>

    {{-- Mostra os erros/validações --}}
    {{-- {{ print_r($errors) }} --}}
    @if ($errors->any())
        Erros: <br>
        @foreach ($errors->all() as $error)
            {{ $error }}
            <br>
        @endforeach
    @endif

    <form action="{{ route('business.store') }}" method="post">
        @csrf
        <table>
            <tr>
                <td><label for="idName">Nome:</label></td>
                <td>
                    {{-- value="old('campo')" -> qnd a validação der erro, retorna com o valor  --}}
                    <input type="text" name="name" id="idName" value="{{ old('name') }}">
                    {{-- Exibe o erro/validação na frente do campo --}}
                    @error('name')
                        {{ $message }}
                    @enderror
                </td>
            </tr>
            <tr>
                <td><label for="idEmail">E-mail:</label></td>
                <td>
                    {{-- value="old('campo')" -> qnd a validação der erro, retorna com o valor  --}}
                    <input type="text" name="email" id="idEmail" value="{{ old('email') }}">
                    @error('email')
                        {{ $message }}
                    @enderror
                </td>
            </tr>
            <tr>
                <td><label for="idAddress">Endereço:</label></td>
                <td><input type="text" name="address" id="idAddress"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Cadastrar">
                </td>
            </tr>
        </table>
    </form>
@endsection
