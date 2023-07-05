@extends('adminlte::page')

@section('title', 'Cadastrar Contato')

@section('content_header')
    <div align="right">
        <a href="{{ route('contact.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('contact.store') }}" class="form" method="POST">
                @include('erp.painel.pages.cadastros.contact._partials.form')
            </form>
        </div>
    </div>
@stop
