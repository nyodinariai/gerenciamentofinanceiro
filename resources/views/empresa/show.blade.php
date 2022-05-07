@extends('layouts.app')

@section('title', 'Fornecedores')

    @section('mainTitle')
        <h1>Detalhes do {{ $empresa->tipo }} - {{ $empresa->nome}}</h1>
    @stop
    @section('breadcrumb')
        <li class="breadcrumb-item">
            <a href="{{ route('empresas.index') }}?tipo={{ $empresa->tipo}}">Listagem de {{ $empresa->tipo}}</a>
        </li>

        <li class="breadcrumb-item">
            <a href="{{ route('empresas.show', $empresa) }}">Detalhes do {{ $empresa->tipo}}</a>
        </li>
    @stop

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe">{{$empresa->nome}}</i>
                                </h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <strong>Razão Social</strong>: {{$empresa->razao_social}} <br>
                                <strong>CNPJ/CPF</strong>:
                                    @if(strlen($empresa->documento) === 11)
                                        {{ mascara($empresa->documento, '###.###.###-##')}}
                                    @else
                                        {{ mascara($empresa->documento, '##.###.###/####-##')}}
                                    @endif
                                <br>
                                <strong>IE/RG</strong>: {{$empresa->ie_rg}}<br>
                                <strong>Saldo à {{ $empresa->tipo === 'fornecedor' ? 'pagar' : 'receber' }}</strong> R$ {{ numero_iso_para_br($saldo->valor ?? 0) }}<br>
                                <strong>Observações</strong>: {{$empresa->observacao}}
                            </div>
                            <div class="col-sm-6">
                                <address>
                                    {{ $empresa->logradouro}}, {{ $empresa->bairro}} <br>
                                    {{ $empresa->cidade}}, {{ $empresa->estado}} - {{ mascara($empresa->cep, '##.###-###')}} <br>
                                    <strong>Nome Contato:</strong> {{ $empresa->nome_contato}} <br>
                                    <strong>Celular: </strong>{{ mascara($empresa->celular, '(##) # ####-####') }} <br>
                                    <strong>Email: </strong>{{ $empresa->email}} <br>
                                    <strong>Telefone: </strong>{{ mascara($empresa->telefone, '(##) ####-####')}} <br>
                                </address>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            @include('empresa.partials.movimento_estoque')
        </div>

        <div class="row">
            <div class="col-12">
                <form action="{{ route('empresas.destroy', $empresa)}}?tipo={{ $empresa->tipo}}" method="post">
                    @method('DELETE')
                    @csrf

                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja apagar?')">Apagar</button>
                </form>
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
