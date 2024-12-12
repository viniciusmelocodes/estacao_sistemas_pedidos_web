<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EPessoa extends Model
{
    protected $table = "e_pessoas";
    protected $primaryKey = "pess_id";
    protected $fillable = [
        'unem_id',
        'usrs_id',
        'muni_id',
        'pess_nome_razao_social',
        'pess_apelido_fantasia',
        'pess_cnpj_cpf',
        'pess_cep',
        'pess_logradouro',
        'pess_logradouro_numero',
        'pess_complemento',
        'pess_bairro',
        'pess_logradouro_referencia',
        'pess_inscricao_estadual',
        'pess_inscricao_municipal',
        'pess_email',
        'pess_celular_numero',
        'pess_telefone_numero',
        'pess_tipo_compra',
        'pess_situacao',
        'pess_data_cadastro',
        'pess_retem_issqn',
        'pess_atualizacao',
        'pess_estacao',
        'created_at',
        'updated_at',
    ];
}
