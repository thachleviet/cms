
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') - Trang quản trị </title>
    <meta name="csrf-token"  value="{!! csrf_token() !!}" content="{!!  csrf_token() !!}">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
{{--    @include('components._stylesheet')--}}
    @include('backend.layouts.components._stylesheet')
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

   @include('backend.layouts.components._header')
    <!-- Left side column. contains the logo and sidebar -->
   @include('backend.layouts.components._sidebar_left')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @yield('content')
        <!-- Content Header (Page header) -->

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('backend.layouts.components._footer')

    <!-- Control Sidebar -->
    @include('backend.layouts.components._sidebar_right')
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
    <!-- MODAL BOOTSTRAP -->
    <div class="modal fade" id="myModal" role="dialog"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
@include('backend.layouts.components._script')
</body>
</html>
