@extends('main.template')
@section('main_content')
	
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Gender</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Gender Create</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

     <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
          

            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Create Gender </h5>
                <br>
                    <form action="{{route('gender.store')}}" method="POST" id="genderForm">
                    	@csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputName">Gender Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Gender name">
                        @if($errors->has('name'))
                        <span class="text-danger">{{$errors->first('name')}}</span>
                        @endif
                      </div>
                

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary fa fa-save"> Save</button>
                    </div>
                    </div>
                  </form>

                
              </div>
            </div><!-- /.card -->
          </div>
        
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
 
    $('#genderForm').validate({ // initialize the plugin
 
    rules: {
 
        name: {
 
            required: true
 
        }, 
      }

   
    });
 
});
 
</script>

@endsection