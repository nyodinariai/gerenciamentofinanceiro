@extends('layouts.app')

@section('title', 'Novo Movimento Financeiro')

@section('mainTitle')
        <h1>Novo Movimento Financeiro</h1>
    @stop
    @section('breadcrumb')
        <li class="breadcrumb-item">
            <a href="{{ url('/movimentos-financeiros') }}">Listagem de Movimentos Financeiro</a>
        </li>

        <li class="breadcrumb-item">
            <a href="{{ url('/movimentos-financeiros/create')}}">Novo Movimento Financeiro</a>
        </li>
    @stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Novo Movimento Financeiro</div>
                    <div class="card-body">
                        <a href="{{ url('/movimentos-financeiros') }}" title="voltar"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/movimentos-financeiros') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('movimentos-financeiros.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
