<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Promotion;
use App\Designation;
use Illuminate\Support\Facades\Auth;
class CommonController extends Controller
{
    //

    public function userStatus($id){
    	$user = User::where('id',$id)->first();
    	if($user->status == true){
    		$user->status = false;
    		$user->save();
    	}
    	else{
    		$user->status = true;
    		$user->save();
    	}
    	flash('User Status Updated')->success();
           return redirect()->route('users.index');
    }
    public function promotion(){
        $data['users'] = Promotion::select('employee_id')->groupBy('employee_id')->orderBy('employee_id','DESC')->get();
        return view('promotion.index',$data);
    }
     public function promotionEdit($employee_id){
        $data['user'] = Promotion::with(['s_user'])->where('employee_id',$employee_id)->first();
        $data['designations'] = Designation::all();
        return view('promotion.edit',$data);
    }
     public function promotionUpdate(Request $r,$employee_id){
        $user = User::where('id',$employee_id)->first();
        $promotion = new Promotion();
        
        $promotion->employee_id = $employee_id;
        $promotion->staff_id = $user->staff_id;
        $promotion->previous_designation_id = $r->previous_designation_id;
        $promotion->present_designation_id  = $r->present_designation_id;
        $promotion->effective_date = $r->effective_date;
        $promotion->last_promotion_date = $r->effective_date;
        $promotion->created_by = Auth::id();
        $promotion->updated_by = Auth::id();
        $promotion->save();

        $user->designation_id = $promotion->present_designation_id;
        $user->save();
        flash('Promotion Successfully Added')->success();
           return redirect()->route('promotion');
    }
}
