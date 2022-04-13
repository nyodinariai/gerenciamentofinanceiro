@extends('layouts.app')

@section('title', 'Editar Movimento Financeiro')

@section('mainTitle')
        <h1>Editar Movimento Financeiro #{{ $movimentosfinanceiro->id }}</h1>
    @stop
    @section('breadcrumb')
        <li class="breadcrumb-item">
            <a href="{{ route('movimentos-financeiros.index') }}">Listagem de Movimentos Financeiro</a>
        </li>

        <li class="breadcrumb-item">
            <a href="{{ route('movimentos-financeiros.edit', $movimentosfinanceiro) }}">Editar Movimento Financeiro</a>
        </li>
    @stop

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Editar Movimento Financeiro #{{ $movimentosfinanceiro->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/movimentos-financeiros') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/movimentos-financeiros/' . $movimentosfinanceiro->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('movimentos-financeiros.form', ['formMode' => 'edit'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
