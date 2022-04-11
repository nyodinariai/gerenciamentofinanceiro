@extends('layouts.app')

@section('title', 'Fornecedores')

    @section('mainTitle')
        <h1>Listagem de {{$tipo}}</h1>
    @stop
    @section('breadcrumb')
        <li class="breadcrumb-item">
            <a href="{{ route('empresas.index') }}?tipo={{ $tipo }}">Listagem de {{$tipo}}</a>
        </li>
    @stop

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listagem de {{$tipo}}</h3>
                        <div class="card-tools">
                            <a href="{{route('empresas.create')}}?tipo={{$tipo}}" class="btn btn-success">Novo  {{$tipo}}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                <th style="width: 10px">#</th>
                                <th>Nome Empresa</th>
                                <th>Nome Contato</th>
                                <th>Celular</th>
                                <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($empresas as $empresa)
                                    <tr>
                                    <td>{{$empresa->id}}</td>
                                    <td>{{$empresa->nome}}</td>
                                    <td>{{$empresa->nome_contato}}</td>
                                    <td>{{ mascara($empresa->celular, '(##) # ####-####')}}</td>
                                    <td><a href="{{ route('empresas.show', $empresa)}}" class="btn btn-primary">Detalhes</a>
                                    <a href="{{ route('empresas.edit', $empresa)}}" class="btn btn-info">Atualizar</a></td>
                                    </tr>
                                    @empty
                                    <tr>
                                    <td></td>
                                    <td></td>
                                    <td>Nenhum(a) {{ $tipo }} cadastrado</td>
                                    <td></td>
                                    <td></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer clearfix">
                        {{ $empresas->appends(['tipo' => request('tipo')])->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
