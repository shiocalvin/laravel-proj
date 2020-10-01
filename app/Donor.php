<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    //


    protected $primaryKey ='donor_id';
    public $timestamps =false;


    protected $fillable =[

        'donors_nida',
        'reg_centre_id',
        'first_name',
        'middle_name',
        'last_name',
        'sex',
        'dob',
        'region_id',
        'district_id',
        'ward_id',
        'no_of_donations',
        'last_donation',
        'status'

        


    ];

    public function center(){
        $this->belongsTo('App\Nbts_center');

    }
}
