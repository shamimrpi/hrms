@extends('main.template')
@section('main_content')

  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Leave Approve Pending List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Leave Approve Pending List</li>
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
                <h5 class="card-title">Leave Approve Pending List</h5>
                <br><br>

                <a href="JavaScript:void(0);" class="btn btn-info" id="multiple_approve">Select All Approve</a>
              
                <br>
                <br>
                  <table id="example2" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>
                            <span class="custom-checkbox">
                              <input type="checkbox" id="selectAll">
                              <label for="selectAll">Select All</label>
                            </span>
                          </th>
                          <th>#SL</th>
                          <th>Staff Id</th>
                          <th>Name</th>
                          <th>Leave Type</th>
                          <th>Days</th>
                          <th>Date</th>
                          <th>Reason</th>
                         
                           <th>Action</th>
                       
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($data as $key=>$leave)
                        <tr>
                           <td>
                            <span class="custom-checkbox">
                              <input type="checkbox" class="user_checkbox" data-user-id="<?php echo $leave->id ?>">
                              <label for="checkbox2"></label>
                            </span>
                          </td>
                          <td>{{$key+1}}</td>
                          <td>{{$leave->employee->staff_id}}</td>
                          <td>{{$leave->employee->name}}</td>
                          <td>{{$leave->leave_type->name}}</td>
                          <td>{{$leave->days}}</td>
                          <td>{{ date('d-m-Y',strtotime($leave->start_date))}} to {{ date('d-m-Y',strtotime($leave->end_date))}}</td>
                          <td>{{$leave->reason}}</td>

                          <td>
                            <a href="{{route('leave.accept',$leave->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-check"></i> 
                            <a href="{{route('leave.cancel',$leave->id)}}" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i>
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
@section('scripts')
<script type="text/javascript">
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    var checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function(){
      if(this.checked){
        checkbox.each(function(){
          this.checked = true;                        
        });
      } else{
        checkbox.each(function(){
          this.checked = false;                        
        });
      } 
    });
    checkbox.click(function(){
      if(!this.checked){
        $("#selectAll").prop("checked", false);
      }
    });
  });


$(document).on("click", "#multiple_approve", function() {
    var user = [];
    $(".user_checkbox:checked").each(function() {
      user.push($(this).data('user-id'));
    });
    if(user.length <=0) {
      $.notify("Please Select ",{golbalPosition:'top right',className:'error'});
      return false;
    } 
    else { 
      WRN_PROFILE_DELETE = ("Are you all Approve! ");
      var checked = confirm(WRN_PROFILE_DELETE);
      if(checked == true) {
        var selected_values = user;
     
        $.ajax({
          type: "get",
          url: "{{route('leave.approve.all')}}",
          cache:false,
          data:{    
          type: 4,       
            id : selected_values
          },
          success: function(response) {
             $.notify("Approve All successfully ",{golbalPosition:'top right',className:'error'});
             location.reload();
              return false;
          } 
        }); 
      }  
    } 
  });
  
 
</script>

@endsection