<div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">{{$_title}}</h4>
        </div>
        <div class="modal-body">


                <ul  class="nav nav-pills">
                    <li class="active">
                        <a  href="#1b" data-toggle="tab">Overview</a>
                    </li>
                    <li><a href="#2b" data-toggle="tab">Using nav-pills</a>
                    </li>
                    <li><a href="#3b" data-toggle="tab">Applying clearfix</a>
                    </li>
                    <li><a href="#4a" data-toggle="tab">Background color</a>
                    </li>
                </ul>

                <div class="tab-content clearfix" style="position: relative">
                    <div class="tab-pane active" id="1b">
                        <h3>Same as example 1 but we have now styled the tab's corner</h3>
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
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>

</div>