<?php

namespace Sorvetop\Http\Controllers;

use Illuminate\Http\Request;
use Sorvetop\Models\Fornecedore;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fornecedores = Fornecedore::orderBy('id', 'asc')->paginate(5);

        return view('fornecedor.index', 
            ['fornecedores' => $fornecedores]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fornecedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fornecedor = new Fornecedore;
        $fornecedor->nome = $request->nome;
        $fornecedor->endereco = $request->endereco;
        $fornecedor->telefone = $request->telefone;
        // Salva os dados na tabela
        $fornecedor->save();

        // Retorna para view index com uma flash message
        return redirect()
            ->route('fornecedor.index')
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
        $fornecedor = Fornecedore::findOrFail($id);

        // Chama a view para exibir os dados na tela
        return view(
            'fornecedor.show',
            [
                'fornecedor' => $fornecedor
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
        $fornecedor = Fornecedore::findOrFail($id);

        // Chama a view com o formulário para edição do registro
        return view(
            'fornecedor.edit',
            [
                'fornecedor' => $fornecedor
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
        $fornecedor = Fornecedore::findOrFail($id);
        $fornecedor->nome = $request->nome;
        $fornecedor->endereco = $request->endereco;
        $fornecedor->telefone = $request->telefone;
        // Salva os dados na tabela
        $fornecedor->save();

        // Retorna para view index com uma flash message
        return redirect()
            ->route('fornecedor.index')
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
        $fornecedor = Fornecedore::findOrFail($id);

        // Exclui o registro da tabela
        $fornecedor->delete();

        // Retorna para view index com uma flash message
        return redirect()
            ->route('fornecedor.index')
            ->with('status', 'Registro excluído com sucesso!');
    }
}
