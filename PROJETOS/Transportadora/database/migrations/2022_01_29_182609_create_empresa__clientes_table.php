<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa__clientes', function (Blueprint $table) {
            $table->id();
            $table->string('Nome_Empresa');
            $table->string('Cnpj');
            $table->string('Email');
            $table->string('Telefone');
            $table->string('Site');
            $table->string('Endereco');
            $table->string('Cidade');
            $table->string('Estado');
            $table->string('image');


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
        Schema::dropIfExists('empresa__clientes');
    }
}
