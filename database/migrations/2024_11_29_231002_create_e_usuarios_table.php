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
        Schema::create('e_usuarios', function (Blueprint $table) {
            $table->bigIncrements('usrs_id');
            $table->unsignedBigInteger('unem_id');
            $table->foreign('unem_id')->references('unem_id')->on('e_unidades_empresariais');
            $table->string('usrs_login', 60);
            $table->string('usrs_nome', length: 60);
            $table->string('usrs_senha', length: 50);
            $table->string('usrs_situacao', length: 1)->default('A');
            $table->integer('usrs_nivel')->default(0);
            $table->decimal('usrs_desconto_mercadoria', 18, 4)->default(0);
            $table->decimal('usrs_desconto_servico', 18, 4)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e_usuarios');
    }
};
