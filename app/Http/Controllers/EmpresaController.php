<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaRequest;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $tipo = $request->tipo;

        if($tipo !== 'cliente' && $tipo !== 'fornecedor'){
            return \abort(404);
        }

        $empresas = Empresa::todasPorTipo($tipo);

        return view('empresa.index')->with(['empresas' => $empresas, 'tipo' => $tipo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $tipo = $request->tipo;

        if($tipo !== 'cliente' && $tipo !== 'fornecedor'){
            return \abort(404);
        }

        return view('empresa.create')->with('tipo', $tipo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaRequest $request)
    {
        $empresa = Empresa::create($request->except("_token"));

        return redirect()->route('empresa.show', $empresa->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        $dados = $empresa;

        return view('empresa.show')->with('empresa', $dados);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        $dados = $empresa;
        return view('empresa.edit')->with('empresa', $dados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresaRequest $request, Empresa $empresa)
    {
        $empresa->update($request->all());

        return redirect()->route('empresas.show', $empresa->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmpresaRequest $empresa, Request $request)
    {

        $tipo = $request->tipo;

        if($tipo !== 'cliente' && $tipo !== 'fornecedor'){
            return \abort(404);
        }
        $empresa->delete();

        return redirect()->route('empresas.index', ['tipo'=>$tipo]);
    }
}
