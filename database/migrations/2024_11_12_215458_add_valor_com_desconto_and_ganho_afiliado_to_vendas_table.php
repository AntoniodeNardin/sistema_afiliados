<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('vendas', function (Blueprint $table) {
            $table->decimal('valor_com_desconto', 10, 2)->nullable()->after('valor_total');
            $table->decimal('ganho_afiliado', 10, 2)->nullable()->after('valor_com_desconto');
        });
    }

    public function down()
    {
        Schema::table('vendas', function (Blueprint $table) {
            $table->dropColumn('valor_com_desconto');
            $table->dropColumn('ganho_afiliado');
        });
    }

};
