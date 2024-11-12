<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [
        'afiliado_id',
        'produto_id',
        'quantidade',
        'valor',
        'valor_com_desconto',
        'ganho_afiliado'
    ];
    public function afiliado()
    {
        return $this->belongsTo(Afiliado::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
