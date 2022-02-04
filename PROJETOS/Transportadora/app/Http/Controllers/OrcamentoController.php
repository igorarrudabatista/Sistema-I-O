<?php

namespace App\Http\Controllers;

use App\Models\Empresa_cliente;
use Illuminate\Http\Request;
use App\Models\Orcamento;
use App\Models\Empresa;

use App\Models\Produto;


class OrcamentoController extends Controller
{
    public function create()
    {

        $empresa_cliente = Empresa_cliente::all();

        $orcamento = Orcamento::all();
        $minha_empresa = Empresa::all();
        $produto = Produto::all();

        return view(
            'orcamento.create_orcamento',
            [
                'empresa_cliente' =>   $empresa_cliente,
                'orcamento'       =>   $orcamento,
                'minha_empresa'   =>   $minha_empresa,
                'produto'         =>   $produto
            ]
        );
    }




    public function store(Request $request)
    {

        $criar_orcamento =  Orcamento::create($request->all());

 

        


        return redirect('/')->with('msg', 'Orçamento criado com sucesso');
    }

    public function show()
    {

        $criar_orcamento = Orcamento::all();

        $empresa_cliente = Empresa_cliente::all();
        $empresa = Empresa::all();
        $produto = Produto::all();

        $search = request('search');

        if ($search) {
            $criar_orcamento = Orcamento::where([['Numero_Orcamento', 'like', '%' . $search . '%']])->get();
        } else {
            $criar_orcamento = Orcamento::all();
        }


        return view('orcamento.show_orcamento', [
            'criar_orcamento'   => $criar_orcamento,
            'search'            => $search,
            'empresa_cliente'   => $empresa_cliente,
            'produto'           => $produto,
            'empresa'           => $empresa
        ]);
    }



    public function edit($id)
    {

        $editar_orcamento = Orcamento::findOrFail($id);

        $titulo = "Edita Cliente";
        $cliente = Empresa_cliente::find($id);

        return view('orcamento.edit', ['editar_orcamento' => $editar_orcamento, compact('titulo', 'cliente')]);
    }

    public function update(Request $request)
    {

        Orcamento::findOrFail($request->id)
            ->update($request->all());


        return redirect('/orcamento/show_orcamento')->with('msg', 'Orçamento editado com sucesso!');
    }

    public function gerar_pdf($id)
    {

        $orcamento = Orcamento::findOrFail($id);

        $empresa_cliente = Empresa_cliente::all();

        $minha_empresa = Empresa::all();

        $produto = Produto::all();

        return view('orcamento.gerar_pdf', [
            'empresa_cliente' => $empresa_cliente,
            'orcamento' => $orcamento,
            'minha_empresa' => $minha_empresa,
            'produto' => $produto
        ]);
    }

    public function destroy($id)
    {

        Orcamento::findOrFail($id)->delete();
        return redirect('/orcamento/show_orcamento')->with('msg', 'Orçamento deletado com sucesso!');
    }
}
