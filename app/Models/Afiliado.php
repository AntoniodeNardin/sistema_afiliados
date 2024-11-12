<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Afiliado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'porcentagem_ganho', // Novo campo
        'desconto_usuario'   // Novo campo
    ];

    public function vendas()
    {
        return $this->hasMany(Venda::class);
    }
}
