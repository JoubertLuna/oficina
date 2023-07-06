@extends('adminlte::page')

@section('title', 'Detalhes do Fornecedor')

@section('content_header')
    <div align="left">
        <h1>Detalhes do Fornecedor <b>{{ $supplier->nome }}</b></h1>
    </div>
    <div align="right">
        <a href="{{ route('supplier.index') }}" class="btn btn-dark">Voltar</a>
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
                            <strong>Nome: </strong> {{ $supplier->nome }}
                        </li>
                        <li>
                            <strong>Nome Fantasia: </strong> {{ $supplier->nome_fantasia }}
                        </li>
                        <li>
                            <strong>Ativo: </strong> {{ $supplier->ativo === '1' ? 'Sim' : 'Não' }}
                        </li>
                        <li>
                            <strong>CPF: </strong> {{ $supplier->cpf }}
                        </li>
                        <li>
                            <strong>RG: </strong> {{ $supplier->rg }}
                        </li>
                        <li>
                            <strong>CNPJ: </strong> {{ $supplier->cnpj }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5><b>Contatos</b></h5>
                    <hr>
                    <ul>
                        <li>
                            <strong>Telefone: </strong> {{ $supplier->fone }}
                        </li>
                        <li>
                            <strong>Celular: </strong> {{ $supplier->celular }}
                        </li>
                        <li>
                            <strong>E-mail: </strong> {{ $supplier->email }}
                        </li>
                    </ul>
                    <h5><b>Endereço</b></h5>
                    <hr>
                    <ul>
                        <li>
                            <strong>CEP: </strong> {{ $supplier->cep }}
                        </li>
                        <li>
                            <strong>Logradouro: </strong> {{ $supplier->logradouro }}
                        </li>
                        <li>
                            <strong>Bairro: </strong> {{ $supplier->bairro }}
                        </li>
                        <li>
                            <strong>Cidade: </strong> {{ $supplier->cidade }}
                        </li>
                        <li>
                            <strong>Estado: </strong> {{ $supplier->uf }}
                        </li>
                        <li>
                            <strong>Número: </strong> {{ $supplier->numero }}
                        </li>
                        <li>
                            <strong>Complemento: </strong> {{ $supplier->complemento }}
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            @include('oficina.painel.includes.alerts')
            <div class="form-group">
                <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#modal-primary"><i
                        class="fa fa-trash text-danger"></i>
                    Deletar Fornecedor - {{ $supplier->nome }}</button>
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
                            <form action="{{ route('supplier.destroy', $supplier->url) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Deletar Usuário - {{ $supplier->nome }}"
                                    class="btn btn-sm btn-dark" width="150"><i class="fa fa-trash text-danger"></i>
                                    Deletar Fornecedor - {{ $supplier->nome }}</button>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-between"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
