@extends('main.template')
@section('main_content')
	
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Leave</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Leave Create</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

     <div class="content">
      <div class="container-fluid">
        
        
          
              <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Leave Create </h5>
                <br>
                    <form action="{{route('leave.store')}}" method="POST" id="leaveForm" enctype="multipart/form-data">
                     
                  @csrf
                       <div class="card-body">
                       
                       
                        <div class="row">
                             <div class="col-md-4">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Staff ID</label>
                                <select class="form-control form-control-sm" name="employee_id" id="employee_id">

                                  <option value="">Select Staff ID</option>
                                  @foreach($users as $user)

                                    <option value="{{$user->id}}">{{$user->staff_id}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Leave Type</label>
                                <select class="form-control form-control-sm" name="leave_type_id" id="leave_type_id">
                                  <option value="">Select Leave Type</option>
                                  @foreach($leave_types as $leave_type)
                                    <option value="{{$leave_type->id}}">{{$leave_type->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>

                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Start Date</label>
                                <input type="date" name="start_date" class="form-control form-control-sm "  id="start_date" >
                                @if($errors->has('start_date'))
                                <span class="text-danger">{{$errors->first('start_date')}}</span>
                                @endif
                              </div>
                            </div>

                             <div class="col-md-4">
                              <div class="form-group">
                                <label for="exampleInputEmail1">End Date</label>
                                <input type="date" name="end_date" class="form-control form-control-sm " id="end_date">
                                @if($errors->has('end_date'))
                                <span class="text-danger">{{$errors->first('end_date')}}</span>
                                @endif
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Reason</label>
                                <input type="text" name="reason" id="reason" class="form-control form-control-sm"  placeholder="Enter Reason" >
                                @if($errors->has('reason'))
                                <span class="text-danger">{{$errors->first('reason')}}</span>
                                @endif
                              </div>
                            </div>
                            <div class="col-md-4">
                            </div>
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
 
    $('#leaveForm').validate({ // initialize the plugin
 
    rules: {
 
        employee_id: {
 
            required: true
 
        }, 
        leave_type_id: {
 
            required: true
 
        }, 
         start_date: {
 
            required: true
 
        }, 
         end_date: {
 
            required: true
 
        },
         reason: {
 
            required: true
 
        },
      }

   
    });
 
});
 
</script>


@endsection