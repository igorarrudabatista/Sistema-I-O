<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Orcamento;

class Empresa extends Model
{
    use HasFactory;

    protected $table = "empresa";

    protected $guarded = [];

    public function orcamento(){
        return $this->belongsTo(Orcamento::class);
    }
}
