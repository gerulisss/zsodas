<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    public function managerSpecie()
    {
        return $this->belongsTo('App\Specie', 'specie_id', 'id');
    }

    // public function getFullNameAttribute() {
    //     return $this->name . ' ' . $this->surname;
    // }
}
