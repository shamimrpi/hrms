<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    public function s_user(){
        return $this->belongsTo(User::class,'employee_id','id');
    }
     public function preDesignation(){
        return $this->belongsTo(Designation::class,'previous_designation_id','id');
    }
    public function presentDesignation(){
        return $this->belongsTo(Designation::class,'present_designation_id','id');
    }
}
