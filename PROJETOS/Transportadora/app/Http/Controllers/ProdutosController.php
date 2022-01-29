<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Create;

class ProdutosController extends Controller
{
    public function produtos() {
        
        $produtos = Create::all();

        $search = request('search');

        if($search) {
            $produtos = Create::where ([['Nome_Produto', 'like', '%'.$search. '%' ]])->get();

             } else {
                $produtos = Create::all();
            }
        

        return view('produtos.produtos', ['produtos'=> $produtos, 'search' => $search]);

    }
    

}