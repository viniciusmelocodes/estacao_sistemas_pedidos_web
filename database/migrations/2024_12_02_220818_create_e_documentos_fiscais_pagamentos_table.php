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
        Schema::create('e_documentos_fiscais_pagamentos', function (Blueprint $table) {
            $table->bigIncrements('dfpg_id');
            $table->unsignedBigInteger('dcfs_id');
            $table->foreign('dcfs_id')->references('dcfs_id')->on('e_documentos_fiscais');
            $table->unsignedBigInteger('unem_id');
            $table->foreign('unem_id')->references('unem_id')->on('e_unidades_empresariais');
            $table->unsignedBigInteger('usrs_id');
            $table->foreign('usrs_id')->references('id')->on('users');
            $table->unsignedBigInteger('frpg_id');
            $table->foreign('frpg_id')->references('frpg_id')->on('e_formas_pagamentos');
            $table->integer('dfpg_quantidade_parcelas')->default(1);
            $table->date('dfpg_primeira_parcela');
            $table->integer('dfpg_intervalo_parcelas')->default(30);
            $table->decimal('dfpg_valor', 18, 2)->default(0);
            $table->string('dfpg_observacao', 350)->nullable();
            $table->timestamp('dfpg_atualizacao');
            $table->string('dfpg_estacao', 60);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e_documentos_fiscais_pagamentos');
    }
};
