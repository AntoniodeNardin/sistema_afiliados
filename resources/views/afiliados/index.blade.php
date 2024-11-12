@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4 text-gray-800">Lista de Afiliados</h1>

            <!-- Botões de Ações -->
            <div class="mb-4 flex space-x-2">
                <a href="{{ route('afiliados.create') }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Cadastrar Novo Afiliado
                </a>
            </div>

            <!-- Lista de Afiliados -->
            @foreach ($afiliados as $afiliado)
                <div class="bg-white border border-gray-300 rounded-lg p-4 shadow mb-4">
                    <h2 class="text-lg font-bold text-gray-800">{{ $afiliado->nome }}</h2>
                    {{-- <p class="text-gray-600"><strong>Email:</strong> {{ $afiliado->email }}</p> --}}
                    <p class="text-gray-600 my-1"><strong>Total de Vendas:</strong> R$
                        {{ number_format($afiliado->vendas->sum('valor_com_desconto'), 2, ',', '.') }}</p>
                    <p class="text-gray-600  my-1"><strong>Total de ganho:</strong> R$ <span style="color: green"> R$
                            {{ number_format($afiliado->vendas->sum('ganho_afiliado'), 2, ',', '.') }}</span>
                    </p>
                    <p class="text-gray-600  my-1"><strong>Porcentagem ganho:</strong> {{ $afiliado->porcentagem_ganho }}%</p>
                    <p class="text-gray-600  my-1"><strong>Porcentagem desconto:</strong> {{ $afiliado->desconto_usuario }}%</p>
                    <p class="text-gray-600"><strong>Cupom:</strong> {{ $afiliado->cupom }}</p>
                    <form action="{{ route('afiliados.destroy', $afiliado->id) }}" method="POST"
                        onsubmit="return confirm('Tem certeza que deseja apagar este afiliado?');"
                        class="inline-block mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Apagar
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
