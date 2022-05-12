<?php

namespace App\Models;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['latitude', 'longitude'];

    public function country()
    {
        //'country_id' - informar caso tenha sido informado um nome diferente 
        //'id' - informar caso tenha sido informado um nome diferente 
        //return $this->belongsTo(Country::class, 'country_id', 'id');
        return $this->belongsTo(Country::class);
    }
}
