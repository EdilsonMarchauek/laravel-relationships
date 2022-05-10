<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Location;

class OneToOneController extends Controller
{
    public function oneToOne()
    {
        //pegando o pais 1
        //$country = Country::find(1);
        //Pega o primeiro registro para esta consulta
        $country = Country::where('name', 'Brasil')->get()->first();

        echo $country->name;

        //Pega o método location do model (chamando como atributo)
        //$location = $country->location; (também funciona)
        //chamando como método, precisa usar o first() pq. retorna um array.
        $location = $country->location()->get()->first();

        //Imprime a Latitude e a Longitude
        echo "<hr>Latitude: {$location->latitude}<br>";
        echo "Longitude: {$location->longitude}<br>";


    }
}
