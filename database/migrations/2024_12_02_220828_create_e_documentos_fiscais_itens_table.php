<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('e_documentos_fiscais_itens', function (Blueprint $table) {
            $table->bigIncrements('dfit_id');
            $table->unsignedBigInteger('dcfs_id');
            $table->foreign('dcfs_id')->references('dcfs_id')->on('e_documentos_fiscais');
            $table->unsignedBigInteger('unem_id');
            $table->foreign('unem_id')->references('unem_id')->on('e_unidades_empresariais');
            $table->unsignedBigInteger('usrs_id');
            $table->foreign('usrs_id')->references('usrs_id')->on('e_usuarios');
            $table->unsignedBigInteger('prod_id');
            $table->foreign('prod_id')->references('prod_id')->on('e_produtos');
            $table->decimal('dfit_quantidade', 18, 4)->default(1);
            $table->decimal('dfit_valor_unitario_base', 18, 6)->default(0);
            $table->decimal('dfit_valor_unitario', 18, 6)->default(0);
            $table->decimal('dfit_valor_total_bruto', 18, 2)->default(0);
            $table->decimal('dfit_valor_desconto', 18, 2)->default(0);
            $table->decimal('dfit_valor_frete', 18, 2)->default(0);
            $table->decimal('dfit_valor_seguro', 18, 2)->default(0);
            $table->decimal('dfit_valor_outras_despesas', 18, 2)->default(0);
            $table->decimal('dfit_icms_st_aliquota', 18, 4)->default(0);
            $table->decimal('dfit_icms_st_valor', 18, 2)->default(0);
            $table->decimal('dfit_ipi_aliquota', 18, 4)->default(0);
            $table->decimal('dfit_ipi_valor', 18, 2)->default(0);
            $table->decimal('dfit_issqn_retido_aliquota', 18, 4)->default(0);
            $table->decimal('dfit_issqn_retido', 18, 2)->default(0);
            $table->decimal('dfit_valor_total_liquido', 18, 2)->default(0);
            $table->string('dfit_movimenta_estoque', 1)->default('N');
            $table->string('dfit_situacao', 2)->default('00');
            $table->string('dfit_tipo_item', 2)->default('00');
            $table->string('dfit_tipo_preco', 1)->default('V');
            $table->string('dfit_producao', 1)->default('N');
            $table->decimal('dfit_valor_total_custo', 18, 6)->default(0);
            $table->decimal('dfit_valor_markup', 18, 6)->default(0);
            $table->decimal('dfit_percentual_desconto', 18, 6)->default(0);
            $table->timestamp('dfit_atualizacao');
            $table->string('dfit_estacao', 60);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e_documentos_fiscais_itens');
    }
};
