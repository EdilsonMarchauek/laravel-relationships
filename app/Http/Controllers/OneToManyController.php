<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;

class OneToManyController extends Controller
{
    //Um pais tem vários estados (um para muitos)
    public function oneToMany()
    {

        //$country = Country::where('name', 'Brasil')->get()->first();
        //echo $country->name;

        $keySearch = 'a';
        //with = já tras os relacionamentos melhorando o desempenho da aplicação
        //'states' = método do model Country
        $countries = Country::where('name', 'LIKE', "%{$keySearch}%")->with('states')->get();
    
        foreach($countries as $country){
            echo "<b>$country->name</b>";
            $states = $country->states; //with já trás o relacionamentos

            foreach ($states as $state){
                echo "<br>{$state->initials} - {$state->name}";
            }

            echo '<hr>';
        }

        //$states = $country->states; //pega pela propriedade
        //$states = $country->states()->where('initials', 'GO')->get(); //pelo metodo podendo colocar condicoes

        //$states = $country->states()->get(); //Ao pegar pelo método precisa usar o get()

        /* foreach ($states as $state){
            echo "<hr>{$state->initials} - {$state->name}";
        } */
    }


    public function manyToOne()
    {
        $stateName = 'São Paulo';
        $state = State::where('name', $stateName)->get()->first();
        echo "<b>{$state->name}</b>";

        //$country = $state->country; //pegando pela propriedade
        $country = $state->country()->get()->first(); //pegando pelo método como trás só um usar o first()
        echo "<br>País: {$country->name}";

    }

    public function oneToManyTwo()
    {
     
        $keySearch = 'a';
        $countries = Country::where('name', 'LIKE', "%{$keySearch}%")->get();
    
        foreach($countries as $country){
            echo "<b>$country->name</b>";
            $states = $country->states()->get(); //Ao pegar pelo método precisa usar o get()

            foreach ($states as $state){
                echo "<br>{$state->initials} - {$state->name}:";

                foreach($state->cities as $city){
                    echo " {$city->name}, ";

                }
            }

            echo '<hr>';
        }
    }

    public function oneToManyInsert()
    {
        $dataForm = [
            'name' => 'Bahia',
            'initials' => 'BA',
        ];

        //Pega o id número 1
        $country = Country::find(1);

        //Precisa informar o $fillable nos estados => protected $fillable = ['name', 'initials'];
        $insertState = $country->states()->create($dataForm);

        var_dump($insertState);
    }

    public function oneToManyInsertTwo()
    {
        $dataForm = [
            'name' => 'Paraná',
            'initials' => 'PR',
            'country_id' => '1',
        ];

        //Precisa informar o $fillable nos estados => protected $fillable = ['name', 'initials', 'country_id'];
        $insertState = state::create($dataForm);

        var_dump($insertState);
    }


    public function hasManyThrough()
    {
        $country = Country::find(1);
        echo "<b>{$country->name}</b> <br>";

        //cities - método criado na model country
        $cities = $country->cities;

        foreach($cities as $city){
            echo "{$city->name}, ";
        }

        echo "<br>Total Cidades: {$cities->count()}"; 


    }


}
