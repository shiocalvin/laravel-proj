<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalUntestedBlood extends Model
{
    //

    protected $table ='hospital_untested_blood_bags';
    protected $primaryKey ='blood_bag_id';

    public $incrementing = false;

    public $timestamp =false;

    protected $fillable = [

        'donor_id',
        'hospital_id',
        'non_donor'

    ];

}
