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
        Schema::create('e_unidades_empresariais', function (Blueprint $table) {
            $table->bigIncrements('unem_id');
            $table->unsignedBigInteger('muni_id');
            $table->foreign('muni_id')->references('muni_id')->on('e_municipios');
            $table->string('unem_codigo', 20)->nullable();
            $table->string('unem_razao_social', 60);
            $table->string('unem_nome_fantasia', 60)->nullable();
            $table->string('unem_sigla', 10);
            $table->string('unem_cnpj', 18);
            $table->string('unem_inscricao_estadual', 18)->nullable();
            $table->string('unem_inscricao_municipal', 14)->nullable();
            $table->integer('unem_codigo_regime_tributario')->default(3);
            $table->string('unem_ende_logradouro', 60);
            $table->string('unem_ende_numero', 6)->default('S/N');
            $table->string('unem_ende_complemento', 60)->nullable();
            $table->string('unem_ende_bairro', 60);
            $table->string('unem_ende_cep', 8);
            $table->string('unem_fone_numero', 11);
            $table->string('unem_fone_fax', 11)->nullable();
            $table->string('unem_fone_celular', 11)->nullable();
            $table->string('unem_email', 60)->nullable();
            $table->string('unem_site', 200)->nullable();
            $table->date('unem_data_fundacao')->nullable();
            $table->string('unem_mensagem', 180)->nullable();
            $table->string('unem_situacao', 30)->default('Ativa');
            $table->longText('unem_logo')->charset('binary')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e_unidades_empresariais');
    }
};
