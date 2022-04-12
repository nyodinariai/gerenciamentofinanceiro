@extends('layouts.app')

@section('title', 'produtos')
    @section('mainTitle')
        <h1>Listagem de Produto</h1>
    @stop
    @section('breadcrumb')
        <li class="breadcrumb-item">
            <a href="{{ url('/produtos') }}">Listagem de Produto</a>
        </li>
    @stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Produtos</div>
                    <div class="card-body">
                        <a href="{{ url('/produtos/create') }}" class="btn btn-success btn-sm" title="Novo Produto">
                            <i class="fa fa-plus" aria-hidden="true"></i> Novo
                        </a>

                        <form method="GET" action="{{ url('/produtos') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Nome</th><th>Descricao</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($produtos as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nome }}</td><td>{{ $item->descricao }}</td>
                                        <td>
                                            <a href="{{ url('/produtos/' . $item->id) }}" title="View Produto"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Detalhes</button></a>
                                            <a href="{{ url('/produtos/' . $item->id . '/edit') }}" title="Edit Produto"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/produtos' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Deletar Produto" onclick="return confirm(&quot;Deseja deletar?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Apagar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $produtos->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
