
@extends('staff::layouts.master')
@section('after_stylesheet')
    <link rel="stylesheet" href="{{asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css?v'.time())}}">
    <link rel="stylesheet" href="{{asset('backend')}}/bower_components/datatables.net-bs/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('backend')}}/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('backend')}}/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

    <link rel="stylesheet" href="{{asset('backend')}}/bower_components/bootstrap/dist/css/bootstrap-nav-wizard.css">

@endsection
@section('title',$title)
@section('content')
    <section class="content-header">
        <h1>
            Dashboard
            <small>Version 2.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-7">
                                <form action="#" method="post">
                                    <div class="input-group">
                                        <input type="text" name="message" placeholder="Type Message ..."
                                               class="form-control">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-warning btn-flat"> <i class="fa fa-search"></i> Tìm kiếm</button>
                                        </span>
                                        <span class="input-group-btn">
                                            <button type="reset" style="margin-left: 10px" class="btn btn-primary"><i class="fa fa-refresh"></i> Refresh</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <div class="col-xs-5">
                                <a onclick="Staff.createStaff()" class="pull-right btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Thêm</a>
                                {{--<button type="button" class="pull-right btn btn-info btn-sx" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Thêm</button>--}}

                            </div>
                            <div class="col-xs-5"></div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Data Table With Full Features</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Rendering engine</th>
                                <th>Browser</th>
                                <th>Platform(s)</th>
                                <th>Engine version</th>
                                <th>CSS grade</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Rendering engine</th>
                                <th>Browser</th>
                                <th>Platform(s)</th>
                                <th>Engine version</th>
                                <th>CSS grade</th>
                            </tr>
                            </tfoot>
                        </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>

    </section>
@endsection
@section('after_script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
    <script src="{{asset('backend')}}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('backend')}}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="{{asset('backend')}}/bower_components/datatables.net-bs/js/dataTables.fixedHeader.min.js"></script>
    <script src="{{asset('backend')}}/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('backend')}}/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
    <script src="{{asset('static/staff/staff/staff.js')}}"></script>

    {{--<script src="{{asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js?v='.time())}}"></script>--}}
    {{--<script src="{{asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js?v='.time())}}"></script>--}}
    <script>
        $(function () {
            $('#example1').DataTable();
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            });
            $('#form_add_staff').validate({


                rules: {
                    fullname: {
                        required: true
                        //minlength: 5,
                        //maxlength: 10,
                        //email: true
                        //startWithA: true
                    }
                    // customer_email: {
                    //     required: true,
                    //     email: true
                    // },
                    // customer_phone:  {
                    //     required: true,
                    //     number: true,
                    // },
                    // province_id: "required",
                    // district_id: "required",
                    // ward_id:"required",
                    // customer_address:"required",

                },
                messages: {
                    fullname: "Vui lòng nhập họ tên",
                    // customer_email: {
                    //     required: "Vui lòng nhập Email",
                    //     email: "Email không hợp lệ"
                    // },
                    // customer_phone:  {
                    //     required: "Vui lòng nhập số  điện thoại",
                    //     number: "Vui lòng nhập giá trị là number"
                    // },
                    // province_id: "Vui lòng  chọn tỉnh thành",
                    // district_id: "Vui lòng chọn quận huyện",
                    // ward_id: "Vui lòng chọn xã phường",
                    // customer_address:"Vui nhập địa chỉ liên hệ"
                }
            });
        });
        // $('#from_add_staff').submit(function (e) {
        //
        //     e.preventDefault();
        // })


    </script>

@stop