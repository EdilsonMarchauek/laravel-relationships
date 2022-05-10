<?php

namespace App\Models;

use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;

    //Relacionamento One to One retorna apenas um item. (usar singular no método)
    public function location()
    {
        //Location está no mesmo diretorio nem precisa importar a classe
        //hasOne - retorna o relacionamento de One to One
        return $this->hasOne(Location::class);
    }
}
