<?php

namespace App\Models;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class State extends Model
{
    use HasFactory;

    //Retorna o pais que o estado está vinculado
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
