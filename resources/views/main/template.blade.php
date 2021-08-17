@include('main.head');
@yield('css');
<script>  
  $.notify("Access granted", "success");
</script>  
</head>
@include('main.header');
@include('main.sidebar');
 
<div class="content-wrapper">
@include('flash::message')
 @yield('main_content')
</div>
@include('main.footer');
@include('main.footer-scripts');
<script>
$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>
@yield('scripts');
</body>
</html>
