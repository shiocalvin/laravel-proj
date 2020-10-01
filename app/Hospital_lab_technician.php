<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital_lab_technician extends Model
{
    //
    protected $primaryKey ='techs_id';

    public $timestamps = false;

    protected $fillable = [


        'hospital_id',
        'first_name',
        'middle_name',
        'last_name',
        'dob',
        'sex',
        'techs_nida',
        'employment_status'



    ];
}
