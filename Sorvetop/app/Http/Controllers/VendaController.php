<?php

namespace Sorvetop\Http\Controllers;

use Illuminate\Http\Request;
use Sorvetop\Models\Venda;
use Sorvetop\Models\Item;
use Illuminate\Support\Facades\DB;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendas = Venda::orderBy('id', 'asc')->paginate(5);

        return view('venda.index', 
            ['vendas' => $vendas]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = [];
        return view('venda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $venda = new Venda;
        $venda->fun_id = $request->fun_id; 
        $venda->preco = 0;

        // Salva os dados na tabela
        $venda->save();

        
        return redirect()
            ->route('item.create')
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
        $venda = Venda::findOrFail($id);
        $item = DB::select('select * from items where ven_id = ?', [$id]);
        $preco = 0;
        for($i=0; $i<count($item); $i++){
            $preco += get_object_vars($item[$i])['preco'];
        }
        $venda->preco = $preco;
        $venda->save();

        
        // Chama a view com o formulário para edição do registro
        return view(
            'venda.show',
            [
                'venda' => $venda,
                'items' => $item

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

         return redirect()
            ->route('venda.edit', $id)
            ->with('status', 'Registro criado com sucesso!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venda = Venda::findOrFail($id);
        DB::delete('delete from items where ven_id = ?', [$id]);
        // Exclui o registro da tabela
        $venda->delete();

        // Retorna para view index com uma flash message
        return redirect()
            ->route('venda.index')
            ->with('status', 'Registro excluído com sucesso!');
    }
}
