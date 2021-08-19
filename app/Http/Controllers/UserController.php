<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Religion;
use App\Gender;
use App\Designation;
use App\Promotion;
use App\Increment;
use App\LeaveBalance;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data['users'] = User::latest()->get();
        return view('users.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data['genders'] = Gender::all();
        $data['designations'] = Designation::all();
        $data['religions'] = Religion::all();
        return view('users.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'name'=> 'required|max:50|min:3',
            'mobile' => 'required|min:11|max:13|unique:users',
            'f_name'=> 'required|max:50|min:3',
            'm_name'=> 'required|max:50|min:3',
        ]);
       

            $user = User::where('usertype','employee')->orderBy('id','DESC')->first();
            $year = date('Y',strtotime($request->join_date));
                if($user == NULL){
                   
                    $staff_id = 1;
                }
                else{
                    $staff_id = $user->id;
                    $staff_id = $staff_id+1;
                }
                
                    if($staff_id <0)
                    {
                        $staff_id = $year.'000'.$staff_id;
                    }
                    elseif($staff_id <10){
                         $staff_id = $year.'00'.$staff_id;
                    }
                    else{
                        $staff_id = $year.'0'.$staff_id;
                    }
            $user = new User();
            $user->staff_id = $staff_id;
            $user->name = $request->name;
            $user->f_name = $request->f_name;
            $user->m_name = $request->m_name;
            $user->mobile = $request->mobile;
            $user->salary = $request->salary;
            $user->education = $request->education;
            $user->status = true;
            $user->usertype = 'employee';
            $user->address = $request->address;
            $user->gender_id = $request->gender_id;
            $user->religion_id = $request->religion_id;
            $user->designation_id = $request->designation_id;
            $user->dob = date("d-m-Y",strtotime($request->dob));
            $user->join_date = date("d-m-Y",strtotime($request->join_date));
            if($request->file('image')){
                $file = $request->file('image');
                $fileName = rand(0000,9999).$file->getClientOriginalName();
                $file->move(('public/employeeImage'),$fileName);
                $user['image'] = $fileName;
            }
            $rand = rand(00000000,99999999);
            $user->code = $rand;
            $password = Hash::make($rand);
            $user->password = $password;
            $user->created_by = Auth::id();
            $user->updated_by = Auth::id();
            $user->save();

            // Promotion table insert
            $promotion = new Promotion();
            $promotion->employee_id = $user->id;
            $promotion->staff_id = $user->staff_id;
            $promotion->previous_designation_id = $user->designation_id;
            $promotion->present_designation_id = $user->designation_id;
            $promotion->effective_date = $user->join_date;
            $promotion->last_promotion_date = $user->join_date;
            $promotion->created_by = Auth::id();
            $promotion->updated_by = Auth::id();
            $promotion->save();

            // increment table insert
            $increment = new Increment();
            $increment->staff_id = $user->staff_id;
            $increment->employee_id = $user->id;
            $increment->present_increment = 0;
            $increment->previous_increment = 0;
            $increment->effective_date = '';
            $increment->updated_by = Auth::id();
            $increment->created_by = Auth::id();
            $increment->save();

          // leave balance table

            $join_date_balance = date('m',strtotime($request->join_date));
            $join_date_balance = (int)$join_date_balance;
          
            if($join_date_balance == 1){
                $balance = 10;
            }
            elseif($join_date_balance == 2){
                $balance = 9;
            }
             elseif($join_date_balance == 3){
                $balance = 8;
            }
             elseif($join_date_balance == 4){
                $balance = 7;
            }
             elseif($join_date_balance ==5){
                $balance = 6;
            }
             elseif($join_date_balance == 6){
                $balance = 6;
            }
             elseif($join_date_balance == 7){
                $balance = 5;
            }
             elseif($join_date_balance == 8){
                $balance = 4;
            }
             elseif($join_date_balance == 9){
                $balance = 3;
            }
             elseif($join_date_balance == 10){
                $balance = 2;
            }
             elseif($join_date_balance == 11){
                $balance = 1;
            }
             else{
                $balance = 0;
            }

            $leave_balance = new LeaveBalance();
            $leave_balance->employee_id = $user->id;
            $leave_balance->staff_id = $user->staff_id;
            $leave_balance->leave_type_id = 1;
            $leave_balance->balance = $balance;
            $leave_balance->save();

            $leave_balance = new LeaveBalance();
            $leave_balance->employee_id = $user->id;
            $leave_balance->staff_id = $user->staff_id;
            $leave_balance->leave_type_id = 2;
            $leave_balance->balance = $balance;
            $leave_balance->save();
            
            $leave_balance = new LeaveBalance();
            $leave_balance->employee_id = $user->id;
            $leave_balance->staff_id = $user->staff_id;
            $leave_balance->leave_type_id = 3;
            $leave_balance->balance = $balance;
            $leave_balance->save();

            flash('User created successfully')->success();
            return redirect()->route('users.index');


        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $created_id = $user->created_by;
        $created_by = User::where('id',$created_id)->first();
   
        $updated_id = $user->updated_by;

        $updated_by = User::where('id',$updated_id)->first();
      

        return view('users.profile',compact(['user','created_by','updated_by']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['genders'] = Gender::all();
        $data['designations'] = Designation::all();
        $data['religions'] = Religion::all();
        $data['user'] = User::findOrFail($id);
        return view('users.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->f_name = $request->f_name;
            $user->m_name = $request->m_name;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->education = $request->education;
            $user->gender_id = $request->gender_id;
            $user->religion_id = $request->religion_id;
            $user->designation_id = $request->designation_id;
           
            if($request->file('image')){
                @unlink(('public/employeeImage/'.$employee->image));
                $file = $request->file('image');
                $fileName = rand(0000,9999).$file->getClientOriginalName();
                $file->move(('public/employeeImage'),$fileName);
                $user['image'] = $fileName;
            }
            $rand = rand(00000000,99999999);
            $user->code = $rand;
            $password = Hash::make($rand);
            $user->salary = $request->salary;
            $user->password = $password;
            $user->updated_by = Auth::id();
            $user->save();


            flash('User created successfully')->success();
            return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
