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
        Schema::create('e_municipios', function (Blueprint $table) {
            $table->bigIncrements('muni_id');
            $table->unsignedBigInteger('esta_id');
            $table->foreign('esta_id')->references('esta_id')->on('e_estados');
            $table->string('muni_nome', 60);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e_municipios');
    }
};
