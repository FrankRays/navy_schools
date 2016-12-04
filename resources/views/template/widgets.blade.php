@extends('layouts.default')
@section('content')

<!-- Page Content Start -->
<!-- ================== -->


                <div class="page-title"> 
                    <h3 class="title">Widgets</h3> 
                </div>

                <!--Widget-1 -->
                <div class="row text-center">
                    <div class="col-sm-6 col-md-3">
                        <div class="panel">
                            <div class="h2 text-purple">15852</div>
                            <span class="text-muted">Sales</span>
                            <div class="text-right">
                              <i class="fa fa-usd fa-2x text-purple"></i>
                            </div>
                        </div>
                    </div>
                            
                    <div class="col-sm-6 col-md-3">
                        <div class="panel bg-primary">
                            <div class="h2 text-white">956</div>
                            <span class="text-white">New Orders</span>
                            <div class="text-right">
                              <i class="fa fa-shopping-cart fa-2x text-white"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="panel">
                            <div class="h2 text-primary">5210</div>
                            <span class="text-muted">New Users</span>
                            <div class="text-right">
                              <i class="fa fa-user fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                            
                    <div class="col-sm-6 col-md-3">
                        <div class="panel bg-purple">
                            <div class="h2 text-white">20544</div>
                            <span class="text-white">Visits</span>
                            <div class="text-right">
                              <i class="fa fa-eye fa-2x text-white"></i>
                            </div>
                        </div>
                    </div>

                </div> <!-- end row -->


                <!--Widget-2 -->
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="widget-panel widget-style-1 bg-pink">
                            <i class="fa fa-comments-o"></i> 
                            <h2 class="m-0 counter text-white">50</h2>
                            <div class="text-white">Comments</div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="widget-panel widget-style-1 bg-warning">
                            <i class="fa fa-usd"></i> 
                            <h2 class="m-0 counter text-white">12056</h2>
                            <div class="text-white">Sales</div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="widget-panel widget-style-1 bg-info">
                            <i class="fa fa-shopping-cart"></i> 
                            <h2 class="m-0 counter text-white">1268</h2>
                            <div class="text-white">New Orders</div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="widget-panel widget-style-1 bg-success">
                            <i class="fa fa-user"></i> 
                            <h2 class="m-0 counter text-white">145</h2>
                            <div class="text-white">New Users</div>
                        </div>
                    </div>
                </div> <!-- End row -->


                <!--Widget-3 -->
                <div class="row">
                    <div class="col-md-3 col-sm-6"> 
                        <div class="tile-stats white-bg"> 
                            <div class="status">
                                <h3 class="m-t-0">15% more</h3> 
                                <p>Monthly visitor statistics</p>
                            </div> 
                            <div class="chart-inline">
                                <span class="inlinesparkline"></span> 
                            </div>
                        </div> 
                    </div>

                    <div class="col-md-3 col-sm-6"> 
                        <div class="tile-stats white-bg"> 
                            <div class="status">
                                <h3 class="m-t-0">15</h3> 
                                <p>Avg. Sales per day</p>
                            </div> 
                            <span class="dynamicbar-big"></span> 
                        </div> 
                    </div>

                    <div class="col-md-3 col-sm-6"> 
                        <div class="tile-stats white-bg"> 
                            <div class="status">
                                <h3 class="m-t-0">-0.0102</h3> 
                                <p>Stock Market</p>
                            </div> 
                            <span id="compositeline"></span> 
                        </div> 
                    </div>

                    <div class="col-md-3 col-sm-6"> 
                        <div class="tile-stats white-bg"> 
                            <div class="col-sm-8">
                                <div class="status">
                                <h3 class="m-t-15">61.5%</h3> 
                                <p>US Dollar Share</p>
                            </div> 
                            </div>
                            <div class="col-sm-4 m-t-20">
                                <span class="sparkpie-big"></span> 
                            </div>
                        </div> 
                    </div>
                </div> <!-- End row -->


                <!--Widget-4 -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="mini-stat clearfix">
                            <span class="mini-stat-icon bg-info"><i class="fa fa-usd"></i></span>
                            <div class="mini-stat-info text-right">
                                <span class="counter">15852</span>
                                Total Sales
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mini-stat clearfix">
                            <span class="mini-stat-icon bg-warning"><i class="fa fa-shopping-cart"></i></span>
                            <div class="mini-stat-info text-right">
                                <span class="counter">956</span>
                                New Orders
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mini-stat clearfix">
                            <span class="mini-stat-icon bg-pink"><i class="fa fa-user"></i></span>
                            <div class="mini-stat-info text-right">
                                <span class="counter">5210</span>
                                New Users
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mini-stat clearfix">
                            <span class="mini-stat-icon bg-success"><i class="fa fa-eye"></i></span>
                            <div class="mini-stat-info text-right">
                                <span class="counter">20544</span>
                                Unique Visitors
                            </div>
                        </div>
                    </div>
                </div> <!-- End row-->


                <!-- WEATHER -->
                <div class="row">
                            
                    <div class="col-lg-6">
                        
                        <!-- BEGIN WEATHER WIDGET 1 -->
                        <div class="panel bg-inverse">
                            <div class="panel-body">
                            
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="row">
                                            <div class="col-xs-6 text-center">
                                                <canvas id="partly-cloudy-day" width="115" height="115"></canvas>
                                            </div>
                                            <div class="col-xs-6">
                                                <h2 class="m-t-0 text-white"><b>32°</b></h2>
                                                <p class="text-white">Partly cloudy</p>
                                                <p class="text-white">15km/h - 37%</p>
                                            </div>
                                        </div><!-- End row -->
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="row">
                                            <div class="col-xs-4 text-center">
                                                <h4 class="text-white m-t-0">SAT</h4>
                                                <canvas id="cloudy" width="35" height="35"></canvas>
                                                <h4 class="text-white">30<i class="wi-degrees"></i></h4>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <h4 class="text-white m-t-0">SUN</h4>
                                                <canvas id="wind" width="35" height="35"></canvas>
                                                <h4 class="text-white">28<i class="wi-degrees"></i></h4>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <h4 class="text-white m-t-0">MON</h4>
                                                <canvas id="clear-day" width="35" height="35"></canvas>
                                                <h4 class="text-white">33<i class="wi-degrees"></i></h4>
                                            </div>
                                        </div><!-- end row -->
                                    </div>
                                </div><!-- end row -->
                            </div><!-- panel-body -->
                        </div><!-- panel-->
                        <!-- END Weather WIDGET 1 -->
                        
                    </div><!-- End col-md-6 -->

                    <div class="col-lg-6">
                        
                        <!-- WEATHER WIDGET 2 -->
                        <div class="panel bg-danger">
                            <div class="panel-body">
                            
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="">
                                            <div class="row">
                                                <div class="col-xs-6 text-center">
                                                    <canvas id="snow" width="115" height="115"></canvas>
                                                </div>
                                                <div class="col-xs-6">
                                                    <h2 class="m-t-0 text-white"><b> 23°</b></h2>
                                                    <p class="text-white">Partly cloudy</p>
                                                    <p class="text-white">15km/h - 37%</p>
                                                </div>
                                            </div><!-- end row -->
                                        </div><!-- weather-widget -->
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="row">
                                            <div class="col-xs-4 text-center">
                                                <h4 class="text-white m-t-0">SAT</h4>
                                                <canvas id="sleet" width="35" height="35"></canvas>
                                                <h4 class="text-white">30<i class="wi-degrees"></i></h4>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <h4 class="text-white m-t-0">SUN</h4>
                                                <canvas id="fog" width="35" height="35"></canvas>
                                                <h4 class="text-white">28<i class="wi-degrees"></i></h4>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <h4 class="text-white m-t-0">MON</h4>
                                                <canvas id="partly-cloudy-night" width="35" height="35"></canvas>
                                                <h4 class="text-white">33<i class="wi-degrees"></i></h4>
                                            </div>
                                        </div><!-- End row -->
                                    </div> <!-- col-->
                                </div><!-- End row -->
                            </div><!-- panel-body -->
                        </div><!-- panel -->
                        <!-- END WEATHER WIDGET 2 -->
                            
                    </div><!-- /.col-md-6 -->
                </div> <!-- End row -->   

                <div class="row">

                    <!-- Sales Monitor -->
                    <div class="col-lg-4">
                        <div class="panel panel-default text-center">
                            <div class="panel-heading">
                                <h3 class="panel-title">SALES MONITOR</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <div class="chart easy-pie-chart-4" data-percent="22">
                                            <span class="percent"></span>
                                        </div>
                                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                        <button class="btn btn-info btn-sm m-t-20">View All</button>
                                    </div><!-- col-sm-12 -->
                                </div><!-- end row -->
                            </div><!-- panel-body -->
                        </div> <!-- Panel -->
                    </div> <!-- col-->

                    <div class="col-lg-4">
                        <!-- Start Profile Widget -->
                        <div class="profile-widget text-center">
                            <div class="bg-info bg-profile"></div>
                            <img src="img/avatar-2.jpg" class="thumb-lg img-circle img-thumbnail" alt="img">
                            <h3>Jonathan Doe</h3>
                            <p><i class="fa fa-map-marker"></i> London</p>
                            <a href="#" class="btn btn-sm btn-purple m-t-20">Follow</a>
                            <ul class="list-inline widget-list clearfix">
                                <li class="col-md-4"><span>2.109</span>Followers</li>
                                <li class="col-md-4"><span>596</span>Photos</li>
                                <li class="col-md-4"><span>902</span>Like</li>
                            </ul>
                        </div>
                        <!-- End Profile Widget -->
                    </div>

                    <div class="col-lg-4">
                        <div class="panel">
                            <div class="panel-heading text-center">
                              <h4 class="panel-title">Team Members</h4>              
                            </div>
                            <div class="panel-body">
                                <ul class="list-group list-group-lg">
                                    <li class="list-group-item b-0">
                                        <a href="#" class=" m-r-10">
                                          <img src="img/avatar-8.jpg" class="thumb-sm br-radius" alt="member">
                                        </a>
                                        <span class="pull-right label bg-primary inline m-t-10">CEO</span>
                                        <a href="#">Damon Parker</a>
                                    </li>
                                    <li class="list-group-item b-0">
                                        <a href="#" class=" m-r-10">
                                          <img src="img/avatar-5.jpg" class="thumb-sm br-radius" alt="member">
                                        </a>
                                        <span class="pull-right label bg-info inline m-t-10">Webdesigner</span>
                                        <a href="#">Joe Waston</a>
                                    </li>
                                    <li class="list-group-item b-0">
                                        <a href="#" class=" m-r-10">
                                          <img src="img/avatar-6.jpg" class="thumb-sm br-radius" alt="member">
                                        </a>
                                        <span class="pull-right label bg-warning inline m-t-10">Webdeveloper</span>
                                        <a href="#">Jannie Dvis</a>
                                    </li>
                                    <li class="list-group-item b-0">
                                        <a href="#" class=" m-r-10">
                                          <img src="img/avatar-9.jpg" class="thumb-sm br-radius" alt="member">
                                        </a>
                                        <span class="pull-right label bg-warning inline m-t-10">Programmer</span>
                                        <a href="#">Emma Welson</a>
                                    </li>
                                </ul>
                            </div> <!--Panel-body -->

                            <div class="panel-footer white-bg text-center">
                                <hr class="m-b-10"/>
                                <button class="btn btn-primary btn-addon btn-sm"><i class="fa fa-plus m-r-5"></i>Add Teammember</button>
                            </div> <!-- panel-footer-->
                        </div> <!-- Panel-->
                    </div><!-- col-->
                </div>   <!-- End row -->    

                <!-- Slider/ Carousel -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default text-center">
                            <div class="panel-body p-0">
                                <div class="velonic-carousel">
                                    <div id="velonic-slider" class="owl-carousel">
                                        <div class="item">
                                            <h4><a href="#">Hey! Welcome to Velonic</a></h4>
                                            <p class="small">02 April, 2015</p>
                                            <p class="m-t-30"><em>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</em></p>
                                            <button class="btn btn-warning btn-sm m-t-40">Read more</button>
                                        </div><!-- /.item -->

                                        <div class="item">
                                            <h4><a href="#">Hey! Welcome to Velonic</a></h4>
                                            <p class="small">02 April, 2015</p>
                                            <p class="m-t-30"><em>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</em></p>
                                            <button class="btn btn-warning btn-sm m-t-40">Read more</button>
                                        </div><!-- /.item -->

                                        <div class="item">
                                            <h4><a href="#">Hey! Welcome to Velonic</a></h4>
                                            <p class="small">02 April, 2015</p>
                                            <p class="m-t-30"><em>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</em></p>
                                            <button class="btn btn-warning btn-sm m-t-40">Read more</button>
                                        </div><!-- /.item -->

                                    </div><!-- /#tiles-slide-1 -->
                                </div><!-- /.panel-body -->
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="panel panel-default text-center text-white slider-bg">
                            <div class="slider-overlay br-radius"></div>
                            <div class="panel-body p-0">
                                <div class="velonic-carousel">
                                    <div id="velonic-slider-2" class="owl-carousel">
                                        <div class="item">
                                            <h4 class="text-white"><b>Hey! Welcome to Velonic</b></h4>
                                            <p class="small">02 April, 2015</p>
                                            <p class="m-t-30"><em>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</em></p>
                                            <button class="btn btn-warning btn-sm m-t-40">Read more</button>
                                        </div><!-- /.item -->

                                        <div class="item">
                                            <h4 class="text-white"><b>Hey! Welcome to Velonic</b></h4>
                                            <p class="small">02 April, 2015</p>
                                            <p class="m-t-30"><em>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</em></p>
                                            <button class="btn btn-warning btn-sm m-t-40">Read more</button>
                                        </div><!-- /.item -->

                                        <div class="item">
                                            <h4 class="text-white"><b>Hey! Welcome to Velonic</b></h4>
                                            <p class="small">02 April, 2015</p>
                                            <p class="m-t-30"><em>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</em></p>
                                            <button class="btn btn-warning btn-sm m-t-40">Read more</button>
                                        </div><!-- /.item -->
                                    </div><!-- /#tiles-slide-2 -->
                                </div>
                            </div> <!-- panel-body -->
                        </div><!-- Panel -->
                    </div> <!-- col-->

                </div>  <!-- End row -->




            <!-- Page Content Ends -->
            <!-- ================== -->

@stop

@section('script')




<!-- Counter-up -->
{!! Html::script('js/waypoints.min.js') !!}
{!! Html::script('js/jquery.counterup.min.js') !!}


<!-- skycons -->
{!! Html::script('js/skycons.min.js') !!}


<!-- EASY PIE CHART JS -->
{!! Html::script('assets/easypie-chart/easypiechart.min.js') !!}
{!! Html::script('assets/easypie-chart/jquery.easypiechart.min.js') !!}
{!! Html::script('assets/easypie-chart/example.js') !!}


<!-- sparkline -->
{!! Html::script('assets/sparkline-chart/jquery.sparkline.min.js') !!}
{!! Html::script('assets/sparkline-chart/chart-sparkline.js') !!}


<!-- KNOB JS -->
<!--[if IE]>

{!! Html::script('assets/jquery-knob/excanvas.js') !!}

<![endif]-->
{!! Html::script('assets/jquery-knob/jquery.knob.js') !!}


<!-- owl-carousel -->

{!! Html::script('assets/owl-carousel/owl.carousel.js') !!}



<script type="text/javascript">
    jQuery(document).ready(function($) {
        /* Counter Up */
        $('.counter').counterUp({
            delay: 100,
            time: 1200
        });

        //owl carousel
        $("#velonic-slider,#velonic-slider-2").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true,
            autoPlay:true
        });
    });
    /* BEGIN SVG WEATHER ICON */
    if (typeof Skycons !== 'undefined'){
        var icons = new Skycons(
                        {"color": "#fff"},
                        {"resizeClear": true}
                ),
                list  = [
                    "clear-day", "clear-night", "partly-cloudy-day",
                    "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                    "fog"
                ],
                i;

        for(i = list.length; i--; )
            icons.set(list[i], list[i]);
        icons.play();
    };
</script>

@stop



@section('style')

<!--Animation css-->
{!! Html::style('css/animate.css') !!}

<!--Icon-fonts css-->
{!! Html::style('assets/font-awesome/css/font-awesome.css') !!}
{!! Html::style('assets/ionicon/css/ionicons.min.css') !!}

<!-- Plugins css -->
{!! Html::style('assets/owl-carousel/owl.carousel.css') !!}

@stop
