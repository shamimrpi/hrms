@extends('main.template')

@section('main_content')

  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">View profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">View Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
          

            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Profile</h5>
                <br><br>

                  
                <br>
                <br>
                <div class="text-center">
                  <div class="row">
                    <div class="col-md-4">
                        <img src="{{(!empty($user->image))?url('public/employeeImage/'.$user->image):''}}"   style="height: 300px;width: 280px;border: 1px solid #eee; margin-top:-30px">
                        <h3>{{$user->name}}</h3>
                    </div>
                    <div class="col-md-4">
                        <img src="{{(!empty($user->image))?url('public/employeeImage/'.$user->f_image):''}}"  style="height: 300px;width: 280px;border: 1px solid #eee; margin-top:-30px">
                        <h5><strong>Father's Name</strong> {{$user->f_name}}</h5>
                    </div>

                    <div class="col-md-4">
                        <img src="{{(!empty($user->image))?url('public/employeeImage/'.$user->m_image):''}}"   style="height: 300px;width: 280px;border: 1px solid #eee; margin-top:-30px">
                        <h5><strong>Mother's Name</strong> {{$user->f_name}}</h5>
                    </div>

                  </div>
                </div>
                <br/>
                  <table id="example2" class="table table-bordered table-striped">
                    <tr>
                         <th>Name</th>
                        <td>{{$user->name}}</td>
                    </tr>
                     <tr>
                         <th>Father's Name</th>
                        <td>{{$user->f_name}}</td>
                    </tr>
                     <tr>
                         <th>Mother's Name</th>
                        <td>{{$user->m_name}}</td>
                    </tr>
                     <tr>
                         <th>Mobile</th>
                        <td>{{$user->mobile}}</td>
                    </tr>
                     <tr>
                         <th>Email</th>
                        <td>{{$user->email}}</td>
                    </tr>
                     <tr>
                         <th>Address</th>
                        <td>{{$user->address}}</td>
                    </tr>
                     <tr>
                         <th>Education</th>
                         <td>{{$user->educaton}}</td>
                    </tr>
                     <tr>
                         <th>Designation</th>
                        <td>{{$user->designation->name}}</td>
                    </tr>
                     <tr>
                         <th>Salary</th>
                        <td>{{$user->salary}}</td>
                    </tr>
                    <tr>
                         <th>Father's Mobile</th>
                        <td>{{$user->f_mobile}}</td>
                    </tr>
                    <tr>
                         <th>Father's Occupation</th>
                        <td>{{$user->f_occupation}}</td>
                    </tr>

                  
                     <tr>
                         <th>Mother's Mobile</th>
                        <td>{{$user->m_mobile}}</td>
                    </tr>
                    <tr>
                         <th>Mother's Occupation</th>
                        <td>{{$user->m_occupation}}</td>
                    </tr>

                 
                     <tr>
                         <th>Present Gardian Name</th>
                        <td>{{$user->gardian_name}}</td>
                    </tr>
                    <tr>
                         <th>Present Gardian Mobile No.</th>
                        <td>{{$user->gardian_mobile}}</td>
                    </tr>
                     <tr>
                         <th>Created By</th>
                        <td>{{$created_by->name}}</td>
                    </tr>
                     <tr>
                         <th>Updated By</th>
                        <td>{{$updated_by->name}}</td>
                    </tr>

                    
                  </table>
                
              </div>
            </div><!-- /.card -->
          </div>
        
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


@endsection
