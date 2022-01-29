<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmpresaCliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_cliente', function (Blueprint  $table) {
       
            $table->id();
            $table->string('Nome_Empresa',30);

            $table->string('Cnpj',30);
            $table->string('Email',50);
            $table->string('Telefone',20);
            $table->string('Site',40);
            $table->string('Endereço',30);
            $table->string('Cidade',20);
            $table->string('Estado',2);
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
