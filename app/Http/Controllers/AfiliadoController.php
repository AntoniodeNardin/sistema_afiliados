<?php

namespace App\Http\Controllers;

use App\Http\Requests\AfiliadoFormRequest;
use Illuminate\Http\Request;
use App\Models\Afiliado;

class AfiliadoController extends Controller
{
    public function index()
    {
        $afiliados = Afiliado::with('vendas')->get();
        return view('afiliados.index', compact('afiliados'));
    }

    public function create()
    {
        return view('afiliados.create');
    }

    public function store(AfiliadoFormRequest $request)
    {

        $afiliado =  Afiliado::create($request->validated());
        $afiliado->cupom = $this->gerarCupomUnico($afiliado);
        $afiliado->save();

        Afiliado::whereNull('cupom')->each(function ($afiliado) {
            $afiliado->cupom = $this->gerarCupomUnico($afiliado);
            $afiliado->save();
        });


        return redirect()->route('afiliados.index')->with('success', 'Afiliado cadastrado com sucesso!');
    }

    private function gerarCupomUnico($afiliado)
    {
        $cupom = 'AFILIADO' . strtoupper(substr($afiliado->nome, 0, 3)) . random_int(100, 999);


        return $cupom;
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
    public function destroy($id)
    {
        $afiliado = Afiliado::findOrFail($id);
        $afiliado->delete();
        return redirect()->route('afiliados.index')->with('success', 'Afiliado apagado com sucesso.');
    }
}
