@extends('staff::layouts.master')
@section('after_stylesheet')
    {{--<link rel="stylesheet" href="{{asset('backend/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css?v='.time())}}">--}}
    {{--<link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap/dist/css/bootstrap-nav-wizard.css?v='.time())}}">--}}
    {{--<link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css?v='.time())}}">--}}
    <link rel="stylesheet" href="{{asset('static/css/lib/multi-select/multi-select.css?v='.time())}}">
    <link rel="stylesheet" href="{{asset('backend/bower_components/select2/dist/css/select2.min.css?v='.time())}}">
    <link rel="stylesheet" href="{{asset('static/css/lib/jquery-confirm/jquery-confirm.min.css?v='.time())}}">
    <link rel="stylesheet" href="{{asset('static/css/lib/toastr/toastr.min.css?v='.time())}}">

    <link rel="stylesheet" href="{{asset('static/css/lib/bootstrap-iconpicker/bootstrap-iconpicker.min.css?v='.time())}}">
    <style>
        .box-shadow{
            box-shadow: 1px 1px 3px 1px rgba(152, 33, 33, 0.16), 1px 1px 4px 1px rgba(0,0,0,0.12);
            border-radius: 0;
        }
    </style>
@endsection
@section('title',$title)
@section('content')
    <div class="col-sm-12">
        <div class="jquery-script-ads" align="center">
            </div>
        <div class="row">
            <div class="col-md-12">
                <h3>jQuery Bootstrap Menu Editor Demo</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">Edit item</div>
                    <div class="panel-body">
                        <form id="frmEdit" class="form-horizontal">
                            <input type="hidden" name="mnu_icon" id="mnu_icon">
                            <div class="form-group">
                                <label for="mnu_text" class="col-sm-2 control-label">Text</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="mnu_text" name="mnu_text" placeholder="Text">
                                        <div class="input-group-btn">
                                            <button id="mnu_iconpicker" class="btn btn-default" data-iconset="fontawesome" data-icon="" type="button"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mnu_href" class="col-sm-2 control-label">URL</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="mnu_href" name="mnu_href" placeholder="URL">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mnu_target" class="col-sm-2 control-label">Target</label>
                                <div class="col-sm-10">
                                    <select id="mnu_target" name="mnu_target" class="form-control">
                                        <option value="_self">Self</option>
                                        <option value="_blank">Blank</option>
                                        <option value="_top">Top</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mnu_title" class="col-sm-2 control-label">Tooltip</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="mnu_title" name="mnu_title" placeholder="Text">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer">
                        <button type="button" id="btnUpdate" class="btn btn-primary" disabled><i class="fa fa-refresh"></i> Update</button>
                        <button type="button" id="btnAdd" class="btn btn-success"><i class="fa fa-plus"></i> Add</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <h5 class="pull-left">Menu</h5>
                        <div class="pull-right">
                            <button id="btnOut" type="button" class="btn btn-success"> <i class="glyphicon glyphicon-ok"></i> Save</button>
                        </div>
                    </div>
                    <div class="panel-body" id="cont">
                        <ul id="myList" class="sortableLists list-group">
                            <li class="list-group-item" data-text="Home" data-icon="fa-home"
                                data-href="http://home.com">
                                <div><i class="fa fa-home"></i> <span class="txt">Home</span>
                                    <div class="btn-group pull-right"> <a href="#" class="btn btn-default btn-xs btnEdit">Edit</a> <a href="#" class="btn btn-danger btn-xs btnRemove">X</a> </div>
                                </div>
                            </li>
                            <li class="list-group-item" data-text="Option 2" data-icon="fa-bar-chart-o">
                                <div><i class="fa fa-bar-chart-o"></i> <span class="txt">Option 2</span>
                                    <div class="btn-group pull-right"> <a href="#" class="btn btn-default btn-xs btnEdit">Edit</a> <a href="#" class="btn btn-danger btn-xs btnRemove">X</a> </div>
                                </div>
                            </li>
                            <li class="list-group-item" data-text="Option 3" data-icon="fa-cloud-upload">
                                <div><i class="fa fa-cloud-upload"></i> <span class="txt">Option 3</span>
                                    <div class="btn-group pull-right"> <a href="#" class="btn btn-default btn-xs btnEdit">Edit</a> <a href="#" class="btn btn-danger btn-xs btnRemove">X</a> </div>
                                </div>
                            </li>
                            <li class="list-group-item" data-text="Option 4" data-icon="fa-crop">
                                <div><i class="fa fa-crop"></i> <span class="txt">Option 4</span>
                                    <div class="btn-group pull-right"> <a href="#" class="btn btn-default btn-xs btnEdit">Edit</a> <a href="#" class="btn btn-danger btn-xs btnRemove">X</a> </div>
                                </div>
                            </li>
                            <li class="list-group-item" data-text="Option 5" data-icon="fa-flask">
                                <div><i class="fa fa-flask"></i> <span class="txt">Option 5</span>
                                    <div class="btn-group pull-right"> <a href="#" class="btn btn-default btn-xs btnEdit">Edit</a> <a href="#" class="btn btn-danger btn-xs btnRemove">X</a> </div>
                                </div>
                            </li>
                            <li class="list-group-item" data-text="Option 6" data-icon="fa-map-marker">
                                <div><i class="fa fa-map-marker"></i> <span class="txt">Option 6</span>
                                    <div class="btn-group pull-right"> <a href="#" class="btn btn-default btn-xs btnEdit">Edit</a> <a href="#" class="btn btn-danger btn-xs btnRemove">X</a> </div>
                                </div>
                            </li>
                            <li class="list-group-item" data-text="Option 7" data-icon="fa-search">
                                <div><i class="fa fa-search"></i> <span class="txt">Option 7</span>
                                    <div class="btn-group pull-right"> <a href="#" class="btn btn-default btn-xs btnEdit">Edit</a> <a href="#" class="btn btn-danger btn-xs btnRemove">X</a> </div>
                                </div>
                                <ul>
                                    <li class="list-group-item" data-text="Option 7-1" data-icon="fa-plug">
                                        <div><i class="fa fa-plug"></i> <span class="txt">Option 7-1</span>
                                            <div class="btn-group pull-right"> <a href="#" class="btn btn-default btn-xs btnEdit">Edit</a> <a href="#" class="btn btn-danger btn-xs btnRemove">X</a> </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item" data-text="Option 7-2" data-icon="fa-filter">
                                        <div><i class="fa fa-filter"></i> <span class="txt">Option 7-2</span>
                                            <div class="btn-group pull-right"> <a href="#" class="btn btn-default btn-xs btnEdit">Edit</a> <a href="#" class="btn btn-danger btn-xs btnRemove">X</a> </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <label for="out">Output:</label>
                <textarea id="out" class="form-control" cols="50" rows="10"></textarea>
            </div>
        </div>
        <div>
            <div class="col-md-6"></div>
        </div>
    </div>
@endsection

@section('after_script')
    <script src="{{asset('static/js/lib/jquery-validate/jquery.validate.min.js?v='.time())}}"></script>
    {{--<script src="{{asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js?v='.time())}}"></script>--}}
    {{--<script src="{{asset('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js?v='.time())}}"></script>--}}
    {{--<script src="{{asset('backend/bower_components/datatables.net-bs/js/dataTables.fixedHeader.min.js?v='.time())}}"></script>--}}
    {{--<script src="{{asset('backend/bower_components/datatables.net-bs/js/dataTables.responsive.min.js?v='.time())}}"></script>--}}
    {{--<script src="{{asset('backend/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js?v='.time())}}"></script>--}}
    {{--<script src="{{asset('backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js?v='.time())}}"></script>--}}
    <script src="{{asset('static/js/lib/toastr/toastr.min.js?v='.time())}}"></script>
    <script src="{{asset('backend/bower_components/select2/dist/js/select2.min.js?v='.time())}}"></script>
    <script src="{{asset('static/js/lib/jquery-confirm/jquery-confirm.min.js?v='.time())}}"></script>
    <script src="{{asset('static/js/lib/multi-select/jquery.multi-select.js?v='.time())}}"></script>
    <script src="{{asset('static/js/lib/quicksearch/jquery.quicksearch.js?v='.time())}}"></script>
    <script src="{{asset('static/js/lib/jquery-menu-editor/jquery-menu-editor.js?v='.time())}}"></script>
    <script src="{{asset('static/js/lib/bootstrap-iconpicker/bootstrap-iconpicker.min.js?v='.time())}}"></script>
    <script>
        jQuery(document).ready(function () {
            var iconPickerOpt = {cols: 5,  footer: false};
            var options = {
                hintCss: {'border': '1px dashed #13981D'},
                placeholderCss: {'background-color': 'gray'},
                ignoreClass: 'btn',
                opener: {
                    active: true,
                    as: 'html',
                    close: '<i class="fa fa-minus"></i>',
                    open: '<i class="fa fa-plus"></i>',
                    openerCss: {'margin-right': '10px'},
                    openerClass: 'btn btn-success btn-xs'
                }
            };
            menuEditor('myList', {listOptions: options, iconPicker: iconPickerOpt, labelEdit: 'Edit', labelRemove: 'X'});
        });
    </script>

    <script>
        $(function() {
            $('select.select2').select2({
            });

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