@extends('adminlte::page')

@section('title', 'AdminLTE')
    <meta name="csrf_token" content="{{ csrf_token() }}" />
@section('content_header')
    <span style="font-size:20px">
        <i class='fa fa-cart-arrow-down'></i> Lista de Vendas
    </span>

    <a class="btn btn-success btn-sm" href="{{ route('venda.create') }}">
        <i class="fa fa-plus"></i> Inserir uma nova Venda
    </a>

    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">Dashboard</a>
        </li>
        <li class="active">Lista de Vendas</li>
    </ol>
@stop

@section('content')

    <div class="panel panel-default">
    <!-- Default panel contents -->
        <div class="panel-heading">
            Relação de registros de Vendas
        </div>

        <div class="panel-body">
        <!-- Table -->


<table class="table table-striped table-bordered table-hover table-responsive">
    <thead>
        <tr>
            
            <th>ID</th>
            <th>Nome do Funcionário</th>
            <th>Preço Total</th>
            <th class='text-center'>Data de Registro</th>
            <th class='text-center'>Ações</th>
        </tr>
    </thead>

    <tbody>
    @foreach($vendas as $venda)
        <tr>
            <td>{{ $venda->id }}</td>
            <td>
                <?php
                    $fun = DB::select('select nome from funcionarios where id = ?', [$venda->fun_id]);
                    $r = get_object_vars($fun[0]);
                    
                    echo $r['nome'];
                ?>
                
            </td>
            <td>{{$venda->preco}}</td>
            <td class='text-center' style='width:150px'>{{ $venda->created_at->format('d/m/Y h:m') }}</td>
            <td class='text-right' style="width: 140px">
                <a class='btn btn-primary btn-sm' href='{{ route("venda.show", $venda->id) }}' role='button'>
                    <i class='fa fa-eye'></i>
                </a>
                <a class='btn btn-danger btn-sm' href="{{ route('venda.destroy', $venda->id) }}">
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