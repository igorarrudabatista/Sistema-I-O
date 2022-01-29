<?php

namespace App\Http\Controllers;

use App\Models\Empresa_clientes;
use Illuminate\Http\Request;
use App\Models\Orcamento;
use App\Models\Empresa;

use App\Models\Produtos;


class OrcamentoController extends Controller
{
    public function create (){

        $empresa_cliente = Empresa_clientes::all();

        $orcamento = Orcamento::all();
        $minha_empresa = Empresa::all();
        $produto = Produtos::all();



        return view('orcamento.create_orcamento',
         ['empresa_cliente'=> $empresa_cliente, 
        'orcamento'     => $orcamento,
        'minha_empresa' => $minha_empresa,
        'produto'       => $produto]);

        }

        


    public function store (Request $request) {

        $criar_orcamento =  new Orcamento();

        $criar_orcamento -> Numero_Orcamento     = $request->Numero_Orcamento;
        $criar_orcamento -> Data                 = $request->Data;
        $criar_orcamento -> Validade             = $request->Validade;
        $criar_orcamento -> Garantia             = $request->Garantia;
        $criar_orcamento -> Forma_Pagamento      = $request->Forma_Pagamento;
        $criar_orcamento -> Descricao            = $request->Descricao;
        $criar_orcamento -> Quantidade           = $request->Quantidade;
        $criar_orcamento -> Valor                = $request->Valor;
        $criar_orcamento -> Desconto             = $request->Desconto;
        $criar_orcamento -> Taxas                = $request->Taxas;
        
        $criar_orcamento -> empresa_clientes_id  = $request->empresa_clientes_id;
        $criar_orcamento -> produto_id           = $request->produto_id;
        $criar_orcamento -> empresa_id           = $request->empresa_id;
        
        $criar_orcamento ->save();

        $criar_orcamento = Orcamento::all();



        return redirect('/')->with('msg', 'Orçamento criado com sucesso'); 
    
    }

    public function show() {
        
        $criar_orcamento = Orcamento::all();

        $empresa_cliente = Empresa_clientes::all();

        $search = request('search');

        if($search) {
            $criar_orcamento = Orcamento::where ([['Numero_Orcamento', 'like', '%'.$search. '%' ]])->get();

             } else {
                $criar_orcamento = Orcamento::all();
            }
        

        return view('orcamento.show_orcamento',[
                    'criar_orcamento'   => $criar_orcamento,
                    'search'            => $search,
                    'empresa_cliente'   => $empresa_cliente]);
    }


    
    public function edit ($id){

        $editar_orcamento = Orcamento::findOrFail($id);

        $titulo = "Edita Cliente";
        $cliente = Empresa_clientes::find($id);

        return view ('orcamento.edit', ['editar_orcamento'=> $editar_orcamento, compact('titulo', 'cliente')]);


    }

    public function update (Request $request){

       Orcamento::findOrFail($request->id)
       ->update($request->all());


        return redirect('/orcamento/show_orcamento')->with('msg', 'Orçamento editado com sucesso!');

    }

    public function gerar_pdf($id){

        $orcamento = Orcamento::findOrFail($id);

        $empresa_cliente = Empresa_clientes::find($id, ['Cnpj']);

        $minha_empresa = Empresa::find($id);

        return view('orcamento.gerar_pdf', ['empresa_cliente'=> $empresa_cliente, 
        'orcamento'=> $orcamento, 'minha_empresa'=> $minha_empresa]);

    }

    public function destroy($id){

        Orcamento::findOrFail($id) -> delete();
        return redirect('/orcamento/show_orcamento')->with('msg', 'Orçamento deletado com sucesso!');
    }
 

 

}
