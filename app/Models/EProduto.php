<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class EProduto extends Model
{
    protected $table = "e_produtos";

    protected $primaryKey = "prod_id";
    
    protected $fillable = [
        'unem_id',
        'prod_codigo',
        'prod_nome',
        'prod_marca',
        'prod_cor',
        'prod_tamanho',
        'prod_material',
        'prod_gtin',
        'prod_referencia',
        'prod_ncms',
        'prod_genero',
        'prod_producao',
        'prod_peso_bruto',
        'prod_peso_liquido',
        'prod_prazo_entrega',
        'prod_embalagem_altura',
        'prod_embalagem_largura',
        'prod_embalagem_profundidade',
        'prod_saldo_estoque',
        'prod_preco_custo',
        'prod_markup',
        'prod_preco_varejo',
        'prod_preco_atacado',
        'prod_modalidade_frete',
        'prod_aliquota_ipi',
        'prod_aliquota_icms_st',
        'prod_aliquota_iss_retido',
        'prod_disponivel',
        'prod_tipo_item',
        'prod_origem',
        'prod_movimenta_estoque',
        'prod_foto',
        'created_at',
        'updated_at',
    ];

    protected function prodNome(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => mb_strtoupper($value, 'UTF-8'),
        );
    }
}
