<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint  $table) {
       
        $table->id();
        $table->string('Nome_Produto',30);

        $table->string('Categoria_Produto',30);
        $table->string('Status_Produto',10);
        $table->string('Preço_Produto',30);
        $table->string('Estoque_Produto',3);
        $table->string('Quantidade_Produto',7);
        $table->string('image',255);

        $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
