@extends('staff::layouts.master')
@section('after_stylesheet')
    {{--<link rel="stylesheet" href="{{asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css?v'.time())}}">--}}
    {{--<link rel="stylesheet" href="{{asset('backend/bower_components/datatables.net-bs/css/fixedHeader.bootstrap.min.css?v='.time())}}">--}}
    {{--<link rel="stylesheet" href="{{asset('backend/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css?v='.time())}}">--}}
<link rel="stylesheet" href="{{asset('backend/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css?v='.time())}}">
<link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap/dist/css/bootstrap-nav-wizard.css?v='.time())}}">
<link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css?v='.time())}}">

<link rel="stylesheet" href="{{asset('static/css/lib/smartWizard/smart_wizard.min.css?v='.time())}}">
<link rel="stylesheet" href="{{asset('static/css/lib/smartWizard/smart_wizard_theme_circles.min.css?v='.time())}}">
<link rel="stylesheet" href="{{asset('static/css/lib/smartWizard/smart_wizard_theme_arrows.css?v='.time())}}">
<link rel="stylesheet" href="{{asset('static/css/lib/smartWizard/smart_wizard_theme_dots.css?v='.time())}}">
<link rel="stylesheet" href="{{asset('vendor/kartik-v/bootstrap-fileinput/css/fileinput.min.css?v='.time())}}">
    <link rel="stylesheet" href="{{asset('backend/bower_components/select2/dist/css/select2.min.css?v='.time())}}">
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
    <script src="{{asset('static/js/lib/jquery-validate/jquery.validate.min.js?v='.time())}}"></script>

    <script src="{{asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js?v='.time())}}"></script>
    <script src="{{asset('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js?v='.time())}}"></script>
    <script src="{{asset('backend/bower_components/datatables.net-bs/js/dataTables.fixedHeader.min.js?v='.time())}}"></script>
    <script src="{{asset('backend/bower_components/datatables.net-bs/js/dataTables.responsive.min.js?v='.time())}}"></script>
    <script src="{{asset('backend/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js?v='.time())}}"></script>
    <script src="{{asset('backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js?v='.time())}}"></script>
    <script src="{{asset('static/staff/staff/staff.js?v='.time())}}"></script>
    <script src="{{asset('static/js/lib/smartWizard/jquery.smartWizard.min.js?v='.time())}}"></script>
    <script src="{{asset('vendor/kartik-v/bootstrap-fileinput/js/fileinput.min.js?v='.time())}}"></script>
    <script src="{{asset('vendor/kartik-v/bootstrap-fileinput/themes/fa/theme.min.js?v='.time())}}"></script>
    <script src="{{asset('backend/bower_components/select2/dist/js/select2.min.js?v='.time())}}"></script>
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
        });
        $('select.select2').select2({
        });
        // with plugin options
        $("#input-id").fileinput({'showUpload':false, 'previewFileType':'any'});
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            // Toolbar extra buttons
            var btnFinish = $('<button></button>').text('Finish')
                .addClass('btn btn-info')
                .on('click', function(){
                    if( !$(this).hasClass('disabled')){
                        var elmForm = $("#myForm");
                        if(elmForm){
                            elmForm.validator('validate');
                            var elmErr = elmForm.find('.has-error');
                            if(elmErr && elmErr.length > 0){
                                alert('Oops we still have error in the form');
                                return false;
                            }else{
                                alert('Great! we are ready to submit form');
                                elmForm.submit();
                                return false;
                            }
                        }
                    }
                });
            var btnCancel = $('<button></button>').text('Cancel')
                .addClass('btn btn-danger')
                .on('click', function(){
                    $('#smartwizard').smartWizard("reset");
                    $('#myForm').find("input, textarea").val("");
                });
            // Smart Wizard
            $('#smartwizard').smartWizard({
                selected: 0,
                theme: 'dots',
                transitionEffect:'fade',
                toolbarSettings: {toolbarPosition: 'bottom',
                    toolbarExtraButtons: [btnFinish, btnCancel]
                },
                anchorSettings: {
                    markDoneStep: true, // add done css
                    markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                    removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                    enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
                }
            });

            $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
                var elmForm = $("#form-step-" + stepNumber);
                // stepDirection === 'forward' :- this condition allows to do the form validation
                // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
                if(stepDirection === 'forward' && elmForm){
                    elmForm.validator('validate');
                    var elmErr = elmForm.children('.has-error');
                    if(elmErr && elmErr.length > 0){
                        // Form validation failed
                        return false;
                    }
                }
                return true;
            });

            $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
                // Enable finish button only on last step
                if(stepNumber == 3){
                    $('.btn-finish').removeClass('disabled');
                }else{
                    $('.btn-finish').addClass('disabled');
                }
            });
        });
    </script>
@stop