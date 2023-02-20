<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;
    protected $fillable =['body','company_id'];
    // relación uno a muchos Inversa -

    public  function company()
    {
        return $this->belongsTo(Company::class);
    }
}
