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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('unem_id')->after('id');
            $table->foreign('unem_id')->references('unem_id')->on('e_unidades_empresariais');
            $table->string('situacao', 1)->after('remember_token')->default('A');
            $table->integer('nivel')->after('situacao');
            $table->decimal('desconto_mercadoria', 18, 4)->after('nivel')->default(0);
            $table->decimal('desconto_servico', 18, 4)->after('desconto_mercadoria')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['unem_id']);
            $table->dropColumn('unem_id');
            $table->dropColumn('situacao');
            $table->dropColumn('nivel');
            $table->dropColumn('desconto_mercadoria');
            $table->dropColumn('desconto_servico');
        });
    }
};
