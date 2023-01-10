@extends('layouts.default')

@section('conteudo')
    <h1>Listagem de Businesses</h1>
    @foreach ($businesses as $b)
        <p>
            {{ $b->name }}
            ({{ $b->email }})
        </p>
    @endforeach

    {{-- Paginação --}}
    {{ $businesses->links() }}
@endsection
