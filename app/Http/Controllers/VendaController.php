<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Afiliado;
use App\Models\Venda;
use App\Models\Produto;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $vendas = Venda::all();
            return view('vendas.index', compact('vendas'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $afiliados = Afiliado::all();
        $produtos = Produto::all();
        return view('vendas.create', compact('afiliados','produtos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'afiliado_id' => 'required|exists:afiliados,id',
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
        ]);

        $produto = Produto::findOrFail($request->produto_id);
        $valorTotal = $produto->preco * $request->quantidade;
        $afiliado = Afiliado::findOrFail($request->afiliado_id);
        $ganhoAfiliado = $valorTotal * ($afiliado->porcentagem_ganho / 100);
        $desconto = $valorTotal * ($afiliado->desconto_usuario / 100);
        $valorComDesconto = $valorTotal - $desconto;

        $venda = Venda::create([
            'afiliado_id' => $afiliado->id,
            'produto_id' => $produto->id,
            'quantidade' => $request->quantidade,
            'valor' => $valorTotal,
            'ganho_afiliado' => $ganhoAfiliado,
            'valor_com_desconto' => $valorComDesconto,
        ]);

        return redirect()->route('vendas.index')->with('success', 'Venda registrada com sucesso.');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
