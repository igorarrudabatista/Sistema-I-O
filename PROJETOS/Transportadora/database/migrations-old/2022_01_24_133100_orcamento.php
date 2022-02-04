<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orcamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orcamento', function (Blueprint  $table) {
       
            $table->id();
            
            $table->string('Numero_Orcamento');
            $table->string('Data',30);
            $table->string('Validade',10);
            $table->string('Garantia',20);
            $table->string('Forma_Pagamento',200);
            $table->string('Descricao',450);
            $table->string('Quantidade',10);
            $table->string('Valor',10);
            $table->string('Desconto',10);
            $table->string('Taxas',10);  

            $table->foreignId('empresa_clientes_id')->constrained()->onDelete('cascade');
            $table->foreignId('empresa_id')->constrained()->onDelete('cascade');
            $table->foreignId('produto_id')->constrained()->onDelete('cascade');


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
