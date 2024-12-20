<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EDocumentoFiscal extends Model
{
    protected $table = 'e_documentos_fiscais';
    
    protected $primaryKey = 'dcfs_id';
    
    protected $fillable = [
        'unem_id',
        'usrs_id',
        'pess_id',
        'muni_id',
        'muni_entr_id',
        'dcfs_modelo',
        'dcfs_serie',
        'dcfs_numero',
        'dcfs_data_emissao',
        'dcfs_situacao',
        'dcfs_entr_cep',
        'dcfs_entr_logradouro',
        'dcfs_entr_numero',
        'dcfs_entr_complemento',
        'dcfs_entr_bairro',
        'dcfs_entr_telefone',
        'dcfs_entr_referencia',
        'dcfs_entr_contato',
        'dcfs_valor',
        'dcfs_valor_frete',
        'dcfs_valor_seguro',
        'dcfs_valor_desconto',
        'dcfs_valor_despesas',
        'dcfs_valor_issqn_retido',
        'dcfs_valor_ipi',
        'dcfs_valor_icms_st',
        'dcfs_valor_total',
        'dcfs_valor_total_produtos',
        'dcfs_valor_total_servico',
        'dcfs_valor_total_custos',
        'dcfs_referencia',
        'dcfs_observacao',
        'dcfs_processamento',
        'dcfs_processamento_data',
        'dcfs_atualizacao',
        'dcfs_estacao',
        'created_at',
        'updated_at'
    ];

    public function pessoa()
    {
        return $this->belongsTo(EPessoa::class, 'pess_id');
    }
}
