<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalBloodRequest extends Model
{
    //

    protected $table ='hospital_blood_requests';

    protected $primaryKey = 'req_hospital';
    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'req_hospital',
        'receive_centre',
        'req_hospital_name',
        'req_stat'

    ];
}
