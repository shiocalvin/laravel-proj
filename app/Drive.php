<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drive extends Model
{
    //
    protected $table ='blood_drives';

    protected $primaryKey ='blood_drive_id';

    protected $dates = ['start_date','end_date'];



    public $incrementing = false;

    protected $fillable =['centre_id','blood_drive_name','number_days','end_date','start_date','status'];

    public $timestamps = false;





}
