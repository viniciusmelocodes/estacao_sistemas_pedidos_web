<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EDocumentoFiscalPagamento extends Model
{
    protected $table = "e_documentos_fiscais_pagamentos";

    protected $primaryKey = "dfpg_id";

    public $timestamps = false;

    protected $fillable = [
        'dcfs_id',
        'unem_id',
        'usrs_id',
        'frpg_id',
        'dfpg_quantidade_parcelas',
        'dfpg_primeira_parcela',
        'dfpg_intervalo_parcelas',
        'dfpg_valor',
        'dfpg_observacao',
        'dfpg_atualizacao',
        'dfpg_estacao'
    ];
}
