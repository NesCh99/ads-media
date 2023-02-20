<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public $table = 'videos';
    protected $primaryKey = 'idVideo';
    const CREATED_AT = 'CreacionVid'; // personaliza el campo created_at
    const UPDATED_AT = 'ModificacionVid'; // personaliza el campo updated_at
    public const PAID = 1;
    public const GIFT = 2;
    protected $fillable=['idCampeonato',
                        'NombreVid', 
                        'DescripcionVid', 
                        'PortadaVid',
                        'FechaInicioVid', 
                        'HoraInicioVid',
                        'PrecioVid',
                        'EstadoVid'];
    use HasFactory;

    //Relacion uno a muchos inversa Campeonatos

    public function Campeonato(){ //Realiza la relacion
        return $this->belongsTo(Campeonato::class, 'idCampeonato'); //Relacion n a 1 Campeonato
    }

    //Relacion muchos a muchos 
    public function DetallesPago(){ //Realiza la relacion
        return $this->belongsToMany(Pago::class, 'detallespagos', 'idVideo', 'idPago')->withPivot('PrecioPago','CreacionDetPag','ModificacionDetPag');
    }

    //Relacion muchos a muchos 
    public function Suscripciones(){ //Realiza la relacion
        return $this->belongsToMany(User::class, 'suscripciones', 'idVideo', 'idCliente')->withPivot('TipoSus', 'CreacionSus'); //Relacion n a n Cliente
    }

    //Relacion uno a uno
    public function MetaDato(){
        return $this->hasOne(MetaDato::class, 'idVideo');
    }

      /*relation one to many comments  */
      public function comentarios(){
        return $this->hasMany(Comentario::class,'idVideo')->orderBy('idComentario','desc');
    }

    public function getReadableDate() 
    {
        $fecha = Carbon::createFromFormat('Y-m-d', $this->FechaInicioVid);
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $mes = $meses[$fecha->month - 1];
        $fechaFormateada = $fecha->day . " de " . $mes . " de " . $fecha->year;

        return $fechaFormateada;
    }

    public function getReadableHour()
    {
        $hora = Carbon::createFromFormat('H:i:s', $this->HoraInicioVid);
        $horaFormateada = $hora->format('h:i A');

        return $horaFormateada;
    }

}
