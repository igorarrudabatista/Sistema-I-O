<?php

use App\Http\Controllers\{
    CreateController,
    Empresa_ClienteController,
    EmpresaController,
    HomeController,
    PdfController,
    ProdutosController,
    OrcamentoController,
};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [HomeController::class, 'home']);

Route::get('base', function () {
    return view('base');
}); 

Route::get('/dashboard/home',               [HomeController::class,     'home']);


//Cadastro de Produtos
Route::get('/produtos/produtos',            [ProdutosController::class, 'produtos']);
Route::get('/produtos/create',              [ProdutosController::class,   'create']);
Route::get('/produtos/edit/{id}',           [ProdutosController::class,   'edit']);
Route::post('/produtos',                    [ProdutosController::class,   'store']);
Route::put('/produtos/update/{id}',         [ProdutosController::class,   'update']);
Route::delete('/produtos/{id}',             [ProdutosController::class,   'destroy']);

//Minha Empresa
Route::get('/minha_empresa/form_empresa',         [EmpresaController::class,   'create']);
Route::post('/minha_empresa',                     [EmpresaController::class,   'store']);
Route::get('/minha_empresa/show_empresa',         [EmpresaController::class,   'show']);


//Empresa Cliente
Route::get('empresa/form_empresa_cliente',  [Empresa_ClienteController::class,   'create' ]);
Route::post('/empresa',                     [Empresa_ClienteController::class,   'store' ]);
Route::get('/empresa/show_clientes',        [Empresa_ClienteController::class,   'show']);
Route::get('/empresa/edit/{id}',            [Empresa_ClienteController::class,   'edit']);
Route::put('/empresa/update/{id}',          [Empresa_ClienteController::class,   'update']);
Route::delete('/empresa/{id}',              [Empresa_ClienteController::class,   'destroy']);



Route::delete('/empresa/{id}',              [Empresa_ClienteController::class,   'destroy']);



//Orçamentos
Route::get('orcamento/create_orcamento',    [OrcamentoController::class, 'create']);
Route::post('/orcamento',                   [OrcamentoController::class, 'store']);
Route::get('/orcamento/show_orcamento',     [OrcamentoController::class, 'show']);
Route::get('/orcamento/edit/{id}',          [OrcamentoController::class, 'edit']);
Route::put('/orcamento/update/{id}',        [OrcamentoController::class, 'update']);
Route::delete('/orcamento/{id}',            [OrcamentoController::class, 'destroy']);
Route::get('/orcamento/gerar_pdf/{id}',      [OrcamentoController::class, 'gerar_pdf']);



Route::get('/orcamento/pdf',                [PdfController::class,       'geraPdf']); //gerar o PDF de orçamentos


