@extends('layouts.default')
@section('content')

        <!-- Page Content Start -->
<!-- ================== -->


    <div class="page-title">
        <h3 class="title">Welcome !</h3>
    </div>



    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="widget-panel widget-style-2 white-bg">
                <i class="ion-eye text-pink"></i>
                <h2 class="m-0 counter">50</h2>
                <div>Daily Visits</div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="widget-panel widget-style-2 white-bg">
                <i class="ion-wifi text-purple"></i>
                <h2 class="m-0 counter">8956</h2>
                <div>Sales</div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="widget-panel widget-style-2 white-bg">
                <i class="ion-ios7-pricetag text-info"></i>
                <h2 class="m-0 counter">1268</h2>
                <div>New Orders</div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="widget-panel widget-style-2 white-bg">
                <i class="ion-android-contacts text-success"></i>
                <h2 class="m-0 counter">145</h2>
                <div>New Users</div>
            </div>
        </div>
    </div> <!-- end row -->



    <div class="row">


        <div class="col-lg-6">
            <div class="portlet"><!-- /primary heading -->
                <div class="portlet-heading">
                    <h3 class="portlet-title text-dark text-uppercase">
                        Yearly Sales Report
                    </h3>
                    <div class="portlet-widgets">
                        <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                        <span class="divider"></span>
                        <a data-toggle="collapse" data-parent="#accordion1" href="#portlet2"><i class="ion-minus-round"></i></a>
                        <span class="divider"></span>
                        <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div id="portlet2" class="panel-collapse collapse in">
                    <div class="portlet-body">
                        <div id="morris-area-example" style="height: 320px;"></div>
                        <div class="row text-center m-t-30 m-b-30">
                            <div class="col-sm-3 col-xs-6">
                                <h4>$ 126</h4>
                                <small class="text-muted"> Today's Sales</small>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <h4>$ 967</h4>
                                <small class="text-muted">This Week's Sales</small>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <h4>$ 4500</h4>
                                <small class="text-muted">This Month's Sales</small>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <h4>$ 87,000</h4>
                                <small class="text-muted">This Year's Sales</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /Portlet -->

        </div>


        <div class="col-lg-6">
            <div class="portlet"><!-- /primary heading -->
                <div class="portlet-heading">
                    <h3 class="portlet-title text-dark text-uppercase">
                        Weekly Sales Report
                    </h3>
                    <div class="portlet-widgets">
                        <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                        <span class="divider"></span>
                        <a data-toggle="collapse" data-parent="#accordion1" href="#portlet1"><i class="ion-minus-round"></i></a>
                        <span class="divider"></span>
                        <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div id="portlet1" class="panel-collapse collapse in">
                    <div class="portlet-body">
                        <div id="morris-bar-example" style="height: 320px;"></div>

                        <div class="row text-center m-t-30 m-b-30">
                            <div class="col-sm-3 col-xs-6">
                                <h4>$ 126</h4>
                                <small class="text-muted"> Today's Sales</small>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <h4>$ 967</h4>
                                <small class="text-muted">This Week's Sales</small>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <h4>$ 4500</h4>
                                <small class="text-muted">This Month's Sales</small>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <h4>$ 87,000</h4>
                                <small class="text-muted">This Year's Sales</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /Portlet -->

        </div> <!-- end col -->
    </div> <!-- End row -->



    <div class="row">
        <div class="col-lg-4">

            <!-- TODO -->
            <div class="portlet" id="todo-container"><!-- /primary heading -->
                <div class="portlet-heading">
                    <h3 class="portlet-title text-dark text-uppercase">
                        Todo
                    </h3>
                    <div class="portlet-widgets">
                        <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                        <span class="divider"></span>
                        <a data-toggle="collapse" data-parent="#accordion1" href="#portlet-5" class="" aria-expanded="true"><i class="ion-minus-round"></i></a>
                        <span class="divider"></span>
                        <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div id="portlet-5" class="panel-collapse collapse in">
                    <div class="portlet-body todoapp">
                        <div class="row">
                            <div class="col-sm-8">
                                <h4 id="todo-message"><span id="todo-remaining"></span> of <span id="todo-total"></span> remaining</h4>
                            </div>
                            <div class="col-sm-4">
                                <a href="#" class="pull-right btn btn-primary btn-sm" id="btn-archive">Archive</a>
                            </div>
                        </div>

                        <ul class="list-group no-margn nicescroll todo-list" style="max-height: 279px;" id="todo-list"></ul>

                        <form name="todo-form" id="todo-form" role="form" class="m-t-20">
                            <div class="row">
                                <div class="col-sm-9 todo-inputbar">
                                    <input type="text" id="todo-input-text" name="todo-input-text" class="form-control" placeholder="Add new todo">
                                </div>
                                <div class="col-sm-3 todo-send">
                                    <button class="btn-primary btn-block btn" type="button" id="todo-btn-submit">Add</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-lg-8">

            <div class="portlet"><!-- /primary heading -->
                <div class="portlet-heading">
                    <h3 class="portlet-title text-dark text-uppercase">
                        Projects
                    </h3>
                    <div class="portlet-widgets">
                        <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                        <span class="divider"></span>
                        <a data-toggle="collapse" data-parent="#accordion1" href="#portlet2"><i class="ion-minus-round"></i></a>
                        <span class="divider"></span>
                        <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div id="portlet2" class="panel-collapse collapse in">
                    <div class="portlet-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Project Name</th>
                                    <th>Start Date</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                    <th>Assign</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Velonic Admin v1</td>
                                    <td>01/01/2015</td>
                                    <td>26/04/2015</td>
                                    <td><span class="label label-info">Released</span></td>
                                    <td>Coderthemes</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Velonic Frontend v1</td>
                                    <td>01/01/2015</td>
                                    <td>26/04/2015</td>
                                    <td><span class="label label-success">Released</span></td>
                                    <td>Coderthemes</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Velonic Admin v1.1</td>
                                    <td>01/05/2015</td>
                                    <td>10/05/2015</td>
                                    <td><span class="label label-pink">Pending</span></td>
                                    <td>Coderthemes</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Velonic Frontend v1.1</td>
                                    <td>01/01/2015</td>
                                    <td>31/05/2015</td>
                                    <td><span class="label label-purple">Work in Progress</span></td>
                                    <td>Coderthemes</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Velonic Admin v1.3</td>
                                    <td>01/01/2015</td>
                                    <td>31/05/2015</td>
                                    <td><span class="label label-warning">Coming soon</span></td>
                                    <td>Coderthemes</td>
                                </tr>

                                <tr>
                                    <td>6</td>
                                    <td>Velonic Admin v1.3</td>
                                    <td>01/01/2015</td>
                                    <td>31/05/2015</td>
                                    <td><span class="label label-primary">Coming soon</span></td>
                                    <td>Coderthemes</td>
                                </tr>

                                <tr>
                                    <td>7</td>
                                    <td>Velonic Admin v1.3</td>
                                    <td>01/01/2015</td>
                                    <td>31/05/2015</td>
                                    <td><span class="label label-info">Cool</span></td>
                                    <td>Coderthemes</td>
                                </tr>

                                <tr>
                                    <td>8</td>
                                    <td>Velonic Admin v1.3</td>
                                    <td>01/01/2015</td>
                                    <td>31/05/2015</td>
                                    <td><span class="label label-warning">Coming soon</span></td>
                                    <td>Coderthemes</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->


    </div> <!-- End row -->



<!-- Page Content Ends -->
<!-- ================== -->

@stop

@section('script')
<!-- js placed at the end of the document so the pages load faster -->

<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="assets/chat/moment-2.2.1.js"></script>

<!-- Counter-up -->
<script src="js/waypoints.min.js" type="text/javascript"></script>
<script src="js/jquery.counterup.min.js" type="text/javascript"></script>

<!-- EASY PIE CHART JS -->
<script src="assets/easypie-chart/easypiechart.min.js"></script>
<script src="assets/easypie-chart/jquery.easypiechart.min.js"></script>
<script src="assets/easypie-chart/example.js"></script>


<!--C3 Chart-->
<script src="assets/c3-chart/d3.v3.min.js"></script>
<script src="assets/c3-chart/c3.js"></script>

<!--Morris Chart-->
<script src="assets/morris/morris.min.js"></script>
<script src="assets/morris/raphael.min.js"></script>

<!-- sparkline -->
<script src="assets/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="assets/sparkline-chart/chart-sparkline.js" type="text/javascript"></script>

<!-- sweet alerts -->
<script src="assets/sweet-alert/sweet-alert.min.js"></script>
<script src="assets/sweet-alert/sweet-alert.init.js"></script>


<!-- Chat -->
<script src="js/jquery.chat.js"></script>
<!-- Dashboard -->
<script src="js/jquery.dashboard.js"></script>

<!-- Todo -->
<script src="js/jquery.todo.js"></script>


<script type="text/javascript">
    /* ==============================================
     Counter Up
     =============================================== */
    jQuery(document).ready(function($) {
        $('.counter').counterUp({
            delay: 100,
            time: 1200
        });
    });
</script>


@stop

