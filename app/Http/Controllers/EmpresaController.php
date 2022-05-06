<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\EmpresaRequest;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) : View
    {

        $tipo = $request->tipo;

        $this->validaTipo($tipo);

        $empresas = Empresa::todasPorTipo($tipo);

        return view('empresa.index')->with(['empresas' => $empresas, 'tipo' => $tipo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) : View
    {

        $tipo = $request->tipo;

        $this->validaTipo($tipo);

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
        $empresa = Empresa::create($request->all());

        return redirect()->route('empresas.show', $empresa->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id) : View
    {

        $empresa = Empresa::buscaPorId($id);

        return view('empresa.show')->with('empresa', $empresa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa) : View
    {

        return view('empresa.edit')->with('empresa', $empresa);
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

        return redirect()->route('empresas.show')->with('empresa', $empresa);
    }

    /**
     * Deleta uma empresa
     *
     * @param Empresa $empresa
     * @param Request $request
     * @return Response
     */
    public function destroy(Empresa $empresa, Request $request)
    {

        $this->validaTipo($request->tipo);

        $empresa->delete();

        return redirect()->route('empresas.index', ['tipo'=>$request->tipo]);
    }

    /**
     * Valida se é um cliente ou um fornecedor
     *
     * @param string $tipo
     * @return void
     */
    private function validaTipo(string $tipo) : void
    {
        if($tipo !== 'cliente' && $tipo !== 'fornecedor'){
            abort(404);
        }
    }
}
