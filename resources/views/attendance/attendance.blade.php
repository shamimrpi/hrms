@extends('main.template')
@section('main_content')
	
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Attendance View</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Attendance View</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

     <div class="content">
      <div class="container-fluid">
        
        
          
              <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Attendance View </h5>
                <br>
              
                     
                      
                       
                                           
                      <div class="card-body">
                        <form action="{{route('attendance.getall')}}" method="POST" id="searchForm">
                          @csrf
                          <div class="row">
                            <div class="col-sm-4">
                              <div class="form-group">
                                 <label for="staff_id">Staff ID</label>
                                 <select class="form-control" name="employee_id">
                                  @foreach($users as $user)
                                   <option value="{{$user->id}}" {{(@$employee_id == $user->id)?'selected':''}}>{{$user->staff_id}}</option>
                                   @endforeach
                                 </select>
                              </div>
                            </div>

                            <div class="col-sm-4">
                              <div class="form-group">
                                 <label for="staff_id">Date</label>
                                 <?php if(isset($attendances)) {?>
                                  <input type="text" name="date" id="datepicker" placeholder="Enter Date" class="form-control" autocomplete="off" value="{{$date}}">
                                 <?php } else {?>
                                <input type="text" name="date" id="datepicker" placeholder="Enter Select Date" class="form-control" autocomplete="off" >
                                 <?php } ?>

                              </div>
                            </div>
                              <div class="col-sm-4">
                              <div class="form-group">
                                 
                                <input type="submit" class="btn btn-info" value="Submit" style="margin-top: 30px">
                              </div>
                            </div>




                          </div>
                      </form>
                      <!-- //end form -->
                      <?php if(isset($attendances)) { ?>
                        <h2 class="text-center">Attendance of {{$employee_name}}</h2>
                        <br>
                          <table class="table table-hover">
                         <thead>
                          <tr class="table-secondary">
                             <th>SL</th>
                             <th>Date</th>
                             <th>Status</th>
                          </tr>
                          
                         </thead>
                         <tbody>
                           
                             @foreach($attendances as $key=>$attendance)
                             <tr class="@php if($attendance->status == 'Present'){ @endphp table-success @php } if($attendance->status == 'Absent'){@endphp table-danger @php } if($attendance->status == 'Leave'){@endphp table-info @php }@endphp">
                               <td>{{$key+1}}</td>
                               <td>{{date('d-m-Y',strtotime($attendance->date))}}</td>
                               <td>{{$attendance->status}}</td>
                             </tr>
                             @endforeach
                           
                         </tbody>
                       </table>
                      <?php  } ?>
                 
                
  
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  </div>
</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">

 $(document).ready(function () {
 
    $('#searchForm').validate({ // initialize the plugin
 
    rules: {
 
        employee_id: {
 
            required: true
 
        },
         date: {
 
            required: true
 
        }, 
       
      }

   
    });
 
});
 
</script>



@endsection