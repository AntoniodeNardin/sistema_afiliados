<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'preco', 'descricao'];

    public function vendas()
    {
        return $this->hasMany(Venda::class);
    }
}