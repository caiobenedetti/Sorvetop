<?php

namespace Sorvetop\Http\Controllers;

use Illuminate\Http\Request;
use Sorvetop\Models\Item;
use Illuminate\Support\Facades\DB;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Item;
        $item->qtd = $request->qtd;
        $item->preco = $item->qtd * 32;
        $item->ven_id = $request->ven_id;
        
        // Salva os dados na tabela
        $item->save();

        // Retorna para view index com uma flash message
        return redirect()
            ->route('venda.show', $item->ven_id)
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $item = Item::findOrFail($id);
        return view('item.edit', [
            'item' => $item
        ]);
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
        $item = Item::findOrFail($id);
        $item->qtd = $request->qtd;
        $item->preco = $item->qtd * 32;
       
        // Salva os dados na tabela
        $item->save();

        // Retorna para view index com uma flash message
        return redirect()
            ->route('venda.show', $item->ven_id)
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
        $item = Item::findOrFail($id);
        $var = $item->ven_id;
        // Exclui o registro da tabela
        $item->delete();

        // Retorna para view index com uma flash message
        return redirect()
            ->route('venda.show', $var)
            ->with('status', 'Registro excluído com sucesso!');
    
    }
}
