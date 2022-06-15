<?php

namespace App\Models;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class State extends Model
{

    protected $fillable = ['name', 'initials', 'country_id'];

    use HasFactory;

    //Retorna o pais que o estado está vinculado
    public function country()
    {
        //return $this->belongsTo(Country::class, 'country_id', 'id'); // nome da chave estrageira
        //return $this->belongsTo(Country::class, 'country_id', 'name'); // nome da chave estrageira
        return $this->belongsTo(Country::class);
    }

    //hasMany um stado contém muitas cidades
    public function cities()
    {
        return $this->hasMany(City::class);
    }

     //Relacionamento Polimórfico - retorna todos os comentários dos estados
     public function comments()
     {
         return $this->morphMany(Comment::class, 'commentable');
     }
}
