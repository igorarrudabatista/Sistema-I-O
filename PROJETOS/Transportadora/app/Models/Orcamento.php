<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empresa_clientes;

class Orcamento extends Model
{
    use HasFactory;

     
    protected $table = "orcamento";

    protected $guarded = [];

    public function empresa() {
      return $this->hasOne(Empresa::class);
    }


  public function empresa_cliente() {
    return $this->hasOne(Empresa_clientes::class);
    }      

public function produto() {
    return $this->hasMany(Produtos::class);
}   


public function orcamento_proximidade(){
    return $this->belongsTo(orcamento_proximidade::class)->withTimestamps();

    }
}
