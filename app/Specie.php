<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    public function specieManager()
    {
        return $this->hasMany('App\Manager', 'specie_id', 'id');
    }

}
