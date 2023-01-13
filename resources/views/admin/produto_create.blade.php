@extends('_layouts.default')

@section('conteudo')
    <section class="text-gray-600">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-2/4 w-full mx-auto overflow-auto">
                <div class="flex items-center justify-between mb-2">
                    <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">Adicionar produto</h1>
                </div>
                <form action="{{ route('admin_produto.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-wrap">
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="idName" class="leading-7 text-sm text-gray-600">Nome do produto</label>
                                <input type="text" id="idName" name="nome" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" value="{{ old('nome') }}">
                            </div>
                            @error('nome')
                                <div class="text-red-400 text-sm">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="idPrice" class="leading-7 text-sm text-gray-600">Preço</label>
                                <input type="text" id="idPrice" name="preco"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" value="{{ old('preco') }}"/>
                            </div>
                            @error('preco')
                                <div class="text-red-400 text-sm">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="idStock" class="leading-7 text-sm text-gray-600">Estoque</label>
                                <input type="text" id="idStock" name="estoque"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" value="{{ old('estoque') }}">
                            </div>
                            @error('estoque')
                                <div class="text-red-400 text-sm">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="idCover" class="leading-7 text-sm text-gray-600">Imagem de capa</label>
                                <input type="file" id="idCover" name="imagem"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"/>
                            </div>
                            @error('imagem')
                                <div class="text-red-400 text-sm">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="idDescription" class="leading-7 text-sm text-gray-600">Descrição</label>
                                <textarea
                                    id="idDescription" name="descricao"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ old('descricao') }}</textarea>
                            </div>
                            @error('descricao')
                                <div class="text-red-400 text-sm">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="p-2 w-full">
                            <button type="submit" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Adicionar</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection