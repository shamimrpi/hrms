@extends('main.template')
@section('main_content')
	
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Increment Employee</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Increment</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

     <div class="content">
      <div class="container-fluid">

         
          

            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Increment </h5>
                <br>
                    <form action="{{route('increment.update',$user->employee_id)}}" method="POST" id="incrementForm" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                       <div class="card-body">
                        <div class="row">
                          <div class="col-md-6">
                           <p><strong>Staff ID :</strong> {{$user->employee->staff_id}}</p>
                          </div>
                           <div class="col-md-6">
                            <p><strong>Employee Name :</strong> {{$user->employee->name}}</p>
                          </div>
                        
                         
                        </div>
                       
                        <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <input type="hidden" name="previous_increment" value="{{$user->present_increment}}">
                                <label for="exampleInputEmail1">Promotion Designation</label>
                               <input type="text" name="present_increment" class="form-control" placeholder="Enter Increment Amount">
                                 
                                @if($errors->has('salary_increment'))
                                <span class="text-danger">{{$errors->first('name')}}</span>
                                @endif
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Effective Date</label>
                                <input type="date" name="effective_date" class="form-control " id="datetimepicker" placeholder="Enter Fee Category name" >
                                @if($errors->has('name'))
                                <span class="text-danger">{{$errors->first('effective_date')}}</span>
                                @endif
                              </div>
                            </div>
                             <div class="col-md-4">
                              <div class="form-group">
                                
                                  <button type="submit" class="btn btn-primary fa fa-save" style="margin-top: 30px"> Save</button>
                              
                              </div>
                            </div>
                          </div>
                        </div>
                    </form>

                
              </div>
            </div><!-- /.card -->
      
        
          <!-- /.col-md-6 -->
       
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  </div>
@endsection
@section('scripts')

<script type="text/javascript">

 $(document).ready(function () {
 
    $('#incrementForm').validate({ // initialize the plugin
 
    rules: {
 
        present_increment: {
 
            required: true
 
        },
        effective_date: {
 
            required: true
 
        },
      
         
      }

   
    });
 
});
 
</script>
<script type="text/javascript">
  $(document).ready(function(){
     // image show javascript
     $("#imgload").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
  });
</script>




@endsection