$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var Staff = {
     oTable : $('#example1').DataTable({
        dom: "<'row'<'col-xs-12'<'col-xs-6'l><'col-xs-6'p>>r>"+
        "<'row'<'col-xs-12't>>"+
        "<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: laroute.route('staff.get-list-staff'),
            data: function (d) {
                d.keyword = $('input[name=keyword]').val();
                d.status  = $('select[name=action]').val();
            },
            method: 'POST'
        },
        columns: [
            { data: 'rownum', name: 'rownum',orderable: false, searchable: false},
            { data: 'staff_full_name', name: 'staff_full_name' },
            { data: 'staff_email', name: 'staff_email' },
            { data: 'staff_phone', name: 'staff_phone' },
            { data: 'is_active', name: 'is_active', searchable: false},
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action',searchable: false, orderable: false},
        ],

    }),
    _init:function(){
       // this.listItem();
    },
    listItem:function () {
        this.oTable.draw();
    },
    searchFrom:function(){
        $('#search-form').on('submit', function(e) {
            e.preventDefault();
            $.post(laroute.route('staff.get-list-staff'),{keyword:$('input[name=keyword]').val()}, function () {
                $('#example1').DataTable().ajax.reload();
            });

        });
    },
    submitAdd : function(e){
        $('#form_add_staff').validate({
            rules: {
                staff_first_name : {
                    required:true
                },
                staff_last_name:{
                    required : true
                },
                staff_email:{
                    required : true
                },
                staff_phone:{
                    required : true
                }
            },
            messages: {
                staff_first_name: "Vui lòng nhập first name",
                staff_last_name: "Vui lòng nhập last name",
                staff_email: {
                    required: "Vui lòng nhập Email",
                    email: "Email không hợp lệ"
                },
                staff_phone:  {
                    required: "Vui lòng nhập số  điện thoại",
                    number: "Vui lòng nhập giá trị là number"
                },

            }
        });
        $('#form_add_staff').submit( function(e) {

            // e.preventDefault();
            $(this).removeAttr("disabled");
            if (!$('#form_add_staff').valid()) {

                return false;
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var datas = new FormData();

            //Form data
            var form_data = $('#form_add_staff').serializeArray();
            $.each(form_data, function (key, input) {
                datas.append(input.name, input.value);
            });
            //File data
            var file_data = $('input[name="staff_avatar"]')[0].files;
            for (var i = 0; i < file_data.length; i++) {
                datas.append("staff_avatar", file_data[i]);
            }

            $.ajax({
                url: laroute.route('staff.create-staff'),
                type: "post",
                processData: false,
                contentType: false,
                data: datas,
                success: function(data) {
                    var error_staff  =  $('#error_staff');
                    error_staff.empty();
                    if(data.errors){
                        let error  = '' ;
                        $.each(data.errors, function (k,v) {
                            console.log(k);
                            error += ''+v+'</br>' ;
                        });
                        let  xhtml  = '<div class="alert alert-danger alert-dismissible fade in">\n' +
                            '    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>\n' +
                            '    <strong>'+error+'</strong> ' +
                            '  </div>';
                        $('#error_staff').empty().append(xhtml)
                    }
                    if(data.status){
                        $('#example1').DataTable().ajax.reload();
                        $('#myModal').modal('toggle') ;
                        toastr.success(data.messages,null, {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-bottom-left",
                            "preventDuplicates": true,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        });
                    }
                }
            });
        });
    },
    submitEdit : function(e){
        $('#form_add_staff').validate({
            rules: {
                staff_first_name : {
                    required:true
                },
                staff_last_name:{
                    required : true
                },
                staff_email:{
                    required : true
                },
                staff_phone:{
                    required : true
                }
            },
            messages: {
                staff_first_name: "Vui lòng nhập first name",
                staff_last_name: "Vui lòng nhập last name",
                staff_email: {
                    required: "Vui lòng nhập Email",
                    email: "Email không hợp lệ"
                },
                staff_phone:  {
                    required: "Vui lòng nhập số  điện thoại",
                    number: "Vui lòng nhập giá trị là number"
                },

            }
        });
        $('#form_add_staff').submit( function(e) {

            // e.preventDefault();
            $(this).removeAttr("disabled");
            if (!$('#form_add_staff').valid()) {

                return false;
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var datas = new FormData();

            //Form data
            var form_data = $('#form_add_staff').serializeArray();
            $.each(form_data, function (key, input) {
                datas.append(input.name, input.value);
            });
            //File data
            var file_data = $('input[name="staff_avatar"]')[0].files;
            for (var i = 0; i < file_data.length; i++) {
                datas.append("staff_avatar", file_data[i]);
            }

            $.ajax({
                url: laroute.route('staff.update-staff'),
                type: "post",
                processData: false,
                contentType: false,
                data: datas,
                success: function(data) {
                    var error_staff  =  $('#error_staff');
                    error_staff.empty();
                    if(data.errors){
                        let error  = '' ;
                        $.each(data.errors, function (k,v) {
                            console.log(k);
                            error += ''+v+'</br>' ;
                        });
                        let  xhtml  = '<div class="alert alert-danger alert-dismissible fade in">\n' +
                            '    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>\n' +
                            '    <strong>'+error+'</strong> ' +
                            '  </div>';
                        $('#error_staff').empty().append(xhtml)
                    }
                    if(data.status){
                        $('#example1').DataTable().ajax.reload();
                        $('#myModal').modal('toggle') ;

                        // e.preventDefault();
                        toastr.success(data.messages,null, {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-bottom-left",
                            "preventDuplicates": true,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        });

                        // location.reload();
                    }
                }
            });
        });
    },
    createStaff:function () {
        let modalElement  = '#myModal';
        $.get(laroute.route('staff.create'), function (data) {
            $(modalElement).html(data);
            $(modalElement).modal('show');

        })
    },
    reloadForm:function () {
        $('#search-form')[0].reset();
         this.listItem() ;
    },
    updateStaff:function (object,  $id){
         let modalElement  = '#myModal';
         $.get(laroute.route('staff.edit',{id:$id}), function (data) {
             $(modalElement).html(data);
             $(modalElement).modal('show');
         })
    },
    changeStatus : function (obj , $id, $is_active) {
        $.alert({
            icon: 'fa fa-question',
            theme: 'modern',
            closeIcon: true,
            animation: 'scale',
            type: 'orange',
            title: 'Bạn có chắc thay đổi trạng thái  ? ',
            buttons: {
                confirm: {
                    text: 'Đồng ý',
                    btnClass: 'btn-danger',
                    action: function () {
                        $.post(laroute.route('staff.change-status-staff',{is_active:$is_active, id: $id}), function (data) {
                            if(data.status){
                                $('#example1').DataTable().ajax.reload();
                                toastr.success(data.messages,null, {
                                    "closeButton": true,
                                    "debug": false,
                                    "newestOnTop": false,
                                    "progressBar": true,
                                    "positionClass": "toast-bottom-left",
                                    "preventDuplicates": true,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                });
                            }else {
                                toastr.warning(data.messages,null, {
                                    "closeButton": true,
                                    "debug": false,
                                    "newestOnTop": false,
                                    "progressBar": true,
                                    "positionClass": "toast-bottom-left",
                                    "preventDuplicates": true,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                });
                            }
                        })
                    }
                },
                cancel: {
                    text: 'THOÁT'
                },
            }
        });
    },
    remove:function (object,  $id){
        $.alert({
            icon: 'fa fa-question',
            theme: 'modern',
            closeIcon: true,
            animation: 'scale',
            type: 'orange',
            title: 'Bạn có muốn xóa!',
            buttons: {
                confirm: {
                    text: 'Đồng ý',
                    btnClass: 'btn-danger',
                    action: function () {
                        $.get(laroute.route('staff.destroy-staff',{id:$id}), function (data) {
                            if(data.status){
                                $('#example1').DataTable().ajax.reload();
                                toastr.success(data.messages,null, {
                                    "closeButton": true,
                                    "debug": false,
                                    "newestOnTop": false,
                                    "progressBar": true,
                                    "positionClass": "toast-bottom-left",
                                    "preventDuplicates": true,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                });
                            }else {
                                toastr.warning(data.messages,null, {
                                    "closeButton": true,
                                    "debug": false,
                                    "newestOnTop": false,
                                    "progressBar": true,
                                    "positionClass": "toast-bottom-left",
                                    "preventDuplicates": true,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                });
                            }
                        })
                    }
                },
                cancel: {
                    text: 'THOÁT'
                },
            }
        });
    },
    action:function () {
        var elementAction  = $('select[name=action]') ;
        elementAction.change(function () {
            if(elementAction.val() === 'multi-delete' || elementAction.val() === 'change-multi-status'){
                let modalElement  = '#myModal';
                $.get(laroute.route('staff.show-action-change'), {action : elementAction.val()}, function (data) {
                    $(modalElement).html(data);
                    $(modalElement).modal('show');
                })
            }else {
                if(elementAction.val() === 'inactive' || elementAction.val() === 'active' ){
                    $.post(laroute.route('staff.get-list-staff'), {status : elementAction.val()}, function (data) {
                        $('#example1').DataTable().ajax.reload();
                    })
                }
            }
        })
    }
};
