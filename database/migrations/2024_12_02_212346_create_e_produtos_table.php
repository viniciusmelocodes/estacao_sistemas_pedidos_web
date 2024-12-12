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
        Schema::create('e_produtos', function (Blueprint $table) {
            $table->bigIncrements('prod_id');
            $table->unsignedBigInteger('unem_id');
            $table->foreign('unem_id')->references('unem_id')->on('e_unidades_empresariais');
            $table->string('prod_codigo', 60);
            $table->string('prod_nome', 120);
            $table->string('prod_marca', 40);
            $table->string('prod_cor', 25)->nullable();
            $table->string('prod_tamanho', 25)->nullable();
            $table->string('prod_material', 40)->nullable();
            $table->string('prod_gtin', 14)->nullable();
            $table->string('prod_referencia', 30)->nullable();
            $table->string('prod_ncms', 8);
            $table->string('prod_genero', 1)->default('T');
            $table->string('prod_producao', 1)->default('N');
            $table->decimal('prod_peso_bruto', 18, 4)->default(0);
            $table->decimal('prod_peso_liquido', 18, 4)->default(0);
            $table->integer('prod_prazo_entrega')->default(0);
            $table->decimal('prod_embalagem_altura', 18, 4)->default(0);
            $table->decimal('prod_embalagem_largura', 18, 4)->default(0);
            $table->decimal('prod_embalagem_profundidade', 18, 4)->default(0);
            $table->decimal('prod_saldo_estoque', 18, 4)->default(0);
            $table->decimal('prod_preco_custo', 18, 2)->default(0);
            $table->decimal('prod_markup', 18, 4)->default(0);
            $table->decimal('prod_preco_varejo', 18, 2)->default(0);
            $table->decimal('prod_preco_atacado', 18, 2)->default(0);
            $table->integer('prod_modalidade_frete')->default(9);
            $table->decimal('prod_aliquota_ipi', 18, 4)->default(0);
            $table->decimal('prod_aliquota_icms_st', 18, 4)->default(0);
            $table->decimal('prod_aliquota_iss_retido', 18, 4)->default(0);
            $table->string('prod_disponivel', 1)->default('S');
            $table->string('prod_tipo_item', 2)->default('00');
            $table->integer('prod_origem')->default(0);
            $table->string('prod_movimenta_estoque', 1)->default('S');
            $table->binary('prod_foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e_produtos');
    }
};
