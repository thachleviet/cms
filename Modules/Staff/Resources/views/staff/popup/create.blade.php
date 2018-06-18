
<div class="modal-dialog modal-lg" >

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">{{$_title}}</h4>
        </div>
        <form id="form_add_staff"  method="post"  onsubmit="return false">
        <div class="modal-body">


            <ul  class="nav nav-wizard">
                <li class="active" >
                    <a  href="#1b" data-toggle="tab">Thông tin</a>
                </li>
                <li><a href="#2b" data-toggle="tab">Hình đại diện </a>
                </li>
                <li><a href="#3b" data-toggle="tab">Applying clearfix</a>
                </li>
                <li><a href="#4a" data-toggle="tab">Background color</a>
                </li>
            </ul>
            <div class="tab-content clearfix" style="position: relative">

                <div class="tab-pane active" id="1b">
                    <section>
                        <div class="content-tap" style="padding-top: 20px">
                            <div class="col-sm-12">

                                <div class="form-group">
                                    <label for="first_name">First Name</label>

                                    <input type="text" class="form-control"  id="first_name" name="first_name"  placeholder="Enter first name">
                                    <small  class="form-text text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" name="last_name"  placeholder="Enter last name">
                                    <small id="last_name" class="form-text text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" name="email"  placeholder="Enter email">
                                    <small id="email" class="form-text text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Enter phone">
                                </div>


                            </div>
                        </div>
                    </section>
                    {{--<h3>Same as example 1 but we have now styled the tab's corner</h3>--}}
                </div>
                <div class="tab-pane" id="2b">
                    <h3>We use the class nav-pills instead of nav-tabs which automatically creates a background color for the tab</h3>
                </div>
                <div class="tab-pane" id="3b">
                    <h3>We applied clearfix to the tab-content to rid of the gap between the tab and the content</h3>
                </div>
                <div class="tab-pane" id="4b">
                    <h3>We use css to change the background color of the content to be equal to the tab</h3>
                </div>
            </div>






        </div>
        <div class="modal-footer">
            <nav class="navbar btn-toolbar sw-toolbar sw-toolbar-bottom">
                <div class="btn-group navbar-btn sw-btn-group-extra pull-right" role="group">
                    <button type="submit"  id="registerButtonModal" class="btn btn-success"><i class="fa fa-save"></i> Lưu</button>
                <button class="btn btn-warning" type="reset">Hủy</button>
                 </div>
                <div class="btn-group navbar-btn sw-btn-group pull-right" role="group">
                    <button class="btn btn-default sw-btn-prev" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                    <button class="btn btn-default sw-btn-next" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>

                </div>
            </nav>

        </div>
        </form>
    </div>

</div>

<script>
    $(document).ready(function() {
        orderSubmit._init() ;
        orderSubmit._countTab()
        // $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        //     var target = $(e.target).attr("href");// activated tab
        // });
        //
        //

    });


</script>