<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodTesting extends Model
{
    //
    protected $table = 'blood_testing';
    protected $primaryKey ='test_id';

    public $timestamps =false;

    protected $fillable = [

        'taken_at_id',
        'testing_centre_id',
        'testing_centre_lab_tech',
        'donor_id',
        'testing_date',
        'blood_type',
        'result',
        'comment',
        'hosp_centre',
        'blood_bag_id',
        'expires_in',
        'taken_at'

    ];


}
