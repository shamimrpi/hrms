@extends('main.template')

@section('main_content')

  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Religion List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Religion List</li>
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
                <h5 class="card-title">Promotion Employe List</h5>
                <br><br>

                  
                <br>
                <br>
                  <table id="example2" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>#SL</th>
                          <th>Employee ID</th>
                          <th>Staff Id</th>
                          <th>Name</th>
                          <th>Designation</th>
                           <th>Salary</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                       @php
                       
                       @endphp
                          @foreach($increments as $key => $increment)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$increment->employee_id}}</td>
                            <td>{{$increment->employee->staff_id}}</td>
                            <td>{{$increment->employee->name}}</td>
                            <td>{{$increment->employee->designation->name}}</td>
                            <td>{{$increment->employee->salary}}</td>
                            
                            <td>
                              <a href="{{route('increment.edit',$increment->employee_id)}}" tooltip="Increment" class="btn btn-info">Increment</a>
                              
                               
                             
                              
                            </td>
                          </tr>
                          @endforeach
                      
                      </tbody>
                      
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
