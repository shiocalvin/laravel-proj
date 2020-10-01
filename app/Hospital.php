<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    //

    protected $table ='hospital_centres';
    protected $primaryKey='hospital_id';

    public $timestamps =false;

    protected $fillable =[


        'hospital_name',
        'region_id',
        'district_id',
        'ward_id',
        'centre_under_id',
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



}
