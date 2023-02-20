<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    public const ADMIN = 1;
    public const CLIENT = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'type',
        'expiration_date',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function adminlte_desc(){
        return str_replace(array('"', '[', ']'),'',$this->getRoleNames());
    }

    public function adminlte_profile_url() {
        return url('/admin/administradores/'.$this->id.'/editProfile');
    }

    public function pagos(){
        return $this->hasMany(Pago::class,'idCliente');
    }


    //relacion muchos a muchos 

    public function videos(){
        return  $this->belongsToMany(Video::class, 'suscripciones' ,'idCliente'	,'idVideo')
        ->withPivot('TipoSus','CreacionSus');
     }

//relacion uno a uno 
     public function billing(){
        return $this->hasOne(Billing::class ,'idCliente');
   }

   public function isAdminUser()
   {
        if($this->type === User::ADMIN){
            return true;
        }else{
            return false;
        }
   }


   
}
