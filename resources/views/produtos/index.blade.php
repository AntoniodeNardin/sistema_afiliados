@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Lista de Produtos</h1>

        <!-- Botão para Cadastrar Novo Produto -->
        {{-- <div class="mb-4">
            <a href="{{ route('produtos.create') }}" class="bg-indigo-600 text-white py-2 px-4 rounded-lg shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                Cadastrar Novo Produto
            </a>
        </div> --}}

        <!-- Lista de Produtos -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="px-4 py-2 border-b">Produto</th>
                        <th class="px-4 py-2 border-b">Preço</th>
                        {{-- <th class="px-4 py-2 border-b">Ações</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border-b">{{ $produto->nome }}</td>
                            <td class="px-4 py-2 border-b">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                            {{-- <td class="px-4 py-2 border-b">
                                <a href="{{ route('produtos.edit', $produto->id) }}" class="text-blue-600 hover:text-blue-800">Editar</a>
                                <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" class="inline-block ml-4">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">Excluir</button>
                                </form>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
