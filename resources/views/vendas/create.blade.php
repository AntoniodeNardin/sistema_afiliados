@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Registrar Venda</h1>

        <!-- Formulário para Registrar Venda -->
        <form method="POST" action="{{ route('vendas.store') }}" class="space-y-4">
            @csrf

            <!-- Seleção de Afiliado -->
            <div>
                <label for="afiliado_id" class="block text-gray-700 font-medium mb-2">Afiliado:</label>
                <select id="afiliado_id" name="afiliado_id" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                    <option value="" disabled selected>Selecione um afiliado</option>
                    @foreach ($afiliados as $afiliado)
                        <option value="{{ $afiliado->id }}">{{ $afiliado->nome }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Seleção de Produto -->
            <div>
                <label for="produto_id" class="block text-gray-700 font-medium mb-2">Produto:</label>
                <select id="produto_id" name="produto_id" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                    <option value="" disabled selected>Selecione um produto</option>
                    @foreach ($produtos as $produto)
                        <option value="{{ $produto->id }}" data-preco="{{ $produto->preco }}">
                            {{ $produto->nome }} - R$ {{ number_format($produto->preco, 2, ',', '.') }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Campo de Quantidade -->
            <div>
                <label for="quantidade" class="block text-gray-700 font-medium mb-2">Quantidade:</label>
                <input type="number" id="quantidade" name="quantidade" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" min="1" value="1" required>
            </div>

            <!-- Campo de Valor Total (Somente Leitura) -->
            <div>
                <label for="valor_total" class="block text-gray-700 font-medium mb-2">Valor Total:</label>
                <input type="text" id="valor" name="valor" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 bg-gray-100" readonly>
            </div>

            <!-- Botão de Submissão -->
            <div class="text-right">
                <button type="submit" class="bg-indigo-600 text-white py-2 px-4 rounded-lg shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Registrar Venda
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const produtoSelect = document.getElementById('produto_id');
        const quantidadeInput = document.getElementById('quantidade');
        const valorTotalInput = document.getElementById('valor');

        function calcularValorTotal() {
            const preco = parseFloat(produtoSelect.options[produtoSelect.selectedIndex]?.dataset.preco || 0);
            const quantidade = parseInt(quantidadeInput.value, 10) || 1;
            const valorTotal = preco * quantidade;
            valorTotalInput.value = 'R$ ' + valorTotal.toFixed(2).replace('.', ',');
        }

        produtoSelect.addEventListener('change', calcularValorTotal);
        quantidadeInput.addEventListener('input', calcularValorTotal);

        // Calcular valor total inicial
        calcularValorTotal();
    });
</script>
@endsection

