<style>


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
    .ms-container{
        width: 500px !important;
    }
</style>
<div class="modal-dialog" >
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title colorpicker-alpha"><i class="fa fa-th"></i> {{$_title}} </h4>
        </div>
        <form id="form_add_staff"  method="post"  onsubmit="return false" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-sm-offset-1">
                        <a href='#' id='select-all'>select all</a>
                        <a href='#' id='deselect-all'>deselect all</a>
                        <select id='custom-headers' multiple='multiple' class="form-control  searchable" width="100%">
                            <option value='elem_1'>elem 1 elem 1 elem 1 elem 1elem 1</option>
                            <option value='elem_2'>elem 2</option>
                            <option value='elem_3'>elem 3</option>
                            <option value='elem_4'>elem 4</option>

                            ...
                            <option value='elem_100'>elem 100</option>
                        </select>
                    </div>

                </div>


            </div>
            <div class="modal-footer">
                <div class="col-sm-7 col-sm-offset-2">
                    <button type="submit"  id="registerButtonModal" class="btn btn-success box-shadow"><i class="fa fa-save"></i> Lưu</button>
                    <button class="btn btn-danger box-shadow" type="reset"><i class="fa fa-reply-all" aria-hidden="true"></i> Refresh</button>
                    <button class="btn btn-warning box-shadow" data-dismiss="modal" aria-label="Close"><i class="fa fa-close" aria-hidden="true"></i> Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>

    $(function() {

        $('select.select2').select2({
        });

        Staff._init();
        // Staff.searchFrom();
    });
    $('#select-all').click(function(){
        $('.searchable').multiSelect('select_all');
        return false;
    });
    $('#deselect-all').click(function(){
        $('.searchable').multiSelect('deselect_all');
        return false;
    });

    $('.searchable').multiSelect({
        selectableHeader: "<input type='text'  class=' form-control search-input' autocomplete='off' style='margin-bottom: 5px' placeholder='try \"12\"'>",
        selectionHeader: "<input type='text' class=' form-control search-input' autocomplete='off' style='margin-bottom: 5px' placeholder='try \"4\"'>",
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