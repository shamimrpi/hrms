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

                  <a href="{{route('leave.create')}}" class="btn btn-info fa fa-plus"> Add Leave</a>
                <br>
                <br>
                  <table id="example2" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>#SL</th>
                          <th>Staff Id</th>
                          <th>Name</th>
                          <th>Leave Type</th>
                          <th>Days</th>
                          <th>Date</th>
                          <th>Reason</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if($data)
                          @foreach($data as $key => $leave)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$leave->employee->staff_id}}</td>
                            <td>{{$leave->employee->name}}</td>
                            <td>{{$leave->leave_type->name}}</td>
                            <td>{{$leave->days}}</td>
                             <td>{{date('d-m-Y',strtotime($leave->start_date))}} to {{date('d-m-Y',strtotime($leave->end_date))}}</td>
                            <td>{{$leave->reason}}</td>
                            <td>{{(@$leave->status == true)?'Approved':'Pending'}}</td>
                            <td>
                              <a href="#" class="btn btn-info fa fa-edit"></a>
                            
                               
                              </form>
                              
                            </td>
                          </tr>
                          @endforeach
                        @endif
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