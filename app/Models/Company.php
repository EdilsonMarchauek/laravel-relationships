<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function cities()
    {
        //Colocar examente o nome da tabela que faz o relacionamento
        return $this->belongsToMany(City::class, 'company_city');
    }

}
