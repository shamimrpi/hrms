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
              
                     
                      
                       
                                           
                      <div class="card-body">
                   
                      <!-- //end form -->
                           
                       <table class="table table-hover">
                         <thead>
                          <tr>
                             <th>SL</th>
                             <th>Date</th>
                             <th>Status</th>
                          </tr>
                          
                         </thead>
                         <tbody>
                           
                             @foreach($attendances as $key=>$attendance)
                             <tr class="@php if($attendance->status == 'Present'){ @endphp table-success @php } if($attendance->status == 'Absent'){@endphp table-danger @php } if($attendance->status == 'Leave'){@endphp table-info @php }@endphp">
                               <td>{{$key+1}}</td>
                               <td>{{date('d-m-Y',strtotime($attendance->date))}}</td>
                               <td>{{$attendance->status}}</td>
                             </tr>
                             @endforeach
                           
                         </tbody>
                       </table>
                   </div>
                
  
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  </div>
</div>
</div>
</div>
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
         date: {
 
            required: true
 
        }, 
       
      }

   
    });
 
});
 
</script>



@endsection