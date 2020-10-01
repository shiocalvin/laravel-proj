<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    //
  
    protected $fillable =['name'];







    public function zone(){


        return $this->belongsTo('App\Zone');


    }

    public function centers(){

        return $this->hasMany('App\Nbts_centre');

    }
}
