<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public function employee(){
        return $this->belongsTo(User::class,'employee_id','id');
    }
}
