@extends('adminlte::page')

@section('title', 'AdminLTE')
   
@section('content_header')
    <span style="font-size:20px">
        <i class='fa fa-database'></i> Inserindo um novo registro de Fornecedor</h1>
    </span>

    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">Dashboard</a>
        </li>
        <li>
            <a href="{{ route('fornecedor.index') }}">Lista de Fornecedores</a>
        </li>
        <li class="active">Inserindo um novo registro</li>
    </ol>
@stop

@section('content')

    <div class="panel panel-default">
    <!-- Default panel contents -->
        <div class="panel-heading">Formulário de inserção de registro</div>
        <div class="panel-body">

            <form action="{{ route('fornecedor.store') }}" method="post" role="form"> {{ csrf_field() }}

                <div class="form-group">

                    <label for="nome">
                        Nome   
                        <span class="text-red">*</span>
                    </label>

                    <input type="text" class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" id="nome" name="nome" placeholder="Nome do Fornecedor" value="{{ old('nome') }}"> 
                    @if($errors->has('nome'))
                    <span class='invalid-feedback text-red'> {{ $errors->first('descricao') }}</span> 
                    @endif

                    <label for="endereco">
                        Endereço   
                        <span class="text-red">*</span>
                    </label>

                    <input type="text" class="form-control {{ $errors->has('endereco') ? 'is-invalid' : '' }}" id="endereco" name="endereco" placeholder="Endereço" value="{{ old('endereco') }}"> 
                    @if($errors->has('endereco'))
                        <span class='invalid-feedback text-red'> {{ $errors->first('endereco') }}</span>
                    @endif
                    <label for="telefone">
                        Telefone  
                        <span class="text-red">*</span>
                    </label>

                    <input type="text" class="form-control {{ $errors->has('telefone') ? 'is-invalid' : '' }}" id="telefone" name="telefone" placeholder="Telefone" value="{{ old('telefone') }}"> 
                    @if($errors->has('telefone'))
                        <span class='invalid-feedback text-red'> {{ $errors->first('telefone') }}</span>  
                    @endif

                </div>

                <a class="btn btn-default" href="{{ route('fornecedor.index') }}">
                    <i class="fa fa-chevron-circle-left">Voltar</i>
                </a>

                <button type="submit" class="btn btn-primary"><i class="fa fa-save">Gravar</i></button>

            </form>

        </div>
    </div>   
@stop