<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EFormaPagamento extends Model
{
    protected $table = "e_formas_pagamentos";

    protected $primaryKey = "frpg_id";
    
    protected $fillable = [
        'unem_id',
        'frpg_nome',
        'frpg_parcelas',
        'frpg_intervalo',
        'created_at',
        'updated_at',
    ];
}
