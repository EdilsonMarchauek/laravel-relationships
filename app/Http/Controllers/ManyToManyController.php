<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Company;
use Illuminate\Http\Request;

class ManyToManyController extends Controller
{
    //Pelo nome da cidade trás as empresas vinculadas
    public function manyToMany()
    {
        $city = City::where('name', 'SÃO PAULO')->get()->first();

        echo "<b>{$city->name}:</b></br>";

        $companies = $city->companies;
        foreach($companies as $company){
            echo "{$company->name}, ";
        }
    }

    //Exibe as cidades que a empresa está localizada
    public function manyToManyInverse()
    {
        // //Tras todas as empresas
        // $companies = Company::get();
        // foreach ($companies as $company){
        //     echo "{$company->name}, ";
        // }

        $company = Company::where('name', 'EspecializaTi')->get()->first();

        echo "<b>{$company->name}:</b></br>";

        $cities = $company->cities;
        foreach($cities as $city){
            echo "{$city->name}, ";
        }
    }

    //Insere cidades vinculadas a empresa
    public function manyToManyInsert()
    {
        //Ids das cidades
        $dataForm = [1, 3, 5];

        $company = Company::find(1);
        echo "<b>{$company->name}:</b></br>";

        //Vinculando a empresa 1 as cidades 3,4,5
        //$company->cities()->attach($dataForm); //Incrementa sempre mais
        $company->cities()->sync($dataForm); //sincroniza removendo e cadastrando os ids
        //$company->cities()->detach([4]); //remove a cidade 4
        //$company->cities()->detach($dataForm); //apaga todos

        $cities = $company->cities;
        foreach($cities as $city){
            echo "{$city->name}, ";
        }
    }


}
