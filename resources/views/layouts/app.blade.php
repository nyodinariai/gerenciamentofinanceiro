@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                @yield('mainTitle')
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Dashboard</a>
                    </li>
                    @yield('breadcrumb')
                </ol>
            </div>
        </div>
    </div>

    @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error )
        <li>{{ $error}}</li>
        @endforeach
    </ul>
</div>
@endif
@stop


@section('content')

@stop



@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

