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
        Schema::create('MetaDato', function (Blueprint $table) {
            $table->id('idMetaDato');//PK
            $table->unsignedBigInteger('idVideo');//FK
            $table->string('WowzaStreamingIdMetaDato');
            $table->string('StreamServerMetaDato');
            $table->string('StreamKeyMetaDato');
            $table->string('StreamStatusMetaDato');
            $table->longText('StreamHlsMetaDato');
            $table->timestamp('StartedAtMetaDato')->nullable();
            //$table->char('EstadoMetaDato',15);
            $table->timestamp('CreacionMetaDato')->nullable();
            $table->timestamp('ModificacionMetaDato')->nullable();
            //Relacion a Videos
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
        Schema::dropIfExists('MetaDato');
    }
};
