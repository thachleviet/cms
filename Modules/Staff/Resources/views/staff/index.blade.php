@extends('staff::layouts.master')
@section('after_stylesheet')
<link rel="stylesheet" href="{{asset('backend/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css?v='.time())}}">
<link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap/dist/css/bootstrap-nav-wizard.css?v='.time())}}">
<link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css?v='.time())}}">
<link rel="stylesheet" href="{{asset('static/css/lib/smartWizard/smart_wizard.min.css?v='.time())}}">
<link rel="stylesheet" href="{{asset('static/css/lib/smartWizard/smart_wizard_theme_circles.min.css?v='.time())}}">
<link rel="stylesheet" href="{{asset('static/css/lib/smartWizard/smart_wizard_theme_arrows.css?v='.time())}}">
<link rel="stylesheet" href="{{asset('static/css/lib/smartWizard/smart_wizard_theme_dots.css?v='.time())}}">
<link rel="stylesheet" href="{{asset('static/css/lib/multi-select/multi-select.css?v='.time())}}">
<link rel="stylesheet" href="{{asset('vendor/kartik-v/bootstrap-fileinput/css/fileinput.min.css?v='.time())}}">
<link rel="stylesheet" href="{{asset('backend/bower_components/select2/dist/css/select2.min.css?v='.time())}}">
<link rel="stylesheet" href="{{asset('static/css/lib/jquery-confirm/jquery-confirm.min.css?v='.time())}}">
<link rel="stylesheet" href="{{asset('static/css/lib/toastr/toastr.min.css?v='.time())}}">
    <style>
        .box-shadow{
            box-shadow: 1px 1px 3px 1px rgba(152, 33, 33, 0.16), 1px 1px 4px 1px rgba(0,0,0,0.12);
            border-radius: 0;
        }
    </style>
@endsection
@section('title',$title)
@section('content')
    <section class="content-header">
        <h1>
            {{$title}}

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
                    <form id="search-form"  onsubmit="return false">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-8">


                                    <input type="hidden" value="{{ csrf_token() }}">
                                    <div  class=" input-group">

                                        <input type="text" class="form-control" name="keyword" placeholder="Nội dung tìm kiếm..">

                                        <span class=" input-group-btn">
                                            <button onclick="Staff.searchFrom()" class="box-shadow btn btn-warning btn-flat"> <i class="fa fa-search"></i> Tìm kiếm</button>
                                        </span>
                                        <span class="input-group-btn">
                                            <button type="reset" onclick="Staff.reloadForm()" style="margin-left: 10px" class="box-shadow  btn btn-primary"><i class="fa fa-refresh"></i> Refresh</button>
                                        </span>
                                        <span class="input-group-btn">


                                        </span>
                                    </div>



                            </div>
                            <div class="col-xs-4 row">
                                <div class="col-xs-6">
                                    <select onclick="Staff.action()" class=" form-control btn-flat" name="action">
                                        <option  value="" selected >Action </option>
                                        <option value="multi-delete">Delete All</option>
                                        <option value="change-multi-status">Change Status </option>
                                        <option value="active">active</option>
                                        <option value="inactive">inactive</option>
                                    </select>
                                </div>
                                <div class="col-xs-6">

                                    <a onclick="Staff.createStaff()" class="box-shadow  pull-right btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Thêm</a>
                                </div>
                                {{--<button type="button" class="pull-right btn btn-info btn-sx" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Thêm</button>--}}
                            </div>
                            <div class="col-xs-5"></div>
                        </div>
                    </div>
                    </form>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">{{$title}}</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            @include('staff::staff.popup.list')
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
<script src="{{asset('static/js/lib/toastr/toastr.min.js?v='.time())}}"></script>
<script src="{{asset('static/js/lib/jquery-confirm/jquery-confirm.min.js?v='.time())}}"></script>
<script src="{{asset('static/js/lib/multi-select/jquery.multi-select.js?v='.time())}}"></script>
<script src="{{asset('static/js/lib/quicksearch/jquery.quicksearch.js?v='.time())}}"></script>
<script>
    $(function() {
        $('select.select2').select2({
        });
        Staff._init();
    });
    $('.searchable').multiSelect({
        selectableHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='try \"12\"'>",
        selectionHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='try \"4\"'>",
        afterInit: function(ms){
            var that = this,
                $selectableSearch = that.$selectableUl.prev(),
                $selectionSearch = that.$selectionUl.prev(),
                selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
                selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

            that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                .on('keydown', function(e){
                    if (e.which === 40){
                        that.$selectableUl.focus();
                        return false;
                    }
                });

            that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                .on('keydown', function(e){
                    if (e.which == 40){
                        that.$selectionUl.focus();
                        return false;
                    }
                });
        },
        afterSelect: function(){
            this.qs1.cache();
            this.qs2.cache();
        },
        afterDeselect: function(){
            this.qs1.cache();
            this.qs2.cache();
        }
    });
</script>

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@stop