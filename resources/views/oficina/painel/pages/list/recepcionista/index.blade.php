@extends('adminlte::page')

@section('title', 'e-oficina')

@section('content_header')
    <div align="left">
        <h2><b><i>Recepcionista</i></b></h2>
    </div>
@stop

@section('content')

    @include('oficina.painel.includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome da Recepcionista</th>
                        <th class="esc">Perfil</th>
                        <th class="esc">E-mail</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recepcionistas as $recepcionista)
                        <tr>
                            <td>
                                @if (@$recepcionista->image)
                                    <img src="{{ asset('storage/user/' . @$recepcionista->image) }}" width="40px"
                                        alt="{{ @$recepcionista->name }}" id="imgup">
                                @else
                                    <img src="{{ asset('storage/user/default.jpg') }}" width="40px" id="imgup">
                                @endif
                                - {{ $recepcionista->name }}
                            </td>
                            <td class="esc"><b><i>{{ $recepcionista->role->nome }}</i></b></td>
                            <td class="esc"><b><i>{{ $recepcionista->email }}</i></b></td>
                            <td>
                                <a href="{{ route('user.show', $recepcionista->url) }}" title="Ver Recepcionista"><i
                                        class="fas fa-list text-dark"></i></a>
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
