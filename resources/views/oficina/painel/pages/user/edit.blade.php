@extends('adminlte::page')

@section('title', "Editar {$user->name}")

@section('content_header')
    <div align="right">
        <a href="{{ route('user.index') }}" class="btn btn-dark">Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('user.update', $user->url) }}" method="POST" class="form" enctype="multipart/form-data">
                @method('PUT')
                @include('oficina.painel.pages.user._partials.form')
            </form>
        </div>
    </div>
@stop
