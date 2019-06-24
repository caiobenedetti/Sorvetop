@extends('adminlte::page')

@section('title', config('adminlte.title'))

@section('content_header')
<span style="font-size:20px">
    <i class='fa fa-database'></i> Alteração de dados de Fornecedor</h1>
</span>

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home') }}">Dashboard</a>
    </li>
    <li>
        <a href="{{ route('venda.index') }}">Lista de Fornecedores</a>
    </li>
    <li class="active">Alteração de dados</li>
</ol>

@stop
@section('content')

<form action="{{ route('venda.update', $venda->id) }}" method="post" role="form">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">

    <div class="panel panel-default">
        <div class="panel-heading">
            Formulário de alteração de dados
        </div> 
        
        <!-- panel-heading -->
        <div class="panel-body">
            <div class="form-group">
                <label for="nome">Nome
                    <span class="text-red">*</span>
                </label>

                <input type="text" class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}"
                    id="nome" name="nome" placeholder="Nome do fornecedor"
                    value="{{ $venda->nome }}">

                @if($errors->has('nome'))
                <span class='invalid-feedback text-red'>
                    {{ $errors->first('nome') }}
                </span>
                @endif

                <label for="endereco">Endereço
                    <span class="text-red">*</span>
                </label>

                <input type="text" class="form-control {{ $errors->has('endereco') ? 'is-invalid' : '' }}"
                    id="endereco" name="endereco" placeholder="Endereço do fornecedor"
                    value="{{ $fornecedor->endereco }}">

                @if($errors->has('endereco'))
                <span class='invalid-feedback text-red'>
                    {{ $errors->first('endereco') }}
                </span>
                @endif

                <label for="telefone">Telefone
                    <span class="text-red">*</span>
                </label>

                <input type="text" class="form-control {{ $errors->has('telefone') ? 'is-invalid' : '' }}"
                    id="telefone" name="telefone" placeholder="Telefone do fornecedor"
                    value="{{ $fornecedor->telefone }}">

                @if($errors->has('telefone'))
                <span class='invalid-feedback text-red'>
                    {{ $errors->first('telefone') }}
                </span>
                @endif

            </div>
        </div> 
        
        <!-- panel-body -->

        <div class="panel-footer">
            <a class="btn btn-default" href="{{ route('venda.index') }}">
                <i class="fa fa-chevron-circle-left"></i> 
                Voltar
            </a>

            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Atualizar</button>
        </div> 
        <!-- panel-footer -->
    
    </div> 
    
    <!-- panel-default -->
</form>
@stop