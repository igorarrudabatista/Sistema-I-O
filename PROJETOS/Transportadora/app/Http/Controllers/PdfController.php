<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Create;
use App\Models\Empresa_clientes;
use \PDF;

class PdfController extends Controller {
    public function geraPdf() {

        $empresa = Empresa_clientes::all();
        
        

        $pdf = PDF::loadView('/produtos/pdf', compact('orcamento'));

        return $pdf->setPaper('a4')->stream('Todos_Produtos.pdf');
    }
}
