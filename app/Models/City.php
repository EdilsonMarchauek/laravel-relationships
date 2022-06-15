<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    //Retorna todas as empresas de uma determinada cidade
    public function companies()
    {
        //Colocar examente o nome da tabela que faz o relacionamento
        return $this->belongsToMany(Company::class, 'company_city');
    }

    //Relacionamento Polimórfico - retorna todos os comentários da cidade
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

}
