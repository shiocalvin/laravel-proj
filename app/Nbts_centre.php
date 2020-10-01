<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nbts_centre extends Model
{
    //

    

    protected $primaryKey ='centre_id';

    public $timestamps=false;


    protected $fillable =[

        
        'zone_id',
        'name',
        'region_id',
        'district_id',
        'ward_id',
        'is_active'



    ];

    public function region(){

        return $this->belongsTo('App\Region');

    }

    public function district(){

        return $this->belongsTo('App\District');

    }

    public function ward(){

        return $this->belongsTo('App\Ward');
    }

    public function zone(){


        return $this->belongsTo('App\Zone');

    }

    
}
