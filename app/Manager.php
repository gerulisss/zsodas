<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    public function specie()
    {
        return $this->belongsTo('App\Specie');
    }

    // public function getFullNameAttribute() {
    //     return $this->name . ' ' . $this->surname;
    // }

    public function animal()
    {
        return $this->hasMany('App\Animal','manager_id', 'id');
    }
}
