@extends('main.template')
@section('main_content')

  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Leave List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Leave List</li>
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
                <h5 class="card-title">Attendance view</h5>
                <br><br>

                  <a href="{{route('attendance')}}" class="btn btn-info fa fa-plus"> Attendance List</a>
                <br>
                <br>
                  <table id="example2" class="table table-bordered table-striped">
                      <thead class="text-center">
                        <tr>
                          <th>#SL</th>
                          <th>Staff ID</th>
                          <th>Name</th>
                          <th>Date</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody class="text-center">
                        @foreach($attendances as $key=> $attendance)
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$attendance->employee->staff_id}}</td>
                          <td>{{$attendance->employee->name}}</td>
                          <td>{{date('d/m/Y',strtotime($attendance->date))}}</td>
                        <td>{{$attendance->status}}</td>
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