<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CenterUntestedBlood extends Model
{
    //
    protected $table ='centres_untested_blood_bags';
    protected $primaryKey ='blood_bag_id';

    public $incrementing = false;

    public $timestamp =false;

    protected $fillable = [

        'donor_id',
        'centre_id',
        'non_donor'

    ];




}
