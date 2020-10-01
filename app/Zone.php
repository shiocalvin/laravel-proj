<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    //
    

    protected $fillable =['name','user_id'];




    public function centers(){

        
        return $this->hasMany('App\Nbts_centre');

    }


    public function user(){

        return $this->belongsTo('App\User');

    }

    public function regions(){

        return $this->hasMany('App\Region');

    }

    public function employees(){

        return $this->hasMany('App\Nbts_employee');
    }
}
