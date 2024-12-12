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
        Schema::create('e_documentos_fiscais', function (Blueprint $table) {
            $table->bigIncrements('dcfs_id');
            $table->unsignedBigInteger('unem_id');
            $table->foreign('unem_id')->references('unem_id')->on('e_unidades_empresariais');
            $table->unsignedBigInteger('usrs_id');
            $table->foreign('usrs_id')->references('usrs_id')->on('e_usuarios');
            $table->unsignedBigInteger('pess_id');
            $table->foreign('pess_id')->references('pess_id')->on('e_pessoas');
            $table->unsignedBigInteger('muni_id');
            $table->foreign('muni_id')->references('muni_id')->on('e_municipios');
            $table->unsignedBigInteger('muni_entr_id')->nullable();
            $table->foreign('muni_entr_id')->references('muni_id')->on('e_municipios');
            $table->string('dcfs_modelo', 2)->default('00');
            $table->integer('dcfs_serie')->default(0);
            $table->integer('dcfs_numero');
            $table->timestamp('dcfs_data_emissao');
            $table->string('dcfs_situacao', 2)->default('00');
            $table->string('dcfs_entr_cep', 8);
            $table->string('dcfs_entr_logradouro', 60)->nullable();
            $table->string('dcfs_entr_numero', 10)->default('0');
            $table->string('dcfs_entr_complemento', 60)->nullable();
            $table->string('dcfs_entr_bairro', 60)->nullable();
            $table->string('dcfs_entr_telefone', 14)->nullable();
            $table->string('dcfs_entr_referencia', 60)->nullable();
            $table->string('dcfs_entr_contato', 60)->nullable();
            $table->decimal('dcfs_valor', 18, 2)->default(0);
            $table->decimal('dcfs_valor_frete', 18, 2)->default(0);
            $table->decimal('dcfs_valor_seguro', 18, 2)->default(0);
            $table->decimal('dcfs_valor_desconto', 18, 2)->default(0);
            $table->decimal('dcfs_valor_despesas', 18, 2)->default(0);
            $table->decimal('dcfs_valor_issqn_retido', 18, 2)->default(0);
            $table->decimal('dcfs_valor_ipi', 18, 2)->default(0);
            $table->decimal('dcfs_valor_icms_st', 18, 2)->default(0);
            $table->decimal('dcfs_valor_total', 18, 2)->default(0);
            $table->decimal('dcfs_valor_total_produtos', 18, 2)->default(0);
            $table->decimal('dcfs_valor_total_servico', 18, 2)->default(0);
            $table->decimal('dcfs_valor_total_custos', 18, 2)->default(0);
            $table->string('dcfs_referencia', 250)->nullable();
            $table->text('dcfs_observacao')->nullable();
            $table->string('dcfs_processamento', 2)->default('99');
            $table->timestamp('dcfs_processamento_data')->default(now());
            $table->timestamp('dcfs_atualizacao')->default(now());
            $table->string('dcfs_estacao', 60)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e_documentos_fiscais');
    }
};
