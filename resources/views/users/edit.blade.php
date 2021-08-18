@extends('main.template')
@section('main_content')
	
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">User Edit</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

     <div class="content">
      <div class="container-fluid">
        <div class="row">
         
          

            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Edit User </h5>
                <br>
                    <form action="{{route('users.update',$user->id)}}" method="POST" id="userForm" enctype="multipart/form-data">
                    	@csrf
                      @method('PUT')
                      <div class="card-body">
                   <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">User Name</label>
                            <input type="text" name="name" class="form-control form-control-sm" id="name" value="{{$user->name}}">
                            @if($errors->has('name'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                            @endif
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Father Name</label>
                            <input type="text" name="f_name" class="form-control form-control-sm" id="f_name" value="{{$user->f_name}}">
                          @if($errors->has('f_name'))
                            <span class="text-danger">{{$errors->first('f_name')}}</span>
                            @endif
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Mother Name</label>
                            <input type="text" name="m_name" class="form-control form-control-sm" id="m_name" value="{{$user->m_name}}">
                           @if($errors->has('m_name'))
                            <span class="text-danger">{{$errors->first('m_name')}}</span>
                            @endif
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Mobile</label>
                            <input type="text" name="mobile" class="form-control form-control-sm" id="mobile" value="{{$user->mobile}}">
                            @if($errors->has('mobile'))
                            <span class="text-danger">{{$errors->first('mobile')}}</span>
                            @endif
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" name="address" class="form-control form-control-sm" id="address" value="{{$user->address}}">
                           @if($errors->has('address'))
                            <span class="text-danger">{{$errors->first('address')}}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Salary</label>
                            <input type="text" name="salary" class="form-control form-control-sm" id="address" value="{{$user->salary}}">
                           @if($errors->has('salary'))
                            <span class="text-danger">{{$errors->first('salary')}}</span>
                            @endif
                          </div>
                        </div>
                          <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Education</label>
                            <input type="text" name="education" class="form-control form-control-sm" id="address"  value="{{$user->education}}">
                           @if($errors->has('education'))
                            <span class="text-danger">{{$errors->first('education')}}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Gender</label>
                            <select class="form-control form-control-sm" name="gender_id" id="gender_id">
                              <option value="">Select Gender</option>
                              @foreach($genders as $gender)
                                <option value="{{$gender->id}}" {{(@$user->gender_id== $gender->id)?'selected':''}}>{{$gender->name}}</option>
                              @endforeach
                            </select>
                           
                          
                          </div>
                        </div>
                          <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Designation</label>
                            <select class="form-control form-control-sm" name="designation_id" id="designation_id">
                              <option value="">Select Gender</option>
                              @foreach($designations as $designation)
                                <option value="{{$designation->id}}" {{(@$user->designation_id== $designation->id)?'selected':''}}>{{$designation->name}}</option>
                              @endforeach
                            </select>
                           
                          
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Religion</label>
                            <select class="form-control form-control-sm"  name="religion_id" id="religion_id">
                              <option value="">Select Religion</option>
                               @foreach($religions as $religion)
                                <option value="{{$religion->id}}" {{(@$user->religion_id== $religion->id)?'selected':''}}>{{$religion->name}}</option>
                              @endforeach
                            </select>
                         
                          </div>
                        </div>

                       

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input type="file" name="image"  class="form-control form-control-sm" id="imgload">
                           @if($errors->has('image'))
                            <span class="text-danger">{{$errors->first('image')}}</span>
                            @endif
                          </div>
                        </div>

                          <div class="col-md-4" style="display: flex-box;">
                            <label for="exampleInputEmail1">Your Image</label>

                          <img src="{{(!empty($user->image))?url('public/employeeImage/'.$user->image):''}}"   style="height: 150px;width: 170px;border: 1px solid #eee">
                        </div>
                         <div class="col-md-4">
                          <img id="showImage"   style="height: 150px;width: 170px;border: 1px solid #eee">
                        </div>

                    
                    </div>
                    <div class="row"> 
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary fa fa-save"> Save</button>
                      </div>
                    </div>
                    </form>

                
              </div>
            </div><!-- /.card -->
      
        
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  </div>
@endsection
@section('scripts')

<script type="text/javascript">

 $(document).ready(function () {
 
    $('#userForm').validate({ // initialize the plugin
 
    rules: {
 
        name: {
 
            required: true
 
        },
        f_name: {
 
            required: true
 
        },
         m_name: {
 
            required: true
 
        },
         address: {
 
            required: true
 
        },
         mobile: {
 
            required: true,
            digits: true
 
        },
         address: {
 
            required: true
 
        },
         gender_id: {
 
            required: true
 
        },
          designation_id: {
 
            required: true
 
        },
         religion_id: {
 
            required: true
 
        }, 
        dob: {
 
            required: true,

 
        }, 
        join_date: {
 
            required: true,
            
 
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