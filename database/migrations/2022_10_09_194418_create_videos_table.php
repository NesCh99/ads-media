<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Video;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->engine = 'InnoDB';//Mecanismo de almacenamiento Inno DB
            $table->id('idVideo');//Clave Primaria
            $table->unsignedbigInteger('idCampeonato'); //Clave Foranea
            $table->string('NombreVid');
   
            $table->text('DescripcionVid');
            $table->string('PortadaVid')->nullable();
            $table->date('FechaInicioVid');
            $table->time('HoraInicioVid')->nullable(); //Si puede ser nulo
            $table->float('PrecioVid');
            $table->smallInteger('EstadoVid')->default(1);
            $table->timestamp('CreacionVid')->nullable();
            $table->timestamp('ModificacionVid')->nullable();

            //Definicion de la clabe foranea que refiere a Campeonato
            $table->foreign('idCampeonato')->references('idCampeonato')->on('campeonatos')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
};
