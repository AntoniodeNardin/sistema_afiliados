@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-6 text-gray-800">Cadastro de Afiliado</h1>

            <!-- Formulário para Cadastro -->
            <form method="POST" action="{{ route('afiliados.store') }}" class="space-y-4">
                @csrf
                <!-- Campo Nome -->
                <!-- Campo Nome -->
                <div>
                    <label for="nome" class="block text-gray-700 font-medium mb-2">Nome:</label>
                    <input type="text" id="nome" name="nome" value="{{ old('nome') }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        required placeholder="Digite o nome do afiliado">
                </div>

                <!-- Campo Email -->
                <div>
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email:</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        required placeholder="Digite o email do afiliado">
                </div>

                <!-- Campo Porcentagem de Ganho -->
                <div>
                    <label for="porcentagem_ganho" class="block text-gray-700 font-medium mb-2">Porcentagem de Ganho
                        (%):</label>
                    <input type="number" id="porcentagem_ganho" name="porcentagem_ganho"
                        value="{{ old('porcentagem_ganho') }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        required min="0" max="100" step="0.01">
                </div>

                <!-- Campo Desconto para Usuário -->
                <div>
                    <label for="desconto_usuario" class="block text-gray-700 font-medium mb-2">Desconto para o Usuário
                        (%):</label>
                    <input type="number" id="desconto_usuario" name="desconto_usuario"
                        value="{{ old('desconto_usuario') }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        required min="0" max="100" step="0.01">
                </div>


                <!-- Botão de Submissão -->
                <div class="text-right">
                    <button type="submit"
                        class="bg-indigo-600 text-white py-2 px-4 rounded-lg shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        Cadastrar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
