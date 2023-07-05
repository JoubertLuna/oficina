@extends('adminlte::page')

@section('title', 'e-oficina')

@section('content_header')
    <div align="left">
        <h2><b><i>Mecânico</i></b></h2>
    </div>
@stop

@section('content')

    @include('oficina.painel.includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome do Mecânico</th>
                        <th class="esc">Perfil</th>
                        <th class="esc">E-mail</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mecanicos as $mecanico)
                        <tr>
                            <td>
                                @if (@$mecanico->image)
                                    <img src="{{ asset('storage/user/' . @$mecanico->image) }}" width="40px"
                                        alt="{{ @$mecanico->name }}" id="imgup">
                                @else
                                    <img src="{{ asset('storage/user/default.jpg') }}" width="40px" id="imgup">
                                @endif
                                - {{ $mecanico->name }}
                            </td>
                            <td class="esc"><b><i>{{ $mecanico->role->nome }}</i></b></td>
                            <td class="esc"><b><i>{{ $mecanico->email }}</i></b></td>
                            <td>
                                <a href="{{ route('user.show', $mecanico->url) }}" title="Ver Mecânico"><i
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
