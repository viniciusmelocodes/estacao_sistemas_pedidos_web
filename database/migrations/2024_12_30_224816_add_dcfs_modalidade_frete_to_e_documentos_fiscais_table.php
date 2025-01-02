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
        Schema::table('e_documentos_fiscais', function (Blueprint $table) {
            $table->integer('dcfs_modalidade_frete')->after(column: 'dcfs_referencia')->default(9)->comment('0-Contratação do Frete por conta do Remetente (CIF); 1-Contratação do Frete por conta do Destinatário (FOB); 2-Contratação do Frete por conta de Terceiros; 3-Transporte Próprio por conta do Remetente; 4-Transporte Próprio por conta do Destinatário; 9-Sem Ocorrência de Transporte.');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('e_documentos_fiscais', function (Blueprint $table) {
            $table->dropColumn('dcfs_modalidade_frete');
        });
    }
};
