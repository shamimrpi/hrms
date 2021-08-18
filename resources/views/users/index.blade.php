@extends('main.template')

@section('main_content')

  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">User List</li>
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
                <h5 class="card-title">User List</h5>
                <br><br>

                  <a href="{{route('users.create')}}" class="btn btn-info fas fa-plus"> Add User</a>
                <br>
                <br>
                  <table id="example2" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>#SL</th>
                          <th>Name</th>
                          <th>Staff ID</th>
                          <th>Father's Name</th>
                        
                          <th>Code</th>
                            <th>Status</th>
                          <th>Mobile</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if($users)
                          @foreach($users as $key => $user)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->staff_id}}</td>
                            <td>{{$user->f_name}}</td>
                            <td>{{$user->code}}</td>

                            <td class="text-center"><a class="btn btn-{{(@$user->status == true)?'primary':'danger'}}" tooltip="active/deactive" href="{{route('employee.status',$user->id)}}" >{{(@$user->status == true)?'Active':'Inactive'}}</a></td>
                            <td>{{$user->mobile}}</td>
                            <td>
                              <a href="{{route('users.edit',$user->id)}}" class="btn btn-info fa fa-edit"></a>
                              <a href="{{route('users.show',$user->id)}}" class="btn btn-info fa fa-eye"></a>
                               
                              </form>
                              
                            </td>
                          </tr>
                          @endforeach
                        @endif
                      </tbody>
                      <tfoot>
                         <tr>
                        
                          <th>#SL</th>
                          <th>Name</th>
                          <th>Staff ID</th>
                          <th>Father's Name</th>
                          
                          <th>Code</th>
                          <th>Status</th>
                          <th>Mobile</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
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
