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
        Schema::create('e_usuarios_acessos', function (Blueprint $table) {
            $table->bigIncrements('usac_id');
            $table->unsignedBigInteger('usrs_id');
            $table->foreign('usrs_id')->references('usrs_id')->on('e_usuarios');
            $table->unsignedBigInteger('unem_id');
            $table->foreign('unem_id')->references('unem_id')->on('e_unidades_empresariais');
            $table->enum('usac_nivel', ['0', '1', '2', '3', '4'])->default('4')->comment('0 - Administrador, 1 - Diretor, 2 - Gerente, 3 - Supervisor, 4 - Operador');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e_usuarios_acessos');
    }
};
