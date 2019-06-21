<?php

namespace Sorvetop\Http\Controllers;

use Sorvetop\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios = Funcionario::orderBy('id', 'desc')
            ->paginate(6);
        return view('funcionario.index', 
            ['funcionarios' => $funcionarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('funcionario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $funcionario = new Funcionario;
        $funcionario->nome = $request->nome;
        $funcionario->endereco = $request->endereco;
        $funcionario->telefone = $request->telefone;
        $funcionario->salario = $request->salario;
        // Salva os dados na tabela
        $funcionario->save();

        // Retorna para view index com uma flash message
        return redirect()
            ->route('funcionario.index')
            ->with('status', 'Registro criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Localiza e retorna os dados de um registro pelo ID
        $funcionario = Funcionario::findOrFail($id);

        // Chama a view para exibir os dados na tela
        return view(
            'funcionario.show',
            [
                'funcionario' => $funcionario
            ]
        );    
            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Localiza o registro pelo seu ID
        $funcionario = Funcionario::findOrFail($id);

        // Chama a view com o formulário para edição do registro
        return view(
            'funcionario.edit',
            [
                'funcionario' => $funcionario
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $funcionario = Funcionario::findOrFail($id);
        $funcionario->nome = $request->nome;
        $funcionario->endereco = $request->endereco;
        $funcionario->telefone = $request->telefone;
        $funcionario->salario = $request->salario;
        // Salva os dados na tabela
        $funcionario->save();

        // Retorna para view index com uma flash message
        return redirect()
            ->route('funcionario.index')
            ->with('status', 'Registro atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $funcionario = Funcionario::findOrFail($id);

        // Exclui o registro da tabela
        $funcionario->delete();

        // Retorna para view index com uma flash message
        return redirect()
            ->route('funcionario.index')
            ->with('status', 'Registro excluído com sucesso!');
    }
}
