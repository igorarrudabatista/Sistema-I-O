<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Empresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa', function (Blueprint  $table) {
       
            $table->id();
            $table->string('Nome_Empresa',30)->unique;
            $table->string('Cnpj',30)->unique;
            $table->string('Email',10)->unique;
            $table->string('Telefone',30)->unique;
            $table->string('Site',3)->unique;
            $table->string('image',255)->unique;
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
