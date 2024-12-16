<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EUnidadeEmpresarial extends Model
{
    protected $table = 'e_unidades_empresariais';

    protected $primaryKey = 'unem_id';

    protected $fillable = [
        'muni_id',
        'unem_codigo',
        'unem_razao_social',
        'unem_nome_fantasia',
        'unem_sigla',
        'unem_cnpj',
        'unem_inscricao_estadual',
        'unem_inscricao_municipal',
        'unem_codigo_regime_tributario',
        'unem_ende_logradouro',
        'unem_ende_numero',
        'unem_ende_complemento',
        'unem_ende_bairro',
        'unem_ende_cep',
        'unem_fone_numero',
        'unem_fone_fax',
        'unem_fone_celular',
        'unem_email',
        'unem_site',
        'unem_data_fundacao',
        'unem_mensagem',
        'unem_situacao',
        'unem_logo',
        'created_at',
        'updated_at'
    ];
}
