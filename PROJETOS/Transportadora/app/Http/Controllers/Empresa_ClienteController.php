<?php

namespace App\Http\Controllers;

use App\Models\Empresa_clientes;
use Illuminate\Http\Request;


class Empresa_ClienteController extends Controller
{
    public function create (){

        return view ('empresa.form_empresa_cliente');
        }


    public function store (Request $request) {

        $criar_empresa_cliente =  new Empresa_clientes();

        $criar_empresa_cliente -> Nome_Empresa       = $request->Nome_Empresa;
        $criar_empresa_cliente -> Cnpj               = $request->Cnpj;
        $criar_empresa_cliente -> Email              = $request->Email;
        $criar_empresa_cliente -> Telefone           = $request->Telefone;
        $criar_empresa_cliente -> Site               = $request->Site;
        $criar_empresa_cliente -> Cidade             = $request->Cidade;
        $criar_empresa_cliente -> Endereço           = $request->Endereço;
        $criar_empresa_cliente -> Estado             = $request->Estado;
        $criar_empresa_cliente -> image              = $request->image;

                // Imagem do produto upload
        if ($request->hasFile('image')&& $request->file('image')->isValid()){

            $requestImage = $request -> image;

            $extension = $requestImage-> extension();

            $imageName = md5($requestImage -> getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request -> image->move(public_path('img/empresa'), $imageName);

            $criar_empresa_cliente -> image = $imageName;

        }

        $criar_empresa_cliente ->save();

        $criar_empresa = Empresa_clientes::all();

        return redirect('/empresa/show_clientes')->with('msg', 'Cliente cadastrado com sucesso'); 
    
    }

    public function show() {
        
        $criar_empresa = Empresa_clientes::all();

        $search = request('search');

        if($search) {
            $criar_empresa = Empresa_clientes::where ([['Nome_Empresa', 'like', '%'.$search. '%' ]])->get();

             } else {
                $criar_empresa = Empresa_clientes::all();
            }
        

        return view('empresa.show_clientes', ['empresa_clientes'=> $criar_empresa, 'search' => $search]);

    }

    public function edit ($id){

        $editar_empresa = Empresa_clientes::findOrFail($id);

        $titulo = "Edita Cliente";
        $cliente = Empresa_clientes::find($id);

        return view ('empresa.edit', ['editar_empresa'=> $editar_empresa, compact('titulo', 'cliente')]);


    }

    public function update (Request $request){

        Empresa_clientes::findOrFail($request->id)
       ->update($request->all());


        return redirect('/empresa/show_clientes')->with('msg', 'Orçamento editado com sucesso!');

    }



    public function destroy($id){

        Empresa_clientes::findOrFail($id) -> delete();
        return redirect('/empresa/show_clientes')->with('msg', 'Produto deletado com sucesso!');
    }

}
