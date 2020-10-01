<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nbts_employee extends Model
{
    //

    public $timestamps=false;
    protected $primaryKey='employee_id';
    
    protected $fillable = [
        
        'employees_nida',
        'first_name',
        'middle_name',
        'last_name',
        'sex',
        'dob',
        'employment_status',
        'position',
        'stationed_at'
    
    
    
    
    ];

    public function zone(){


        $this->belongsTo('App\Zone');

    }
}
