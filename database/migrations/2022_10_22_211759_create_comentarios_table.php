<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->engine = 'InnoDB'; //Mecanismo de almacenamiento Inno DB
            $table->id('idComentario'); //Clave Primaria
            $table->unsignedbigInteger('idVideo'); //Clave Foranea
            $table->unsignedbigInteger('idCliente'); //Clave Foranea
            $table->text('body');
            $table->timestamp('CreacionComment')->nullable();
            $table->timestamp('ModificacionComment')->nullable();

            //Definicion de la clabe foranea que refiere a Campeonato
            $table->foreign('idCliente')->references('id')->on('users')->onDelete("cascade");
            $table->foreign('idVideo')->references('idVideo')->on('videos')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
};
