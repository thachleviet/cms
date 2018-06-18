var Staff = {

    createStaff:function () {
        let modalElement  = '#myModal';
        $.get(laroute.route('staff.create'), function (data) {
            $(modalElement).html(data);
            $(modalElement).modal('show');

        })
    },
};

var orderSubmit = {

    _init : function(){

        // preventDefault;
        $('#form_add_staff').validate({
            rules: {
                first_name : {
                    required:true
                },
                last_name:{
                    required : true
                },
                email:{
                    required : true
                },
                phone:{
                    required : true
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
                // fullname: "Vui lòng nhập họ tên",
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
        $('#form_add_staff').submit( function(e) {

            e.preventDefault();
            // $(this).removeAttr("disabled");
            // if (!$(this).valid()) {
            //     return false;
            // }
            // $('input[name=customer_fullname]').prop("disabled", false);
            // $('input[name=customer_email]').prop("disabled", false);
            // $('input[name=customer_phone]').prop("disabled", false);
            // $.post(laroute.route('order.order-cart'), $('#formOrderCart').serialize(), function (data) {
            //     if(data.status)
            //     {
            //         $('#simpleCart_total').empty();
            //         $('#simpleCart_quantity').empty();
            //         toastr.success(data.messages);
            //         setTimeout(function () {
            //             window.location.href = laroute.route(data.data.route);
            //         }, 3000);
            //     }
            // })
        });
    }, 

};