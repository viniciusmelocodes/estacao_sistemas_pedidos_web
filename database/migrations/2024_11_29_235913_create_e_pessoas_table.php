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
        Schema::create('e_pessoas', function (Blueprint $table) {
            $table->bigIncrements('pess_id');
            $table->unsignedBigInteger('unem_id');
            $table->foreign('unem_id')->references('unem_id')->on('e_unidades_empresariais');
            $table->unsignedBigInteger('usrs_id');
            $table->foreign('usrs_id')->references('usrs_id')->on('e_usuarios');
            $table->unsignedBigInteger('muni_id');
            $table->foreign('muni_id')->references('muni_id')->on('e_municipios');
            $table->string('pess_nome_razao_social', 60);
            $table->string('pess_apelido_fantasia', 60)->nullable();
            $table->string('pess_cnpj_cpf', 18);
            $table->string('pess_cep', 10);
            $table->string('pess_logradouro', 60)->default('S/N');
            $table->string('pess_logradouro_numero', 10);
            $table->string('pess_complemento', 60)->nullable();
            $table->string('pess_bairro', 60);
            $table->string('pess_logradouro_referencia', 60)->nullable();
            $table->string('pess_inscricao_estadual', 18)->nullable();
            $table->string('pess_inscricao_municipal', 18)->nullable();
            $table->string('pess_email', 250)->nullable();
            $table->string('pess_celular_numero', 15);
            $table->string('pess_telefone_numero', 15)->nullable();
            $table->string('pess_tipo_compra', 1)->default('V');
            $table->string('pess_situacao', 1)->default('A');
            $table->timestamp('pess_data_cadastro');
            $table->string('pess_retem_issqn')->default('N');
            $table->timestamp('pess_atualizacao')->default(now());
            $table->string('pess_estacao', 60);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e_pessoas');
    }
};
