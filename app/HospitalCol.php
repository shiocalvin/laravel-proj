<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalCol extends Model
{
    //


    protected $table = 'hospital_collection';

    public $timestamps = false;
    public $incrementing = false;


    protected $fillable = ['hospital_id','blood_type','taken_date'];









}
