<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
     public function employee(){
        return $this->belongsTo(User::class,'employee_id','id');
    }
     public function leave_type(){
        return $this->belongsTo(LeaveType::class,'leave_type_id','id');
    }
}
