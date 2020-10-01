<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalCorrupted extends Model
{
    //

    protected $table = 'hospital_corrupted_samples';

    protected $primaryKey = 'blood_bag_id';


    public $timestamps =false;

    public $incrementing = false;











}
