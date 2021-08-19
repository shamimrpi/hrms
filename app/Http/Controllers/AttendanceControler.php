<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Attendance;
class AttendanceControler extends Controller
{
	public function index(){
		$attendances = Attendance::select('date')->groupBy('date')->orderBy('date','DESC')->get();

		return view('attendance.index',compact('attendances'));
	}
    public function create(){

    	$data['users'] = User::all();
    	return view('attendance.create',$data);
    }
    public function store(Request $r){
    	$attendances = Attendance::where('date',$r->date)->get();
    	  foreach ($attendances as $key => $attendance) {
            
            if($attendance->date == $r->date){
                flash('This date attendance already inserted')->error();
                    return redirect()->route('attendance.create');
                }
             }
             $count = count($r->employee_id);
                for ($i=0; $i < $count; $i++) { 
                    $status = 'status'.$i;
                    $attendance = new Attendance();
                    $attendance->date = date('Y-m-d',strtotime($r->date));
                    $attendance->employee_id = $r->employee_id[$i];
                    $user = User::where('id',$r->employee_id[$i])->first();
                    $attendance->staff_id = $user->staff_id;
                    $attendance->status = $r->$status;
                    $attendance->save();
                     
                }
                flash('Attendance inserted successfully')->success();
                    return redirect()->route('attendance');
    }

    public function edit($date){

    	 $data['attendances'] = Attendance::where('date',$date)->get();
    	
         $data['users'] = User::all();

         return view('attendance.edit',$data);
    }
    public function update(Request $r, $date){
    	$attendances = Attendance::where('date',$date)->delete();
        

          $count = count($r->employee_id);
                for ($i=0; $i < $count; $i++) { 
                    $status = 'status'.$i;
                    $attendance = new Attendance();
                    $attendance->date = date('Y-m-d',strtotime($r->date));
                    $attendance->employee_id = $r->employee_id[$i];
                    $user = User::where('id',$r->employee_id[$i])->first();
                    $attendance->staff_id = $user->staff_id;
                    $attendance->status = $r->$status;
                    $attendance->save();
                     
                }
                flash('Attendance update successfully')->success();
                    return redirect()->route('attendance');
    }
}
