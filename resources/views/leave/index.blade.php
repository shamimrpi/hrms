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

                  <a href="{{route('leave.create')}}" class="btn btn-info"><i class="fa fa-plus"></i> Add Leave</a>
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
                            <td>
                             {{$leave->status}}
                            </td>

                            <td>
                              <?php if($leave->status == 'Pending') { ?>
                                <a href="{{route('leave.edit',$leave->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit">Edit</i></a>
                                <a href="{{route('leave.delete',$leave->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"> Delete</i></a>
                              <?php }
                             
                              elseif ($leave->status == 'Approve') {?>
                                 <button class="btn btn-info btn-sm" disabled=""><i class="fa fa-edit"></i> Edit</button>
                                  <button class="btn btn-danger btn-sm" disabled=""><i class="fa fa-trash"></i> Delete</button>
                             <?php }else{?>
                                <button class="btn btn-info btn-sm" disabled=""><i class="fa fa-edit"></i> Edit</button>
                                  <button class="btn btn-danger btn-sm" disabled=""><i class="fa fa-trash"></i> Delete</button>
                             <?php }?>

                              
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