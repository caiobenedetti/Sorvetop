@extends('adminlte::page')

@section('title', 'AdminLTE')
   
@section('content_header')
    <h1>
        <i class='fa fa-database'></i> Exibindo os detalhes do registro da venda 
    </h1>

    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">Dashboard</a>
        </li>

        <li>
            <a href="{{ route('venda.index') }}">Descrição da Venda</a>
        </li>

        <li class="active">Exibindo dados</li>
    </ol>
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <span>
                <a class='' href= "{{ route('venda.index') }}">
                    <i class='fa fa-chevron-circle-left'></i> 
                    Retorna para a tela de consulta
                </a>
            </span>
        </div>
 
        <div class="panel-body">
            <table class="table table-hover table-striped">
                <tbody>
                    <tr>
                        <td class='col-sm-2'>ID</td>
                        <td class='col-sm-10'>{{ $venda->id }}</td>
                    </tr>
 
                    <tr>
                        <td class='col-sm-1'>Preço Total</td>
                        <td class='col-sm-10'>{{ $venda->preco }}</td>
                    </tr>

                    <tr>
                        <td class='col-sm-2'>Data de Criação</td>
                        <td class='col-sm-10'>{{ $venda->created_at->format('d/m/Y h:i') }}</td>
                    </tr>
 
                </tbody>
            </table>

            <table class="table table-striped table-bordered table-hover table-responsive">
                <thead>
                    <tr>
                        <th>ID do Item</th>
                        <th>Peso do item</th>
                        <th>Preço do Item</th>
                        <th class='text-center'>Ações</th>
                    </tr>
                </thead>

                <label for='items'>
                    Items
                </label>

                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{$item->qtd}}</td>
                        <td>{{$item->preco}}</td>
                        <td class='text-right' style="width: 140px">

                            <a class='btn btn-warning btn-sm' href='{{ route("item.edit", $item->id) }}' role='button'>
                                <i class='fa fa-pencil'></i>
                            </a>

                            <a class='btn btn-danger btn-sm' href="{{ route('item.destroy', $item->id) }}">
                                <i class='fa fa-trash'></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="panel-footer">
            <span>
                <a class='' href="{{ route('item.create') }}">
                    <i class='fa fa-plus'></i> 
                    Adiciona mais itens 
                </a>
            </span>
            <span>
                <a class='' href="{{ route('venda.index') }}">
                    <i class='fa fa-chevron-circle-left'></i> 
                    Salva venda
                </a>
            </span>
        </div>
    </div>

@stop