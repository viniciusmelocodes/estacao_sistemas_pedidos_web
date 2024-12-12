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
        Schema::create('e_estados', function (Blueprint $table) {
            $table->bigIncrements('esta_id');
            $table->unsignedBigInteger('pais_id');
            $table->foreign('pais_id')->references('pais_id')->on('e_paises');
            $table->string('esta_nome', 60);
            $table->string('esta_uf', 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e_estados');
    }
};
