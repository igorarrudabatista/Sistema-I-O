<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

class EmpresaController extends Controller
{


    public function create (){

        return view ('minha_empresa.form_empresa');
        }


    public function store (Request $request) {

        $criar_empresa =  new Empresa;

        $criar_empresa -> Nome_Empresa       = $request->Nome_Empresa;
        $criar_empresa -> Cnpj               = $request->Cnpj;
        $criar_empresa -> Email              = $request->Email;
        $criar_empresa -> Telefone           = $request->Telefone;
        $criar_empresa -> Site               = $request->Site;
        $criar_empresa -> image              = $request->image;

                // Imagem do produto upload
        if ($request->hasFile('image')&& $request->file('image')->isValid()){

            $requestImage = $request -> image;

            $extension = $requestImage-> extension();

            $imageName = md5($requestImage -> getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request -> image->move(public_path('img/empresa'), $imageName);

            $criar_empresa -> image = $imageName;

        }

        $criar_empresa ->save();

        $criar_empresa = Empresa::all();

        return redirect('/')->with('msg', 'Empresa cadastrada com sucesso'); 
    
    }

    public function show() {
        
        $criar_empresa = Empresa::all();

        $search = request('search');

        if($search) {
            $criar_empresa = Empresa::where ([['Nome_Empresa', 'like', '%'.$search. '%' ]])->get();

             } else {
                $criar_empresa = Empresa::all();
            }
        

        return view('minha_empresa.show_empresa', ['empresa'=> $criar_empresa, 'search' => $search]);

    }

    }
