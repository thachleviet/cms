@extends('backend.layouts.master')

@section('after_stylesheet')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('static/css/lib/bs-iconpicker/bootstrap-iconpicker.min.css?v='.time())}}">
    <link rel="stylesheet" href="{{asset('vendor/kartik-v/bootstrap-fileinput/css/fileinput.min.css?v='.time())}}">
    <style>
        .box-shadow{
            box-shadow: 1px 1px 3px 1px rgba(152, 33, 33, 0.16), 1px 1px 4px 1px rgba(0,0,0,0.12);
            border-radius: 0;
        }

        div.kv-avatar .krajee-default.file-preview-frame,.kv-avatar .krajee-default.file-preview-frame:hover {
            margin: 0;
            padding: 0;
            border: none;
            box-shadow: none;
            text-align: center;
        }
        div.kv-avatar {
            display: inline-block;
        }
        div.kv-avatar .file-input {
            display: table-cell;
            width: 213px;
        }
        .kv-reqd {
            color: red;
            font-family: monospace;
            font-weight: normal;
        }


        .checkbox, .radio {
            margin: 10px;
        }
        .checkbox, .radio {
            position: relative;
        }

        /*CONTENT CSS INPUT RADIO*/
        .label-check label {
            padding-left: 20px;
        }
        .label-check input[type="radio"],
        .label-check input[type="checkbox"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            opacity: 0;
            position: absolute;
            margin: 0;
            z-index: -1;
            width: 0;
            height: 0;
            overflow: hidden;
            left: 0;
            pointer-events: none;
        }
        .label-check input[type="radio"]:focus {
            outline: none;
        }
        .label-check input[type="radio"] + label:before,
        .label-check input[type="radio"] + label:after {
            content: "";
            display: block;
            position: absolute;
            left: -10px;
            top: 1px;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            -webkit-transition: 240ms;
            -o-transition: 240ms;
            transition: 240ms;
        }
        .label-check input[type="radio"] + label:before {
            /*left: -8px;*/
            /*top: 3px;*/
        }
        .label-check input[type="radio"] + label:before {
            background-color: #2196f3;
            -webkit-transform: scale(0);
            -ms-transform: scale(0);
            -o-transform: scale(0);
            transform: scale(0);
        }
        .label-check input[type="radio"] + label:after{
            top: 1px;
            border: 2px solid #f1b306;
            z-index:1;
        }
        .label-check input[type="radio"]:checked + label:before {
            -webkit-transform: scale(0.6);
            -ms-transform: scale(0.6);
            -o-transform: scale(0.6);
            transform: scale(0.6);
        }
        .label-check input[type="radio"]:disabled:checked + label:before {
            background-color: #bbbbbb;
        }
        .label-check input[type="radio"]:checked + label:after {
            border: 2px solid #f1b306;
        }
        .label-check input[type="radio"]:disabled + label:after,
        .label-check  input[type="radio"]:disabled:checked + label:after {
            border-color: #bbbbbb;
        }
        .label-check input[type="checkbox"]:focus {
            outline: none;
        }
        .label-check input[type="checkbox"]:focus + label:after{
            border-color: #2196f3;
        }
        .label-check input[type="checkbox"] + label:after {
            content: "";
            position: absolute;
            top: 2px;
            left: -10px;
            display: block;
            width: 18px;
            height: 18px;
            margin-top: -2px;
            margin-right: 5px;
            border: 2px solid #666666;
            border-radius: 2px;
            -webkit-transition: 240ms;
            -o-transition: 240ms;
            transition: 240ms;
        }
        .label-check input[type="checkbox"]:checked + label:before {
            content: "";
            position: absolute;
            top: 2px;
            left: -3px;
            display: table;
            width: 6px;
            height: 12px;
            border: 2px solid #fff;
            border-top-width: 0;
            border-left-width: 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            -o-transform: rotate(45deg);
            transform: rotate(45deg);
            z-index:1;
        }
        .label-check input[type="checkbox"]:checked + label:after{
            background-color: #2196f3;
            border-color: #2196f3;
        }
        .label-check input[type="checkbox"]:disabled + label:after {
            border-color: #bbbbbb;
        }
        .label-check  input[type="checkbox"]:disabled:checked + label:after {
            background-color: #bbbbbb;
            border-color: transparent;
        }

        .modal-header {
            border-bottom-color: #f4f4f4;
            background: #f39c12;
            color: white;
            box-shadow: 0 2px 5px 0 rgba(152, 33, 33, 0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
        }

    </style>
@endsection
@section('title',$title)
@section('content')


    <div class="col-sm-12">
        <div class="row">
            <div class="col-md-12"><h2>{{$title}}</h2></div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <button id="btnOut" type="button" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Lưu </button>
                        <div class="pull-right">
                            <button id="btnReload" type="button" class="btn btn-default">
                                <i class="glyphicon glyphicon-triangle-right"></i> Hiển thị danh sách thể loại</button>
                        </div>
                    </div>
                    <div class="panel-body" id="cont">

                        <ul id="myEditor" class="sortableLists list-group">

                        </ul>
                    </div>
                </div>

                <div class="form-group"><textarea id="out" class="form-control" cols="50" rows="10"></textarea>
                </div>
            </div>
            <div class="col-md-7">
                <div class="panel panel-primary">
                    <div class="panel-heading">Edit item</div>
                    <div class="panel-body">
                        <form id="frmEdit" class="form-horizontal">
                            <div class="form-group">
                                <label for="text" class="col-sm-3 control-label">Tên thể loại</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control item-menu" name="category_name" id="category_name" placeholder="Tên thể loại">
                                        <div class="input-group-btn">
                                            <button type="button" id="myEditor_icon" class="btn btn-default" data-iconset="fontawesome"></button>
                                        </div>
                                        <input type="hidden" name="icon" class="item-menu">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-sm-3 control-label">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" name="category_title" class="form-control item-menu" id="category_title" placeholder="Title">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="title" class="col-sm-3 control-label">Hinh anh</label>
                                <div class="col-sm-9">
                                    <div class="kv-avatar">
                                        <div class="file-loading">
                                            <input id="avatar-2" name="category_image" type="file" multiple="multiple">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer">
                        <button type="button" id="btnUpdate" class="btn btn-primary" disabled><i class="fa fa-refresh"></i> Cập nhật</button>
                        <button type="button" id="btnAdd" class="btn btn-success"><i class="fa fa-plus"></i> Thêm</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('after_script')
    {{--<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>--}}
    <script src="{{asset('backend/bower_components/select2/dist/js/select2.min.js?v='.time())}}"></script>
    <script src="{{asset('static/js/lib/bs-iconpicker/iconset/iconset-fontawesome-4.7.0.min.js?v='.time())}}"></script>
    <script src="{{asset('static/js/lib/bs-iconpicker/bootstrap-iconpicker.js?v='.time())}}"></script>
    <script src="{{asset('static/js/lib/bs-iconpicker/jquery-menu-editor.js?v='.time())}}"></script>
    <script src="{{asset('vendor/kartik-v/bootstrap-fileinput/js/fileinput.min.js?v='.time())}}"></script>
    <script src="{{asset('vendor/kartik-v/bootstrap-fileinput/themes/fa/theme.min.js?v='.time())}}"></script>
    <script>
        jQuery(document).ready(function () {
            // menu items
            var strjson = [
                {"category_id" :"1","icon":"fa fa-home","category_name":"Home", "category_title": "My Home"},{"category_id" :"2","icon":"fa fa-bar-chart-o","category_name":"Opcion2"},{"category_id" :"3","icon":"fa fa-cloud-upload","category_name":"Opcion3"},{"category_id" :"4","icon":"fa fa-crop","category_name":"Opcion4"},{"category_id" :"5","icon":"fa fa-flask","category_name":"Opcion5"},{"category_id" :"6","icon":"fa fa-map-marker","category_name":"Opcion6"},{"category_id" :"7","icon":"fa fa-search","category_name":"Opcion7","children":[{"category_id" :"8","icon":"fa fa-plug","category_name":"Opcion7-1","children":[{"category_id" :"9","icon":"fa fa-filter","category_name":"Opcion7-1-1"}]}]}];
            //icon picker options
            var iconPickerOptions = {searchText: 'Buscar...', labelHeader: '{0} de {1} Pags.'};
            //sortable list options
            var sortableListOptions = {
                placeholderCss: {'background-color': 'cyan'}
            };
            var editor = new MenuEditor('myEditor', {
                listOptions: sortableListOptions,
                iconPicker: iconPickerOptions,
                labelEdit: 'Edit'
            });
            editor.setForm($('#frmEdit'));
            editor.setUpdateButton($('#btnUpdate'));

            $('#btnReload').on('click', function () {
                editor.setData(strjson);
            });
            $('#btnOut').on('click', function () {
                var str = editor.getString();
                console.log(str);
                $("#out").text(str);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.post(laroute.route('category.update-category'),{category:str}, function (data) {
                    
                })
            });
            $("#btnUpdate").click(function(){
                editor.update();
            });
            $('#btnAdd').click(function(){
                editor.add();
            });
        });
    </script>

    <script>
        $(function() {
            $('select.select2').select2({
            });
        });
        var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' +
            'onclick="alert(\'Call your custom code here.\')">' +
            '<i class="glyphicon glyphicon-tag"></i>' +
            '</button>';
        $("#avatar-2").fileinput({
            // uploadUrl:'/uploads/avatar/',
            overwriteInitial: true,
            maxFileSize: 1500,
            showUpload:false,
            initialPreview:[
                // IMAGE DATA
                // 'https://placeimg.com/800/460/any',
                // IMAGE RAW MARKUP
{{--                '<img src="{{asset('uploads/avatar/01529922888_25_06_2018_images.jpg')}}" class="kv-preview-data file-preview-image">',--}}
                // PDF DATA
                // 'http://kartik-v.github.io/bootstrap-fileinput-samples/samples/pdf-sample.pdf',
                // // VIDEO DATA
                // "http://kartik-v.github.io/bootstrap-fileinput-samples/samples/small.mp4"
            ],
            showClose: false,
            showCaption: false,
            showBrowse: true,
            browseOnZoneClick: true,
            removeLabel: '',
            removeIcon: '<i class="glyphicon glyphicon-remove"> Xóa</i>',
            removeTitle: 'Cancel or reset changes',
            elErrorContainer: '#kv-avatar-errors-2',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: '<img src="{{asset('uploads/image-category.png')}}" alt="Thể loại" width="300px" height="200px"><h6 class="text-muted">Chọn hình ảnh</h6>',
            layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
            allowedFileExtensions: ["jpg", "png", "gif"]
        });
    </script>
@stop