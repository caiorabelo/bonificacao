<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimentacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentacao', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_movimentacao');
            $table->integer('funcionario_id')->unsigned();
            $table->integer('administrador_id')->unsigned();
            $table->double('valor');
            $table->text('observacao');
            $table->datetime('data_criacao');

            $table->foreign('funcionario_id')->references('id')->on('funcionario');
            $table->foreign('administrador_id')->references('id')->on('administrador');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimentacao');
    }
}
