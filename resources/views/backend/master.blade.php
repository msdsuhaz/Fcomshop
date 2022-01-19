<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/')}}/admin/backend/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('/')}}/admin/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('/')}}/admin/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('/')}}/admin/backend/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/')}}/admin/backend/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('/')}}/admin/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('/')}}/admin/backend/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('/')}}/admin/backend/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="{{asset('/')}}/admin/backend/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="{{asset('/')}}/admin/backend/plugins/jquery-validation/additional-methods.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="{{asset('/')}}/admin/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('/')}}/admin/backend/plugins/jquery/jquery.min.js"></script>
  <link rel="stylesheet" href="{{asset('/')}}/admin/backend/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{asset('/')}}/admin/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  @include('backend.include.headernav')
  @include('backend.include.manu')
  @yield('main-contant')
  @include('backend.include.footer')
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<!-- jQuery UI 1.11.4 -->
<script src="{{asset('/')}}/admin/backend/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('/')}}/admin/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('/')}}/admin/backend/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('/')}}/admin/backend/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('/')}}/admin/backend/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('/')}}/admin/backend/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('/')}}/admin/backend/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('/')}}/admin/backend/plugins/moment/moment.min.js"></script>
<script src="{{asset('/')}}/admin/backend/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('/')}}/admin/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('/')}}/admin/backend/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('/')}}/admin/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/')}}/admin/backend/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('/')}}/admin/backend/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/')}}/admin/backend/dist/js/demo.js"></script>
<script src="{{asset('/')}}/admin/backend/plugins/select2/js/select2.full.min.js"></script>

<script type="text/javascript">

  $(function(){
     $(document).on('click','#delete',function(e){
       e.preventDefault();
       var link = $(this).attr("href");
       Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href =link;
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
           }
   })

     })
  })

</script>

<script type="text/javascript">

  $(function(){
     $(document).on('click','#approved',function(e){
       e.preventDefault();
       var actionTo = $(this).attr('href');
       var token= $(this).attr('data-token');
       var  id= $(this).attr('data-id');
         swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this imaginary file!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Poof! Your imaginary file has been deleted!", {
              icon: "success",
            });
          } else {
            swal("Your imaginary file is safe!");
          }
          });
           function(isConfirm){
             if(isConfirm){
               $.ajax({
                  url:actionTo,
                  type:'POST',
                  data:{id:id, _token:token},
                  success:function(data){
                      Swal.({
                         title:"approved!",
                         type:"success"

                      },
                        function(isConfirm){
                          if(isConfirm){
                             $('.' *id).fadeOut();
                          }
                      });
                  }

               });
             }else{
                Swal("canceled","","error");
             }
           }
   });
      return false;
     });
  });

</script>




<script>
  $(document).ready(function(){
    $('#image').change(function(e){
      var reader =new FileReader();
      reader.onload = function(e){
        $('#showImage').attr('src',e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    });
  });
</script>

<script>
  $(function(){
   $('.select2').select2()
  })
</script>

<script>
  $(document).ready(function(){
    $('#image').change(function(e){
      var reader =new FileReader();
      reader.onload = function(e){
        $('#showImage').attr('src',e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    });
  });
</script>

</body>
</html>
