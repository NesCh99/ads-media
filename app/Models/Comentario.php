<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Comentario extends Model
{
    use HasFactory;

    protected $table = 'comentarios';
    protected $primaryKey = 'idComentario';
    const CREATED_AT = 'CreacionComment';
    const UPDATED_AT = 'ModificacionComment';
    
    protected $fillable =   [
        'idVideo',
        'idCliente',
        'body',
        'CreacionComment',
        'ModificacionComment',

    ];

     /*relation one to many comments  */
     public function cliente(){
        return $this->belongsTo(User::class,'idCliente');

     }
}
