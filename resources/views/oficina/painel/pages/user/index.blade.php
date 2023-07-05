@extends('adminlte::page')

@section('title', 'e-oficina')

@section('content_header')
    <a href="{{ route('user.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Cadastrar novo
        Usuário</a>
@stop

@section('content')

    @include('oficina.painel.includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th class="esc">E-mail</th>
                        <th class="esc">Perfil</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                @if (@$user->image)
                                    <img src="{{ asset('storage/user/' . @$user->image) }}" width="40px"
                                        alt="{{ @$user->name }}" id="imgup">
                                @else
                                    <img src="{{ asset('storage/user/default.jpg') }}" width="40px" id="imgup">
                                @endif
                                - {{ $user->name }}
                            </td>
                            <td class="esc">{{ $user->email }}</td>
                            <td class="esc">{{ $user->role->nome }}</td>

                            <td>
                                    <a href="{{ route('user.show', $user->url) }}" title="Ver Usuário"><i
                                            class="fas fa-list text-dark"></i></a>
                                    <a href="{{ route('user.edit', $user->url) }}" title="Editar Dados"><i
                                            class="fa fa-edit text-primary"></i></a>
                            </td>
                        </tr>
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
