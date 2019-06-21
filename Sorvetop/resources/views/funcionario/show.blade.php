@extends('adminlte::page')

@section('title', 'AdminLTE')
   
@section('content_header')
    <h1>
        <i class='fa fa-database'></i> Exibindo os detalhes do registro de Funcionario
    </h1>

    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">Dashboard</a>
        </li>

        <li>
            <a href="{{ route('funcionario.index') }}">Lista de Funcionarios</a>
        </li>

        <li class="active">Exibindo dados</li>
    </ol>
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <span>
                <a class='' href= "{{ route('funcionario.index') }}">
                    <i class='fa... fa-chevron-circle-left'></i> 
                    Retorna para a tela de consulta
                </a>
            </span>
        </div>
 
        <div class="panel-body">
            <table class="table table-hover table-striped">
                <tbody>
                    <tr>
                        <td class='col-sm-2'>ID</td>
                        <td class='col-sm-10'>{{ $funcionario->id }}</td>
                    </tr>
 
                    <tr>
                        <td class='col-sm-1'>Nome</td>
                        <td class='col-sm-10'>{{ $funcionario->nome }}</td>
                    </tr>
 
                    <tr>
                        <td class='col-sm-2'>Endereco</td>
                        <td class='col-sm-10'>{{ $funcionario->endereco }}</td>
                    </tr>

                    <tr>
                        <td class='col-sm-2'>Telefone</td>
                        <td class='col-sm-10'>{{ $funcionario->telefone }}</td>
                    </tr>

                    <tr>
                        <td class='col-sm-2'>Salario</td>
                        <td class='col-sm-10'>{{ $funcionario->salario }}</td>
                    </tr>

                    <tr>
                        <td class='col-sm-2'>Data de Criação</td>
                        <td class='col-sm-10'>{{ $funcionario->created_at->format('d/m/Y h:i') }}</td>
                    </tr>
 
                </tbody>
            </table>
        </div>

        <div class="panel-footer">
            <span>
                <a class='' href="{{ route('funcionario.index') }}">
                    <i class='fa... fa-chevron-circle-left'></i> 
                    Retorna para a tela de consulta
                </a>
            </span>
        </div>
    </div>

@stop