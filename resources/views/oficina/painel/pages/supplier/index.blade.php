@extends('adminlte::page')

@section('title', 'AZ LUNA´S')

@section('content_header')
    <a href="{{ route('contact.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Novo Contato</a>
@stop

@section('content')

    @include('erp.painel.includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome do Contato</th>
                        <th class="esc">E-mail</th>
                        <th class="esc">Contatos</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        @if ($contact->ativo === '1')
                            <tr>
                                <td>{{ $contact->nome }}</td>
                                <td class="esc">{{ $contact->email }}</td>
                                <td>{{ $contact->fone }} / {{ $contact->celular }}</td>

                                <td>
                                    <a href="{{ route('contact.show', $contact->id) }}" title="Ver Empresa"><i
                                            class="fas fa-list text-dark"></i></a>

                                    <a href="{{ route('contact.edit', $contact->id) }}" title="Editar Dados"><i
                                            class="fa fa-edit text-primary"></i></a>
                                </td>
                            </tr>
                        @else
                            <tr class="text-muted">
                                <td>{{ $contact->nome }}</td>
                                <td class="esc">{{ $contact->email }}</td>
                                <td>{{ $contact->fone }} / {{ $contact->celular }}</td>

                                <td>
                                    <a href="{{ route('contact.show', $contact->id) }}" title="Ver Empresa"><i
                                            class="fas fa-list text-dark"></i></a>

                                    <a href="{{ route('contact.edit', $contact->id) }}" title="Editar Dados"><i
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
