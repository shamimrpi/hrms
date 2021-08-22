@extends('main.template')
@section('main_content')
	
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Attendance View</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Attendance View</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

     <div class="content">
      <div class="container-fluid">
        
        
          
              <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Attendance View </h5>
                <br>
                    <form  id="searchForm">
                     
                      
                       
                                           
                      <div class="card-body">
                        <div class="row">
                         <div class="col-md-3">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Staff ID</label>
                                <select class="form-control" name="employee_id" id="employee_id">
                                  @foreach($users as $user)
                                  <option value="{{$user->id}}">{{$user->staff_id}}</option>
                                  @endforeach
                                </select>
                              
                              </div>
                            </div>
                             <div class="col-md-3">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Staff ID</label>
                                <input type="text" name="date" id="datepicker" class="form-control" placeholder="Select Month Date" autocomplete="off">
                              
                              </div>
                            </div>
                          
                         
                     
                    
                             <div class="col-md-4">
                              <div class="form-group">
                                
                                  <button type="submit" id="submit" class="btn btn-primary" style="margin-top: 35px"> Search</button>
                              
                              </div>
                            </div>
                      </div>
                           
                       
                        
                        </div>
                    </form>
                    <div id="demo">
                    </div>
                      <div class="row d-none" id="attendance-row">
                        <div class="col-md-12">

                          <table class="table" id="printsection">
                            <thead>
                              <tr>
                               
                                <th>Employee Name</th>
                                <th>Staff ID</th>
                                <th>Date</th>
                                 <th>Attendance Status</th>
                              </tr>
                            </thead>
                            <tbody id="attendance_row-tr">
                              
                            </tbody>
                          </table>

                        </div>
                      </div>
                
              </div>
  
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  </div>
@endsection
@section('scripts')
<script type="text/javascript">

 $(document).ready(function () {
 
    $('#searchForm').validate({ // initialize the plugin
 
    rules: {
 
        employee_id: {
 
            required: true
 
        }, 
       
      }

   
    });
 
});
 
</script>
<script type="text/javascript">
    $("#p_present").on("click",function(){
      $('input:radio[class=present]').each(function () {
            $(this).prop('checked', true);
         });
    });
    $("#p_absent").on("click",function(){
      $('input:radio[class=absent]').each(function () {
            $(this).prop('checked', true);
         });
    });
      $("#p_leave").on("click",function(){
      $('input:radio[class=leave]').each(function () {
            $(this).prop('checked', true);
         });
      $( "input" ).checkboxradio();
      $( document ).tooltip();
    });
  
</script>

<script type="text/javascript">
  $("#searchForm").on("click",function(e){
      e.preventDefault();

      var employee_id = $("#employee_id").val();
      var date = $("#datepicker").val();
      
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
        url:"{{route('attendance.getall')}}",
        type:"POST",
        data:{'employee_id':employee_id,'date':date},

        success:function(data){
          $('#attendance-row').removeClass('d-none');
        
          var html = '';
          $.each(data, function(key, v){
           

            html +=

            '<tr>'+
            '<td>'+v.employee.name+'</td>'+
            '<td>'+v.staff_id+'</td>'+
            '<td>'+v.date+'</td>'+
            '<td>'+v.status+'</td>'+
            
            '</tr>';

          });
        
           
          html = $('#attendance_row-tr').html(html);
          

        }

      });
  });
</script>

@endsection