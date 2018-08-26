    @yield('before_stylesheet')
    {{--<link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css?v'.time())}}">--}}
    {{--<link rel="stylesheet" href="{{asset('backend/bower_components/font-awesome/css/font-awesome.min.css?v'.time())}}">--}}
    {{--<link rel="stylesheet" href="{{asset('backend/bower_components/Ionicons/css/ionicons.min.css?v'.time())}}">--}}
    {{--<link rel="stylesheet" href="{{asset('backend/bower_components/jvectormap/jquery-jvectormap.css?v'.time())}}">--}}
    {{--<link rel="stylesheet" href="{{asset('backend/dist/css/AdminLTE.min.css?v'.time())}}">--}}
    {{--<link rel="stylesheet" href="{{asset('backend/dist/css/skins/_all-skins.min.css?v'.time())}}">--}}

    {{--<!-- Morris chart -->--}}
    {{--<link rel="stylesheet" href="{{asset('backendbower_components/morris.js/morris.css')}}">--}}

    {{--<link rel="stylesheet" href="{{asset('backend/bower_components/jvectormap/jquery-jvectormap.css')}}">--}}
    {{--<!-- Date Picker -->--}}
    {{--<link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">--}}
    {{--<!-- Daterange picker -->--}}
    {{--<link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">--}}
    {{--<!-- bootstrap wysihtml5 - text editor -->--}}
    {{--<link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">--}}
    <link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css?v='.time())}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('backend/bower_components/font-awesome/css/font-awesome.min.css?v='.time())}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('backend/bower_components/Ionicons/css/ionicons.min.css?v='.time())}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('backend/dist/css/AdminLTE.min.css?v='.time())}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    {{--<link rel="stylesheet" href="{{asset('backend')}}/dist/css/skins/_all-skins.min.css">--}}
    {{--<!-- Morris chart -->--}}
    {{--<link rel="stylesheet" href="{{asset('backend')}}/bower_components/morris.js/morris.css">--}}
    <!-- jvectormap -->
    {{--<link rel="stylesheet" href="{{asset('backend')}}/bower_components/jvectormap/jquery-jvectormap.css">--}}
    <!-- Date Picker -->
    {{--<link rel="stylesheet" href="{{asset('backend')}}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">--}}
    <!-- Daterange picker -->
    {{--<link rel="stylesheet" href="{{asset('backend')}}/bower_components/bootstrap-daterangepicker/daterangepicker.css">--}}
    <!-- bootstrap wysihtml5 - text editor -->
    {{--<link rel="stylesheet" href="{{asset('backend')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">--}}
    <link rel="stylesheet" href="{{asset('backend/dist/css/skins/_all-skins.min.css?v='.time())}}">
    <link rel="stylesheet" href="{{asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css?v='.time())}}">
    <link rel="stylesheet" href="{{asset('backend/bower_components/datatables.net-bs/css/fixedHeader.bootstrap.min.css?v='.time())}}">
    <link rel="stylesheet" href="{{asset('backend/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css?v='.time())}}">
    <style>
        .error {
            color: red;
            font-size: 0.8em;
        }
        input.error{
            border: red solid 1px;
        }
    </style>
@yield('after_stylesheet')