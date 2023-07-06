@extends('adminlte::page')

@section('title', 'e-oficina')

@section('content_header')
    <a href="{{ route('supplier.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Novo Fornecedor</a>
@stop

@section('content')

    @include('oficina.painel.includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome do Fornecedor</th>
                        <th class="esc">E-mail</th>
                        <th class="esc">Contatos</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $supplier)
                        @if ($supplier->ativo === '1')
                            <tr>
                                <td>{{ $supplier->nome }}</td>
                                <td class="esc">{{ $supplier->email }}</td>
                                <td>{{ $supplier->fone }} / {{ $supplier->celular }}</td>

                                <td>
                                    <a href="{{ route('supplier.show', $supplier->url) }}" title="Ver Fornecedor"><i
                                            class="fas fa-list text-dark"></i></a>

                                    <a href="{{ route('supplier.edit', $supplier->url) }}" title="Editar Dados"><i
                                            class="fa fa-edit text-primary"></i></a>
                                </td>
                            </tr>
                        @else
                            <tr class="text-muted">
                                <td>{{ $supplier->nome }}</td>
                                <td class="esc">{{ $supplier->email }}</td>
                                <td>{{ $supplier->fone }} / {{ $supplier->celular }}</td>

                                <td>
                                    <a href="{{ route('supplier.show', $supplier->url) }}" title="Ver Fornecedor"><i
                                            class="fas fa-list text-dark"></i></a>

                                    <a href="{{ route('supplier.edit', $supplier->url) }}" title="Editar Dados"><i
                                            class="fa fa-edit text-primary"></i></a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@stop

@section('css')
    <style>
        @media screen and (max-width: 480px) {
            .esc {
                display: none;
            }
        }
    </style>
@stop
