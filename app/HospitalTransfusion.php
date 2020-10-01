<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalTransfusion extends Model
{
    //
    protected $table = 'hospital_transfusions';
    protected $primaryKey = 'blood_bag_id';

    public $timestamps =false;
    public $incrementing = false;


    protected $fillable =[

        'blood_bag_id',
        'hospital_id',
        'blood_type',
        'test_id'


    ];









}
