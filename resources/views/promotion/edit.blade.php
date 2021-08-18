@extends('main.template')
@section('main_content')
	
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Promotion Employee</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Promotion</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

     <div class="content">
      <div class="container-fluid">

         
          

            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">promotion </h5>
                <br>
                    <form action="{{route('promotion.update',$user->employee_id)}}" method="POST" id="promotionForm" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                       <div class="card-body">
                        <div class="row">
                          <div class="col-md-6">
                            <p><strong>Staff ID: </strong>{{$user->staff_id}}</p>
                          </div>
                           <div class="col-md-6">
                            <p><strong>Staff ID:</strong> {{$user->s_user->name}}</p>
                          </div>
                        
                         
                        </div>
                       
                        <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <input type="hidden" name="previous_designaton_id" value="{{$user->s_user->designation_id}}">
                                <label for="exampleInputEmail1">Promotion Designation</label>
                                <select class="form-control" name="present_designation_id" placeholder="Select Designation">
                                  
                                  @foreach($designations as $designation)
                                  <option value="{{$designation->id}}" {{(@$user->s_user->designation_id == $designation->id)?'selected':''}}>{{$designation->name}}</option>
                                  @endforeach
                                </select>
                                @if($errors->has('present_designation_id'))
                                <span class="text-danger">{{$errors->first('present_designation_id')}}</span>
                                @endif
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Effective Date</label>
                                <input type="date" name="effective_date" class="form-control " id="effective_date" placeholder="Enter Fee Category name" >
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
 
    $('#promotionForm').validate({ // initialize the plugin
 
    rules: {
 
        present_designation_id: {
 
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