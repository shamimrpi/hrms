<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/assets')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('public/assets')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('public/assets')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('public/assets')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('public/assets')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('public/assets')}}/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('public/assets')}}/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="{{asset('public/assets')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('public/assets')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('public/assets')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('public/assets')}}/dist/css/adminlte.min.css">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.css">  

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.js"></script>  
  <script>  
  @if(Session::has('success'))  
     $('.top-right').notify({  
        message: { text: "{{ Session::get('success') }}" }  
      }).show();  
     @php  
       Session::forget('success');  
     @endphp  
  @endif  
  @if(Session::has('info'))  
      $('.top-right').notify({  
        message: { text: "{{ Session::get('info') }}" },  
        type:'info'  
      }).show();  
      @php  
        Session::forget('info');  
      @endphp  
  @endif  
  @if(Session::has('warning'))  
        $('.top-right').notify({  
        message: { text: "{{ Session::get('warning') }}" },  
        type:'warning'  
      }).show();  
      @php  
        Session::forget('warning');  
      @endphp  
  @endif  
  @if(Session::has('error'))  
        $('.top-right').notify({  
        message: { text: "{{ Session::get('error') }}" },  
        type:'danger'  
      }).show();  
      @php  
        Session::forget('error');  
      @endphp  
  @endif  
</script>  
 
  
