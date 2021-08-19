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
                <h5 class="card-title">Leave List</h5>
                <br><br>

                  <a href="{{route('attendance.create')}}" class="btn btn-info fa fa-plus"> Add Attendance</a>
                <br>
                <br>
                  <table id="example2" class="table table-bordered table-striped">
                      <thead class="text-center">
                        <tr>
                          <th>#SL</th>
                       
                          <th>Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody class="text-center">
                        @foreach($attendances as $key=> $attendance)
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$attendance->date}}</td>
                          <td class="text-center"><a href="{{route('attendance.edit',$attendance->date)}}" class="btn btn-info"><i class="fa fa-edit">Edit</i></a></td>
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