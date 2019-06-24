@extends('adminlte::page')

@section('title', config('adminlte.title'))

@section('content_header')
<span style="font-size:20px">
    <i class='fa fa-database'></i> Inclusão de uma nova Venda</h1>
</span>

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home') }}">Dashboard</a>
    </li>
    <li>
        <a href="{{ route('venda.index') }}">Lista de Vendas</a>
    </li>
    <li class="active">Inclusão de dados</li>
</ol>

@stop
@section('content')

<form action="{{ route('venda.store') }}" method="post" role="form">
    {{ csrf_field() }}

    <div class="panel panel-default">
        <div class="panel-heading">
            Formulário de inclusão de dados
        </div> <!-- panel-heading -->

        <div class="panel-body">
            
            <!-- funcionário -->
            <div class="form-group">
                <label for="fun_id">Funcionário
                    <span class="text-red">*</span>
                </label>

                <div class="input-group">
                    <select name="fun_id" class="form-control">
                        <?php
                            $providers = DB::table('funcionarios')
                                ->select("id", "nome")
                                ->orderBy("nome", "asc")
                                ->get();

                            foreach ($providers as $p) {
                                echo "<option value=$p->id>$p->nome</option>";
                            }
                        ?>
                    </select>

                    @if($errors->has('fun_id'))
                    <span class='invalid-feedback text-red'>
                        {{ $errors->first('fun_id') }}
                    </span>
                    @endif
                </div>
            </div>

        </div>
       
    <!-- panel-body -->

        <div class="panel-footer">
            <a class="btn btn-default" href="{{ route('venda.index') }}">
                <i class="fa fa-chevron-circle-left"></i> Voltar
            </a>

            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Registrar Venda</button>
        </div> 
        
        <!-- panel-footer -->
   
    </div> 

    <!-- panel-default -->

    

</form>



@stop