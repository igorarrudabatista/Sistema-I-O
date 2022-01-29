<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrcamentoProximidadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orcamento_proximidade', function (Blueprint $table) {

            $table->foreignId('empresa_clientes_id')->constrained('empresa_cliente')->onDelete('cascade');
            $table->foreignId('minha_empresa_id')->constrained('empresa')->onDelete('cascade');
            $table->foreignId('produtos_id')->constrained('produtos')->onDelete('cascade');

            $table->foreignId('proximidade_id')->constrained('produtos')->onDelete('cascade');



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
        Schema::dropIfExists('orcamento_proximidade');
    }
}
