<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    public function specie()
    {
        return $this->belongsTo('App\Specie', 'specie_id', 'id');
    }

    public function manager()
    {
        return $this->belongsTo('App\Manager', 'manager_id', 'id');
    }


    // public function specie()
    // {
    //     return $this->belongsTo('App\Specie');
    // }

    // public function manager()
    // {
    //     return $this->belongsTo('App\Manager');
    // }
 
}
