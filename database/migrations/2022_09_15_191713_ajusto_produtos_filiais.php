<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjustoProdutosFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('filiais', function (Blueprint $table) {
            $table->id();
            $table->string('filial', 30);
            $table->timestamps();
        });

        Schema::create('produto_filiais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->float('peso')->nullable();
            $table->float('preco_venda',8,2)->default(0.00);
            $table->integer('estoque_minimo')->default(0);
            $table->integer('estoque_maximo')->default(0);
            $table->timestamps();

            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });
        
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn(['peso','preco_venda','estoque_minimo','estoque_maximo']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('produtos', function (Blueprint $table) {
            $table->float('peso')->nullable();
            $table->float('preco_venda',8,2)->default(0.00);
            $table->integer('estoque_minimo')->default(0);
            $table->integer('estoque_maximo')->default(0);
        });
     
        Schema::dropIfExists('produto_filiais');
        Schema::dropIfExists('filiais');
    }
}
