<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\returnSelf;

class MetaDato extends Model
{

    public $table = 'metadato';
    protected $primaryKey = 'idMetaDato';
    const CREATED_AT = 'CreacionMetaDato'; // personaliza el campo created_at
    const UPDATED_AT = 'ModificacionMetaDato'; // personaliza el campo updated_at
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'idVideo',
        'WowzaStreamingIdMetaDato',
        'StreamServerMetaDato',
        'StreamKeyMetaDato',
        'StreamStatusMetaDato',
        'CreacionMetaDato',
        'ModificacionMetaDato',
        'StreamHlsMetaDato',
        'StartedAtMetaDato',
        //'EstadoMetaDato'
    ];

    //Relacion inversa uno a uno
    public function Video(){ //Realiza la relacion
        return $this->belongsTo(Video::class, 'idVideo');
    }

    public function getStateClass()
    {
        switch ($this->StreamStatusMetaDato) {
            case 'starting':
                return 'badge-info';
                break;
            case 'started':
                return 'badge-success';
                break;
            case 'stopping':
                return 'badge-warning';
                break;
            case 'stopped':
                if (!is_null($this->StartedAtMetaDato)) {
                    return 'badge-danger';
                } else {
                    return 'badge-secondary';
                }
                break;
        }
    }
    public function getStateName()
    {
        switch ($this->StreamStatusMetaDato) {
            case 'starting':
                return 'Levantando Transmisión';
                break;
            case 'started':
                return 'En Vivo';
                break;
            case 'stopping':
                return 'Deteniendo Transmisión';
                break;
            case 'stopped':
                if (!is_null($this->StartedAtMetaDato)) {
                    return 'Finalizado';
                } else {
                    return 'Por Comenzar';
                }
                break;
        }
    }
}
