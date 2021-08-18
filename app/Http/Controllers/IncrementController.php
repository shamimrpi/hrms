<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Increment;
use App\User;
use Illuminate\Support\Facades\Auth;


class IncrementController extends Controller
{
    
    public function index(){
    	$data['increments'] = Increment::select('employee_id')->groupBy('employee_id')->orderBy('employee_id','DESC')->get();
    	return view('increment.index',$data);
    }
    public function edit($employee_id){
    	 $data['user'] = Increment::with(['employee'])->where('employee_id',$employee_id)->first();

    	return view('increment.edit',$data);
    }
    public function update(Request $r,$employee_id){
    	$user = User::where('id',$employee_id)->first();
    	$increment = new Increment();
    	$increment->staff_id = $user->staff_id;
    	$increment->employee_id = $employee_id;
    	$increment->present_increment = $r->present_increment;
    	$increment->previous_increment = $r->previous_increment;
    	$increment->effective_date = date('d-m-Y',strtotime($r->effective_date));
    	$increment->updated_by = Auth::id();
    	$increment->created_by = Auth::id();
    	$increment->save();

    	$salary = $user->salary + $increment->present_increment;
    	$user->salary = $salary;
    	$user->save();
    	flash('Increment  successfully')->success();
            return redirect()->route('increment');
    }
}
