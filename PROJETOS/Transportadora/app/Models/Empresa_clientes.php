<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Orcamento;


class Empresa_clientes extends Model
{
    use HasFactory;
    
    protected $table = "empresa_cliente";

    protected $guarded = [];

    public function orcamento(){
      return $this->belongsTo(Orcamento::class);
      
  }

}
