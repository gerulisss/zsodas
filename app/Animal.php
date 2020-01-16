<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{

    const SORT = 
    [

        'az' => 'A-Z',
        'za' => 'Z-A',
        'azt' => 'Virsuje naujausi',
        'zat' => 'Virsuje seniausi'

    ];

    // public function specie()
    // {
    //     return $this->belongsTo('App\Specie', 'specie_id', 'id');
    // }

    // public function manager()
    // {
    //     return $this->belongsTo('App\Manager', 'manager_id', 'id');
    // }


    public function specie()
    {
        return $this->belongsTo('App\Specie');
    }

    public function manager()
    {
        return $this->belongsTo('App\Manager');
    }

    public static function getSort() 
    {
        $collection = collect();
        foreach(self::SORT as $key => $val) {
            $collection->add((object)['value' => $key, 'text' => $val]);
        }
        return $collection;
    }
 
}
