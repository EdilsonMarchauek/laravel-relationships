<?php

namespace App\Models;

use App\Models\State;
use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    //Relacionamento One to One retorna apenas um item. (usar singular no método)
    public function location()
    {
        //Location está no mesmo diretorio nem precisa importar a classe
        //hasOne - retorna o relacionamento de One to One
        //'country_id' - informar nome da coluna que faz o relacionamento
        //'id' - informar o nome do id
        //return $this->hasOne(Location::class, 'country_id', 'id');
        return $this->hasOne(Location::class);
    }

    //Relacionamento de um para muitos hasMany
    public function states()
    {
        // return $this->hasMany(State::class, 'country_id', 'id');
        return $this->hasMany(State::class);
    }

    //Relacionamento de cidades
    public function cities()
    {
        return $this->hasManyThrough(City::class, State::class);
    }
}
