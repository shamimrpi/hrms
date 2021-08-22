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
    public function store(Request $request){
        $date = date('Y-m-d',strtotime($request->date));
  
        
        $attendances = Attendance::where('date',$date)->get();
       

          foreach ($attendances as $key => $attendance) {

            if($attendance->date == $date){
                flash('This date attendance already inserted')->error();
                    return redirect()->route('attendance.create');
                }
             }
             $count = count($request->employee_id);
                for ($i=0; $i < $count; $i++) { 
                    $status = 'status'.$i;
                    $attendance = new Attendance();
                    $attendance->date = date('Y-m-d',strtotime($request->date));
                    $attendance->employee_id = $request->employee_id[$i];
                    $user = User::where('id',$request->employee_id[$i])->first();
                    $attendance->staff_id = $user->staff_id;
                    $attendance->status = $request->$status;
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
    public function show($date){
        $attendances = Attendance::where('date',$date)->get();
        return view('attendance.show',compact('attendances'));
    }
    public function attendance(){
        $users = User::all();
        return view('attendance.attendance',compact('users'));
    }
    public function attendanceGetAll(Request $r){
       
       $date = date('Y-m',strtotime($r->date));
       if($date != ''){
            $where[] = ['date','like',$date.'%'];
        }
        $attendance = Attendance::with('employee')->where('employee_id',$r->employee_id)->where($where)->orderby('date','ASC')->get();

     
        return response()->json($attendance);
    }
}
