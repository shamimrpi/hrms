<?php

namespace App\Http\Controllers;
use App\Leave;
use Illuminate\Http\Request;
use App\LeaveType;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class LeaveController extends Controller
{
    public function index(){
    	$data = Leave::latest()->get();
    	return view('leave.index',compact('data'));
    }
    public function create(){
    	$data['users'] = User::where('usertype','employee')->get();
    	$data['leave_types'] = LeaveType::all();
    	return view('leave.create',$data);
    }
    public function store(Request $r){

   		$this->validate($r,[
   			'start_date' => 'required|unique:leaves,employee_id',
   			'end_date' => 'required|unique:leaves,employee_id',
   		]);

    	$user = User::where('id',$r->employee_id)->first();
    	$start_date = date('d',strtotime($r->start_date));
    	$end_date = date('d',strtotime($r->end_date));
    	$start_date = (int)$start_date;
    	$end_date = (int)$end_date;
    	$date_range = $end_date- $start_date;
    	
    	//
    	$start_date = Carbon::parse($r->start_date)
                             ->toDateTimeString();
        $end_date = Carbon::parse($r->end_date)
                             ->toDateTimeString();


    	if($start_date>$end_date OR $date_range < 0){
    		flash('Please right date select')->error();
            return back();
    	}
    	$start_date_leave = Leave::where('employee_id',$r->employee_id)->whereBetween('start_date',[$start_date,$end_date])->first();
    	$end_date_leave = Leave::where('employee_id',$r->employee_id)->whereBetween('end_date',[$start_date,$end_date])->first();
    	
    	if($start_date_leave == true){
    		flash('Already posted leave this date')->error();
            return back();
    	}
    	if($end_date_leave == true){
    		flash('Already posted leave this date')->error();
            return back();
    	}
    	$leave = new Leave();
    	$leave->employee_id = $r->employee_id;
    	$leave->staff_id = $user->staff_id;
    	$leave->leave_type_id = $r->leave_type_id;
    	$leave->start_date = $r->start_date;
    	$leave->end_date =$r->end_date;
    	$leave->reason = $r->reason;
    	$leave->days = $date_range +1;
    	$leave->status = false;
    	$leave->created_by = Auth::id();
    	$leave->updated_by = Auth::id();
    	$leave->save();

    	flash('Leave added successfully')->success();
           return redirect()->route('leave');
    }
}
