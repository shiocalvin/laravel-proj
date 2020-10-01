<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CentersentHospital extends Model
{
    //
    protected $table = 'centre_blood_hospitals';
    protected $primaryKey ='blood_bag_id';

    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [

        'centre_id',
        'blood_type',
        'receipient_hospital_id',
        'expires_in',
        'taken_at',
        'test_id',
        'blood_bag_id',
        'transfer_stat'




    ];
}
