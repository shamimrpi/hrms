@extends('main.template')
@section('main_content')
	
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Attendance</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Attendance Create</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

     <div class="content">
      <div class="container-fluid">
        
        
          
              <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Attendance Create </h5>
                <br>
                    <form action="{{route('attendance.store')}}" method="POST" id="attendanceForm" enctype="multipart/form-data">
                     
                       @csrf
                       
                                           
                      <div class="card-body">
                        <div class="row">
                         <div class="col-md-3">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Attendance Date</label>
                                <input type="text" id="datepicker" name="date" class="form-control form-control-sm" placeholder="Select Attendance Date" autocomplete="off" >
                                @if($errors->has('start_date'))
                                <span class="text-danger">{{$errors->first('start_date')}}</span>
                                @endif
                              </div>
                            </div>
                          </div>
                     
                  
                        <div class="row">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>#SL</th>
                                  <th>Staff ID</th>
                                  <th>Staff Name</th>
                                  <th width="10%" id="p_present"><a class="btn btn-primary btn-sm"><i class="fa fa-check"> Present</a></th>
                                  <th width="10%" id="p_absent"> <a class="btn btn-primary btn-sm"><i class="fa fa-check"> Absent</a></th>
                                  <th width="10%" id="p_leave"><a class="btn btn-primary btn-sm"><i class="fa fa-check"> Leave</a></th>
                                </tr>
                                
                                
                              </thead>
                              <tbody>
                                @foreach($users as $key=>$user)
                                <tr>
                                  <td>{{$key+1}}</td>
                                  <input type="hidden" name="employee_id[]" value="{{$user->id}}">
                                  <td>{{$user->staff_id}}</td>
                                  <td>{{$user->name}}</td>
                                  <fieldset>
                                    
                                 <td><input type="radio" class="present" name="status{{$key}}" id="radio-1" value="Present" checked="checked" /><label for="status{{$key}}"><label for="radio{{$key}}">Present</label></label>
                                    <td><input type="radio" class="absent"  name="status{{$key}}" id="radio-3" value="Absent"  /><label for="radio{{$key}}">Absent</label></td>
                                    <td><input type="radio" class="leave"  name="status{{$key}}" id="radio-3" value="Leave"  /><label for="radio{{$key}}">Leave</label></td></fieldset>
                            
                                    
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                             <div class="col-md-4">
                              <div class="form-group">
                                
                                  <button type="submit" id="submit" class="btn btn-primary fa fa-save" style="margin-top: 30px"> Save</button>
                              
                              </div>
                            </div>
                          </div>
                        </div>
                    </form>

                
              </div>
  
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  </div>
@endsection
@section('scripts')
<script type="text/javascript">

 $(document).ready(function () {
 
    $('#attendanceForm').validate({ // initialize the plugin
 
    rules: {
 
        date: {
 
            required: true
 
        }, 
       
      }

   
    });
 
});
 
</script>
<script type="text/javascript">
    $("#p_present").on("click",function(){
      $('input:radio[class=present]').each(function () {
            $(this).prop('checked', true);
         });
    });
    $("#p_absent").on("click",function(){
      $('input:radio[class=absent]').each(function () {
            $(this).prop('checked', true);
         });
    });
      $("#p_leave").on("click",function(){
      $('input:radio[class=leave]').each(function () {
            $(this).prop('checked', true);
         });
      $( "input" ).checkboxradio();
      $( document ).tooltip();
    });
  
</script>



@endsection