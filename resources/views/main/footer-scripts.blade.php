
<!-- jQuery -->

<script src="{{asset('public/assets')}}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('public/assets')}}/plugins/jquery-ui/jquery-ui.min.js"></script>


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/assets')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('public/assets')}}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('public/assets')}}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('public/assets')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('public/assets')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('public/assets')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('public/assets')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('public/assets')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('public/assets')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('public/assets')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('public/assets')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/assets')}}/dist/js/adminlte.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('public/assets')}}/dist/js/pages/dashboard.js"></script>
<script src="{{asset('public/assets')}}/js/notify.js"></script>
<script src="{{asset('public/assets')}}/js/jquery.validate.min.js"></script>
<script src="{{asset('public/assets')}}/js/select2.min.js"></script>

<script src="{{asset('public/assets')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('public/assets')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('public/assets')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('public/assets')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('public/assets')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('public/assets')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('public/assets')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('public/assets')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('public/assets')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('public/assets')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('public/assets')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('public/assets')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="{{asset('public/assets')}}/js/handlebars.js"></script>
<!-- date picker -->

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script type="text/javascript">
 $('select').select2({
  placeholder: 'This is my placeholder',
  allowClear: true
});
</script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
   
  } );
  </script>
  <script>
  $( function() {
    $( "input" ).checkboxradio();
    $( "fieldset" ).controlgroup();
  } );
  </script>

