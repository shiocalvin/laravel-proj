<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CenterBloodBag extends Model
{
    //

    protected $table = 'centres_blood_bags';
    protected $primaryKey = 'blood_bag_id';

    public $timestamps =false;

    public $incrementing = false;


    public function center(){

        return $this->belongsTo('App\Nbts_centre');
    }
}
