@extends('adminlte::page')

@section('title', "Editar Contato {$supplier->nome}")

@section('content_header')
    <div align="right">
        <a href="{{ route('supplier.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('supplier.update', $supplier->url) }}" method="POST" class="form">
                @method('PUT')
                @include('oficina.painel.pages.supplier._partials.form')
            </form>
        </div>
    </div>
@stop
