@extends('layouts.app')

@section('title', 'Fornecedores')

    @section('mainTitle')
        <h1>Editar {{$empresa->nome}}</h1>
    @stop
    @section('breadcrumb')
        <li class="breadcrumb-item">
            <a href="{{ route('empresas.edit', $empresa) }}">Editar</a>
        </li>
    @stop

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Altere os dados necessários</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('empresas.update', $empresa)}}" method="post">
                            @method('PUT')
                            @include('empresa.form')
                        </form>
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
