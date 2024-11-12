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
        Schema::table('afiliados', function (Blueprint $table) {
            $table->decimal('porcentagem_ganho', 5, 2)->default(0)->comment('Porcentagem de ganho do afiliado');
            $table->decimal('desconto_usuario', 5, 2)->default(0)->comment('Desconto oferecido ao cliente pelo afiliado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('afiliados', function (Blueprint $table) {
            $table->dropColumn(['porcentagem_ganho', 'desconto_usuario']);
        });
    }
};
