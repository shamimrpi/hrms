<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leave;
class LeaveApproveController extends Controller
{
    public function approve(){
    	$data = Leave::where('status','Pending')->latest()->get();
    	return view('leave_approve.approve',compact('data'));
    }
    public function accept($id){
    	$leave = Leave::where('id',$id)->first();
    	$leave->status = 'Approve';
    	$leave->save();
    	flash('Approve successfully')->success();
            return back();
    }
    public function cancel($id){
    	$leave = Leave::where('id',$id)->first();
    	$leave->status = 'Cancel';
    	$leave->save();
    	flash('cancel successfully')->success();
            return back();
    }
    public function leaveApproveAll(Request $r){
    
    	if($r->type == 4){
    		$ids=$r->id;
    		
    		foreach ($ids as  $id) {
    			$data = Leave::where('id',$id)->first();
    			$data->status ='Approve';
    			$data->save();
    		}
    	}
	
    }
    
}
