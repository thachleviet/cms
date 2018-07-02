<style>
    .kv-avatar .krajee-default.file-preview-frame,.kv-avatar .krajee-default.file-preview-frame:hover {
        margin: 0;
        padding: 0;
        border: none;
        box-shadow: none;
        text-align: center;
    }
    .kv-avatar {
        display: inline-block;
    }
    .kv-avatar .file-input {
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
    .box-shadow{
        box-shadow: 2px 2px 5px 2px rgba(152, 33, 33, 0.16), 2px 2px 7px 2px rgba(0,0,0,0.12);
        border-radius: 0;
    }
</style>
<div class="modal-dialog modal-lg" >
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title colorpicker-alpha"><i class="fa fa-th"></i> {{$_title}} </h4>
        </div>
        <form id="form_add_staff"  method="post"  onsubmit="return false">
        <div class="modal-body">
            <ul  class="nav nav-wizard">
                <li class="active " >
                    <a  href="#1b" data-toggle="tab">Thông tin</a>
                </li>
                <li><a href="#2b" data-toggle="tab">Hình đại diện </a>
                </li>
                {{--<li><a href="#3b" data-toggle="tab">Applying clearfix</a>--}}
                {{--</li>--}}
                {{--<li><a href="#4a" data-toggle="tab">Background color</a>--}}
                {{--</li>--}}
            </ul>
            <div class="tab-content clearfix" style="position: relative">
                <div class="tab-pane active" id="1b">
                    <section>
                        <div class="content-tap" style="padding-top: 20px">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="first_name">First Name <span style="color: red"> * </span></label>

                                    <input type="text" class="form-control"  id="first_name" name="first_name"  placeholder="Enter first name">
                                    <small  class="form-text text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name <span style="color: red"> * </span></label>
                                    <input type="text" class="form-control" name="last_name"  placeholder="Enter last name">
                                    <small id="last_name" class="form-text text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address <span style="color: red"> * </span></label>
                                    <input type="email" class="form-control" name="email"  placeholder="Enter email">
                                    <small id="email" class="form-text text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone <span style="color: red"> * </span></label>
                                    <input type="text" class="form-control" name="phone" placeholder="Enter phone">
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="tab-pane" id="2b">
                    <section>
                        <div class="content-tap" style="padding-top: 20px">
                            <div class="col-sm-4 text-center">
                                <div class="kv-avatar">
                                    <div class="file-loading">
                                        <input id="avatar-2" name="avatar-2" type="file" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-3" for="first_name">Giới tính <span style="color: red"> * </span></label>
                                        <div class="col-sm-9 input-group">
                                            <div class="label-check col-sm-12">
                                                <div class=" col-sm-3" >
                                                    <input type="radio" name="gender" id="radio1_Opt1" value="1" checked>
                                                    <label for="radio1_Opt1">Nam</label>
                                                </div>
                                                <div class=" col-sm-3">
                                                    <input type="radio" name="gender" id="radio1_Opt2" value="0" >
                                                    <label for="radio1_Opt2">Nữ</label>
                                                </div>
                                                <div class=" col-sm-3">
                                                    <input type="radio" name="gender" id="radio1_Opt3" value="0" >
                                                    <label for="radio1_Opt3">Khác</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-3" for="first_name">Ngày sinh <span style="color: red"> * </span></label>

                                        <div class="col-sm-9 input-group date" data-provide="datepicker" data-date-format="dd-mm-yyyy">
                                            <input type="text"  name="staff_birthday" value="{{date('d-m-Y')}}" class="form-control ">
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                        </div>
                                        <small  class="form-text text-muted"></small>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-3" for="first_name">Trạng thái </label>
                                        <div class="col-sm-9 input-group">
                                            <div class="label-check col-sm-12">
                                                <div class=" col-sm-3" >
                                                    <input type="radio" name="is_active"  id="radio1_Opt4" value="1" checked>
                                                    <label for="radio1_Opt4">Active</label>
                                                </div>
                                                <div class=" col-sm-3">
                                                    <input type="radio" name="is_active" id="radio1_Opt5" value="0" >
                                                    <label for="radio1_Opt5">Unactive</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-3" for="first_name">Group <span style="color: red"> * </span></label>
                                        <div class="col-sm-9 input-group">
                                            <select class="form-control select2" name="group_id">
                                                <option value="">Nhóm admin</option>
                                                <option value="">Nhóm quản lý</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-3" for="first_name">Ghi chú </label>
                                        <div class="col-sm-9 input-group">
                                            <textarea  class="form-control " name="staff_description" style="min-height: 100px"> </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                {{--<div class="tab-pane" id="3b">--}}
                    {{--<h3>We applied clearfix to the tab-content to rid of the gap between the tab and the content</h3>--}}
                {{--</div>--}}
                {{--<div class="tab-pane" id="4b">--}}
                    {{--<h3>We use css to change the background color of the content to be equal to the tab</h3>--}}
                {{--</div>--}}
            </div>
        </div>
        <div class="modal-footer">
            {{--<nav class="navbar btn-toolbar sw-toolbar sw-toolbar-bottom text-center">--}}
                {{--<div class="btn-group navbar-btn sw-btn-group-extra pull-c" role="group">--}}

                 {{--</div>--}}
            {{--<div class="btn-group navbar-btn sw-btn-group pull-right" role="group">--}}
            {{--<button class="btn btn-default sw-btn-prev" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>--}}
            {{--<button class="btn btn-default sw-btn-next" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>--}}
            {{--</div>--}}
            {{--</nav>--}}
            <div class="col-sm-offset-4 col-sm-4">
                <button type="submit"  id="registerButtonModal" class="btn btn-success box-shadow"><i class="fa fa-save"></i> Lưu</button>
                <button class="btn btn-danger box-shadow" type="reset"><i class="fa fa-reply-all" aria-hidden="true"></i> Refresh</button>
                <button class="btn btn-warning box-shadow" data-dismiss="modal" aria-label="Close"><i class="fa fa-close" aria-hidden="true"></i> Close</button>
            </div>



        </div>
        </form>
    </div>

</div>
<script>
    $(document).ready(function() {
        orderSubmit._init() ;
        $('.datepicker').datepicker({
            format: 'dd-mm-yy'
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
            '<img src="{{asset('uploads/avatar/01529922888_25_06_2018_images.jpg')}}" class="kv-preview-data file-preview-image">',
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
        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors-2',
        msgErrorClass: 'alert alert-block alert-danger',
        defaultPreviewContent: '<img src="{{asset('uploads/avatar/default_avatar_male.jpg')}}" alt="Your Avatar"><h6 class="text-muted">Click to select</h6>',
        layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png", "gif"]
    });
</script>