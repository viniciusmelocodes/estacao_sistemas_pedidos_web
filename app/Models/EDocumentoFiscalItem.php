<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EDocumentoFiscalItem extends Model
{
    protected $table = 'e_documentos_fiscais_itens';

    protected $primaryKey = 'dfit_id';

    public $timestamps = false;
    
    protected $fillable = [
        'dcfs_id',
        'unem_id',
        'usrs_id',
        'prod_id',
        'dfit_quantidade',
        'dfit_valor_unitario_base',
        'dfit_valor_unitario',
        'dfit_valor_total_bruto',
        'dfit_valor_desconto',
        'dfit_valor_frete',
        'dfit_valor_seguro',
        'dfit_valor_outras_despesas',
        'dfit_icms_st_aliquota',
        'dfit_icms_st_valor',
        'dfit_ipi_aliquota',
        'dfit_ipi_valor',
        'dfit_issqn_retido_aliquota',
        'dfit_issqn_retido',
        'dfit_valor_total_liquido',
        'dfit_movimenta_estoque',
        'dfit_situacao',
        'dfit_tipo_item',
        'dfit_tipo_preco',
        'dfit_producao',
        'dfit_valor_total_custo',
        'dfit_valor_markup',
        'dfit_percentual_desconto',
        'dfit_atualizacao',
        'dfit_estacao'
    ];
}
