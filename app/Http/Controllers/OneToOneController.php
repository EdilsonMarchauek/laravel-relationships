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

    public function oneToOneInverse()
    {
        $latitude = 123;
        $longitude = 321;

        $location = Location::where('latitude', $latitude)
                                ->where('longitude', $longitude)
                                ->get()
                                ->first();

        //echo $location->id;
        
        $country = $location->country()
                            ->get()
                            ->first();

        echo $country->name;
    }    


    public function oneToOneInsert()
    {

        //Simulação dos dados de um form
        $dataForm = [
            'name' => 'Belgica',
            'latitude' => '43',
            'longitude' => '34',
        ];

        //$country = Country::create($dataForm);
        //Pega o pais pelo nome
        $country = Country::where('name', 'Belgica')->get()->first();


        //$country->id = pega o valor do id e cadastra no dataForm
        //$dataForm['country_id'] = $country->id;
        //$location = Location::create($dataForm);

        /* Ou
        $location = new Location;
        $location->latitude = $dataForm['latitude'];
        $location->longitude = $dataForm['longitude'];
        $location->country_id = $country->id;
        $saveLocation = $location->save();
        */

        //Pais pega o método location e insere os dados do dataform
        //Insere a localização
        $location = $country->location()->create($dataForm);
    }
}
