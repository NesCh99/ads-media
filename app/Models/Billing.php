<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{

    public $table = 'billings';
    protected $primaryKey = 'id';

    protected $fillable = [
        'idCliente',
        'name',
        'email',
        'direccion',

        'telefono'


    ];


    use HasFactory;

    /*relacion  uno a uno investa */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
