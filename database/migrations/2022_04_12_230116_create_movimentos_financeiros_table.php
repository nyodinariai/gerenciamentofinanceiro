<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimentosFinanceirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentos_financeiros', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('descricao')->nullable();
            $table->integer('valor')->nullable();
            $table->string('tipo');
            $table->bigInteger('empresa_id')->unsigned();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('movimentos_financeiros');
    }
}
