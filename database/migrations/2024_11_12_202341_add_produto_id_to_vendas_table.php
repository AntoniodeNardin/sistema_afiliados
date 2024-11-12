<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProdutoIdToVendasTable extends Migration
{
    public function up()
    {
        Schema::table('vendas', function (Blueprint $table) {
            if (!Schema::hasColumn('vendas', 'produto_id')) {
                $table->foreignId('produto_id')->nullable()->constrained()->onDelete('cascade');
            }
        });
    }

    public function down()
    {
        Schema::table('vendas', function (Blueprint $table) {
            $table->dropForeign(['produto_id']);
            $table->dropColumn('produto_id');
        });
    }
}
