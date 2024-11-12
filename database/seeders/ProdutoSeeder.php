<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produto;

class ProdutoSeeder extends Seeder
{
    public function run()
    {
        $produtos = [
            ['nome' => 'Cimento CP II', 'preco' => 30.50],
            ['nome' => 'Areia Média', 'preco' => 45.00],
            ['nome' => 'Brita 1', 'preco' => 50.00],
            ['nome' => 'Tijolo 6 furos', 'preco' => 0.80],
            ['nome' => 'Aço CA-50 3/8"', 'preco' => 12.00],
            ['nome' => 'Bloco de Concreto 14x19x39', 'preco' => 3.50],
            ['nome' => 'Argamassa ACIII', 'preco' => 20.00],
            ['nome' => 'Cal Hidratada CH-I', 'preco' => 10.00],
            ['nome' => 'Tubulação PVC 100mm', 'preco' => 25.00],
            ['nome' => 'Porta de Madeira Cedro', 'preco' => 200.00],
        ];

        foreach ($produtos as $produto) {
            Produto::create($produto);
        }
    }
}
