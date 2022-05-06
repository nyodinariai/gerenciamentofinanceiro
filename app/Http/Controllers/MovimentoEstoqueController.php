<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovimentoEstoqueRequest;
use App\Models\MovimentosEstoque;
use Illuminate\Http\Request;

class MovimentoEstoqueController extends Controller
{

    /**
     * Criar um Movimento de Estoque
     *
     * @param MovimentoEstoqueRequest $request
     * @return void
     */
    public function store(MovimentoEstoqueRequest $request){

        MovimentosEstoque::create($request->all());

        return redirect()->back();
    }

    /**
     * Apaga Movimento de Estoque
     *
     * @param integer $id
     * @return void
     */
    public function destroy(int $id){

        MovimentosEstoque::destroy($id);

        return redirect()->back();
    }
}
