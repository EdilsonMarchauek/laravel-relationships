<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Comment;

class PolymorphicController extends Controller
{
    public function polymorphic()
    {
        /*
        // Comentários da Cidade
        $city = City::where('name', 'GUARULHOS')->get()->first();
        echo "<b>{$city->name}:</b><br>";

        $comments = $city->comments()->get();

        foreach ( $comments as $comment){
            echo "{$comment->description}<hr>";
        }
        */


        // Comentários do estado
        $state = State::where('name', 'Tocantis')->get()->first();
        echo "<b>{$state->name}:</b><br>";

        $comments = $state->comments()->get();

        foreach ( $comments as $comment){
            echo "{$comment->description}<hr>";
        }

        /*
        // Comentários do país
        $country = Country::where('name', 'Brasil')->get()->first();
        echo "<b>{$country->name}:</b><br>";

        $comments = $country->comments()->get();

        foreach ( $comments as $comment){
            echo "{$comment->description}<hr>";
        }
        */


    }

    public function polymorphicInsert()
    {
       //Comentário da cidade 
       /*$city = City::where('name', 'GUARULHOS')->get()->first();
       echo $city->name;

       //Inserindo 01 comentário para a cidade.
       //Ao usar o create() adicionar o $fillable = ['description']; 
       $comment = $city->comments()->create([
            'description' => "New Comment {$city->name} " .  date('YmdHis'),
       ]);

       var_dump($comment->description);
       */

       //Comentário de um estado
       /*
       $state = State::where('name', 'Tocantis')->get()->first();
       echo $state->name;

       //Inserindo 01 comentário para a cidade.
       //Ao usar o create() adicionar o $fillable = ['description']; 
       $comment = $state->comments()->create([
            'description' => "New Comment {$state->name} " .  date('YmdHis'),
       ]);
       */

       //Comentário de um país
       $country = Country::where('name', 'Brasil')->get()->first();
       echo $country->name;

       //Inserindo 01 comentário para a cidade.
       //Ao usar o create() adicionar o $fillable = ['description']; 
       $comment = $country->comments()->create([
            'description' => "New Comment {$country->name} " .  date('YmdHis'),
       ]);

       var_dump($comment->description);
    }
}
