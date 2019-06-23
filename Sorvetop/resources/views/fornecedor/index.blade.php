@extends('adminlte::page')

@section('title', 'AdminLTE')
    <meta name="csrf_token" content="{{ csrf_token() }}" />
@section('content_header')
    <span style="font-size:20px">
        <i class='fa fa-user'></i> Lista de Fornecedores
    </span>

    <a class="btn btn-success btn-sm" href="{{ route('fornecedor.create') }}">
        <i class="fa fa-plus"></i> Inserir um novo fornecedor
    </a>

    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">Dashboard</a>
        </li>
        <li class="active">Lista de Fornecedores</li>
    </ol>
@stop

@section('content')

    <div class="panel panel-default">
    <!-- Default panel contents -->
        <div class="panel-heading">
            Relação de registros de Fornecedores
        </div>

        <div class="panel-body">
        <!-- Table -->
            <table class="table table-striped table-bordered table-hover table-responsive">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th class='text-center'>Data de Registro</th>
                        <th class='text-center'>Ações</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($fornecedores as $fornecedor)
                    <tr>
                        <td>{{ $fornecedor->id }}</td>
                        <td>{{$fornecedor->nome}}</td>
                        <td class='text-center' style='width:150px'>{{ $fornecedor->created_at->format('d/m/Y h:m') }}</td>
                        <td class='text-right' style="width: 140px">
                            <a class='btn btn-primary btn-sm' href='{{ route("fornecedor.show", $fornecedor->id) }}' role='button'>
                                <i class='fa fa-eye'></i>
                            </a>

                            <a class='btn btn-warning btn-sm' href='{{ route("fornecedor.edit", $fornecedor->id) }}' role='button'>
                                <i class='fa fa-pencil'></i>
                            </a>

                            <a class='btn btn-danger btn-sm' href="{{ route('fornecedor.destroy', $fornecedor->id) }}">
                                <i class='fa fa-trash'></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="panel-footer">

        </div>
    </div>    
@stop