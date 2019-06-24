@extends('adminlte::page')

@section('title', 'AdminLTE')
   
@section('content_header')
    <span style="font-size:20px">
        <i class='fa fa-database'></i> Inserindo um novo item</h1>
    </span>

    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">Dashboard</a>
        </li>
        <li>
            <a href="{{ route('fornecedor.index') }}">Lista de items</a>
        </li>
        <li class="active">Inserindo um novo registro</li>
    </ol>
@stop

@section('content')

    <div class="panel panel-default">
    <!-- Default panel contents -->
        <div class="panel-heading">Formulário de inserção de registro</div>
        
        <div class="panel-body">

            <form action="{{ route('item.store') }}" method="post" role="form"> {{ csrf_field() }}

                <div class="form-group">

                    <label for="qtd">
                        Peso   
                        <span class="text-red">*</span>
                    </label>

                    

                    <input type="float" class="form-control {{ $errors->has('qtd') ? 'is-invalid' : '' }}" id="qtd" name="qtd" placeholder="Peso" value="{{ old('qtd') }}"> 
                    @if($errors->has('qtd'))
                    <span class='invalid-feedback text-red'> {{ $errors->first('qtd') }}</span> 
                    @endif

                    <label for="ven_id">
                        ID da venda
                        <span class="text-red">*</span>
                    </label>

                    <div >
                         <?php
                            $ven_id = DB::select('select * from vendas order by id desc');
                    
                            $id = get_object_vars($ven_id[0])['id'];

                            echo($id);
                         ?>
                    </div> 

                    

                </div>
                
                <input type="hidden" id="{ven_id}" name="ven_id" placeholder="Peso" value={{$id}}>     

                <a class="btn btn-default" href="{{ route('venda.create') }}">
                    <i class="fa fa-chevron-circle-left">Voltar</i>
                </a>

                <button type="submit" class="btn btn-primary"><i class="fa fa-save">Salvar Item</i></button>

            </form>

        </div>
    </div>   
@stop