@extends('adminlte::page')

@section('title', 'Detalhes do Usuário')

@section('content_header')
    <div align="left">
        <h1>Detalhes do Usuário <b>{{ $user->name }}</b></h1>
    </div>
    <div align="right">
        <a href="{{ route('user.index') }}" class="btn btn-dark">Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5><b>Dados Gerais</b></h5>
                    <hr>
                    <ul>
                        <li>
                            <strong>Usuário: </strong> {{ $user->name }}
                        </li>
                        <li>
                            <strong>CPF: </strong> {{ $user->cpf }}
                        </li>
                        <li>
                            <strong>RG: </strong> {{ $user->rg }}
                        </li>
                        <li>
                            <strong>Apelido: </strong> {{ $user->surname }}
                        </li>
                        <li>
                            <strong>Data de Cadastro: </strong> {{ date('d/m/Y', strtotime($user->created_at)) }}
                        </li>
                        <li>
                            <strong>Última Atualização: </strong> {{ $user->updated_at->diffForHumans() }}
                        </li>
                        <li>
                            <strong>Perfil: </strong> {{ $user->role->nome }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5><b>Contatos</b></h5>
                    <hr>
                    <ul>
                        <li>
                            <strong>Telefone: </strong> {{ $user->fone }}
                        </li>
                        <li>
                            <strong>Celular / Whatsapp: </strong> {{ $user->celular }}
                        </li>
                        <li>
                            <strong>E-mail: </strong> {{ $user->email }}
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <h5><b>Endereço</b></h5>
                    <hr>
                    <ul>
                        <li>
                            <strong>CEP: </strong> {{ $user->cep }}
                        </li>
                        <li>
                            <strong>Logradouro: </strong> {{ $user->logradouro }}
                        </li>
                        <li>
                            <strong>Bairro: </strong> {{ $user->bairro }}
                        </li>
                        <li>
                            <strong>Cidade: </strong> {{ $user->cidade }}
                        </li>
                        <li>
                            <strong>Estado: </strong> {{ $user->uf }}
                        </li>
                        <li>
                            <strong>Número: </strong> {{ $user->numero }}
                        </li>
                        <li>
                            <strong>Complemento: </strong> {{ $user->complemento }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5><b>Redes Sociais</b></h5>
                    <hr>
                    <ul>
                        <li>
                            <strong>Facebook: </strong> {{ $user->facebook }}
                        </li>
                        <li>
                            <strong>Twitter: </strong> {{ $user->twitter }}
                        </li>
                        <li>
                            <strong>Linkedin: </strong> {{ $user->linkedin }}
                        </li>
                        <li>
                            <strong>Instagram: </strong> {{ $user->instagram }}
                        </li>
                        <li>
                            <strong>Tiktok: </strong> {{ $user->tiktok }}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h5><b>Imagem</b></h5>
                    <hr>
                    <div align="center" class="form-group">
                        @if (@$user->image)
                            <img src="{{ asset('storage/user/' . @$user->image) }}" width="170px"
                                alt="{{ @$user->name }}">
                        @else
                            <img src="{{ asset('storage/user/default.jpg') }}" width="170px">
                        @endif
                    </div>
                </div>
            </div>
            <hr>
            @include('oficina.painel.includes.alerts')
            <div class="form-group">
                <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#modal-primary"><i
                        class="fa fa-trash text-danger"></i>
                    Deletar usuário - {{ $user->name }}</button>
            </div>

            <div class="modal fade" id="modal-primary">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bg-default">
                        <div class="modal-header">
                            <h4 class="modal-title">Deseja Realmente Excluir?</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div align="center" class="modal-body">
                            <form action="{{ route('user.destroy', $user->url) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Deletar Usuário - {{ $user->name }}"
                                    class="btn btn-sm btn-dark" width="150"><i class="fa fa-trash text-danger"></i>
                                    Deletar usuário - {{ $user->name }}</button>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-between"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
