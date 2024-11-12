@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Lista de Vendas</h1>

        <div class="mb-4 flex space-x-2">
            <a href="{{ route('vendas.create') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500">
                Registrar Venda
            </a>
        </div>

        @if($vendas->isEmpty())
            <p class="text-gray-600">Nenhuma venda registrada até o momento.</p>
        @else
            <div class="space-y-4">
                @foreach($vendas as $venda)
                    <div class="p-4 bg-gray-100 rounded-lg shadow-sm">
                        <h2 class="text-lg font-semibold text-gray-700">Venda #{{ $venda->id }}</h2>
                        <p><strong>Afiliado:</strong> {{ $venda->afiliado->nome }}</p>
                        {{-- <p><strong>Produto:</strong> {{ $venda->produto->nome }}</p> --}}
                        <p><strong>Quantidade:</strong> {{ $venda->quantidade }}</p>
                        <p><strong>Valor Total:</strong> R$ {{ number_format($venda->valor, 2, ',', '.') }}</p>
                        <p><strong>Valor com desconto:</strong> R$ {{ number_format($venda->valor_com_desconto, 2, ',', '.') }}
                        </p>
                        <p ><strong>Ganho afiliado:</strong> <span style="color: green"> R$ {{ number_format($venda->ganho_afiliado, 2, ',', '.') }}</span>
                        </p>
                        <p class="text-sm text-gray-500"><strong>Data da Venda:</strong> {{ $venda->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
