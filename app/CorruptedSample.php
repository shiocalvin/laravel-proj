<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CorruptedSample extends Model
{
    //
    protected $table = 'centre_corrupted_samples';

    protected $primaryKey = 'blood_bag_id';


    public $timestamps =false;

    public $incrementing = false;



}
