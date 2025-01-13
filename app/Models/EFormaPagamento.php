<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected function frpgNome(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => mb_strtoupper($value, 'UTF-8'),
        );
    }
}
