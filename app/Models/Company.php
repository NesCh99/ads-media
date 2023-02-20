<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $fillable =['name', 'slogan','information','image'];

    public function services(){
       return  $this->hasMany(Service::class);
    }

    public function terms(){
      return  $this->hasMany(Term::class);
    }

}
