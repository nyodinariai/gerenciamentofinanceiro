@extends('layouts.app')

@section('title', 'Fornecedores')

    @section('mainTitle')
        <h1>Novo {{$tipo}}</h1>
    @stop
    @section('breadcrumb')
        <li class="breadcrumb-item">
            <a href="{{ route('empresas.index') }}?tipo={{ $tipo }}">Listagem de {{$tipo}}</a>
        </li>

        <li class="breadcrumb-item">
            <a href="{{ route('empresas.create') }}?tipo={{ $tipo }}">Novo {{$tipo}}</a>
        </li>
    @stop

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Entre com os dados</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('empresas.store')}}" method="post">
                            <input type="hidden" name="tipo" value="{{ $tipo }}">
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
