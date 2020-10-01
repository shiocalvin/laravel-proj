<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //

    public function center(){

        return $this->belongsTo('App\Nbts_centre');

    }

    public function wards(){

        return $this->hasMany('App\Ward');

    }

}
