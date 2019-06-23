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
            <!-- descrição do produto -->
            <div class="form-group">
                <label for="descricao">Descrição do Produto
                    <span class="text-red">*</span>
                </label>

                <input type="text" class="form-control {{ $errors->has('descricao') ? 'is-invalid' : '' }}"
                    id="descricao" name="descricao" placeholder="Forneça a descrição do produto">

                @if($errors->has('descricao'))
                <span class='invalid-feedback text-red'>
                    {{ $errors->first('descricao') }}
                </span>
                @endif
            </div>

            <!-- quantidade -->
            <div class="form-group">
                <label for="qtd">Quantidade em estoque
                    <span class="text-red">*</span>
                </label>

                <input type="number" class="form-control {{ $errors->has('qtd') ? 'is-invalid' : '' }}"
                    id="qtd" name="qtd" min=0 max=99999>

                @if($errors->has('qtd'))
                <span class='invalid-feedback text-red'>
                    {{ $errors->first('qtd') }}
                </span>
                @endif
            </div>

            <!-- estoque minimo -->
            <div class="form-group">
                <label for="qtd">Estoque minimo
                    <span class="text-red">*</span>
                </label>

                <input type="number" class="form-control {{ $errors->has('estoque-minimo') ? 'is-invalid' : '' }}"
                    id="estoque_minimo" name="estoque_minimo" min=0 max=99999>

                @if($errors->has('qtd'))
                <span class='invalid-feedback text-red'>
                    {{ $errors->first('estoque-minimo') }}
                </span>
                @endif
            </div>

            <!-- preço de venda -->
            <div class="form-group">
                <label for="prc_venda">Preço de Venda
                    <span class="text-red">*</span>
                </label>

                <div class="input-group">
                    <div class="input-group-addon">R$</div>
                    <input type="number" class="form-control {{ $errors->has('prc_venda') ? 'is-invalid' : '' }}"
                        id="prc_venda" name="prc_venda" min="0.00" max="99999.99" step="0.01">

                    @if($errors->has('prc_venda'))
                    <span class='invalid-feedback text-red'>
                        {{ $errors->first('prc_venda') }}
                    </span>
                    @endif
                </div>
            </div>

            <!-- preço de compra -->
            <div class="form-group">
                <label for="prc_compra">Preço de Compra
                    <span class="text-red">*</span>
                </label>

                <div class="input-group">
                    <div class="input-group-addon">R$</div>
                    <input type="number" class="form-control {{ $errors->has('prc_compra') ? 'is-invalid' : '' }}"
                        id="prc_compra" name="prc_compra" min="0.00" max="99999.99" step="0.01">

                    @if($errors->has('prc_compra'))
                    <span class='invalid-feedback text-red'>
                        {{ $errors->first('prc_compra') }}
                    </span>
                    @endif
                </div>
            </div>

            <!-- fornecedor -->
            <div class="form-group">
                <label for="provider_id">Fornecedor
                    <span class="text-red">*</span>
                </label>

                <div class="input-group">
                    <select name="provider_id" class="form-control">
                        <?php
                            $providers = DB::table('providers')
                                ->select("id", "nome")
                                ->orderBy("nome", "asc")
                                ->get();

                            foreach ($providers as $p) {
                                echo "<option value=$p->id>$p->nome</option>";
                            }
                        ?>
                    </select>

                    @if($errors->has('provider_id'))
                    <span class='invalid-feedback text-red'>
                        {{ $errors->first('provider_id') }}
                    </span>
                    @endif
                </div>
            </div>

            <!-- classificação -->
            <div class="form-group">
                <label for="classification_id">Classificação
                    <span class="text-red">*</span>
                </label>

                <div class="input-group">
                    <select name="classification_id" class="form-control">
                        <?php
                            $classifications = DB::table('classifications')
                                ->select("id", "descricao")
                                ->orderBy("descricao", "asc")
                                ->get();

                            foreach ($classifications as $c) {
                                echo "<option value=$c->id>$c->descricao</option>";
                            }
                        ?>
                    </select>

                    @if($errors->has('classification_id'))
                    <span class='invalid-feedback text-red'>
                        {{ $errors->first('classification_id') }}
                    </span>
                    @endif
                </div>
            </div>
        </div> <!-- panel-body -->

        <div class="panel-footer">
            <a class="btn btn-default" href="{{ route('products.index') }}">
                <i class="fa fa-chevron-circle-left"></i> Voltar
            </a>

            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Atualizar</button>
        </div> <!-- panel-footer -->
    </div> <!-- panel-default -->
</form>
@stop