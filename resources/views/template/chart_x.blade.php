@extends('layouts.default')
@section('content')
        <!-- Page Content Start -->
<!-- ================== -->


<!-- Page Content Start -->
<!-- ================== -->


    <div class="page-title">
        <h3 class="title">Other Charts </h3>
    </div>


    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Easy Pie Chart</h3>
                </div>
                <div class="panel-body text-center">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="chart easy-pie-chart-1" data-percent="86">
                                <span class="percent"></span>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="chart easy-pie-chart-2" data-percent="86">
                                <span class="percent"></span>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="chart easy-pie-chart-3" data-percent="86">
                                <span class="percent"></span>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="chart easy-pie-chart-4" data-percent="56">
                                <span class="percent"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- End row -->

    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Jquery Knob</h3>
                </div>
                <div class="panel-body text-center">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <h5>Disable display input</h5>
                            <input class="knob" data-width="150" data-fgColor="#14082d" data-displayInput=false value="35"/>
                        </div>
                        <div class="col-md-4 text-center">
                            <h5>Cursor mode</h5>
                            <input class="knob" data-width="150" data-cursor=true data-fgColor="#33b86c" value="29"/>
                        </div>
                        <div class="col-md-4 text-center">
                            <h5>Display previous value</h5>
                            <input class="knob" data-width="150" data-min="-100" data-fgColor="#f13c6e" data-displayPrevious=true value="44"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 text-center">
                            <h5>Angle offset</h5>
                            <input class="knob" data-width="150" data-angleOffset="90" data-linecap="round" data-fgColor="#ebc142" value="35"/>
                        </div>
                        <div class="col-md-4 text-center">
                            <h5>5-digit values, step 1000</h5>
                            <input class="knob" data-width="150" data-min="-15000" data-displayPrevious=true data-max="15000" data-step="1000" value="-11000" data-fgColor="#615ca8"/>
                        </div>
                        <div class="col-md-4 text-center">
                            <h5>Angle offset and arc</h5>
                            <input class="knob" data-width="150" data-cursor=true data-fgColor="#1ca8dd" value="29"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- End row -->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Sparkline Charts</h3>
                </div>
                <div class="panel-body text-center">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="inlinesparkline">Loading..</div>
                        </div>

                        <div class="col-sm-3">
                            <div class="dynamicbar">Loading..</div>
                        </div>

                        <div class="col-sm-3">
                            <div id="compositeline">Loading...</div>
                        </div>

                        <div class="col-sm-3">
                            <div class="sparkpie">Loading...</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- End row -->

@stop


@section('script')

      <!-- EASY PIE CHART JS -->
    {!! Html::script('assets/easypie-chart/easypiechart.min.js') !!}
    {!! Html::script('assets/easypie-chart/jquery.easypiechart.min.js') !!}
    {!! Html::script('assets/easypie-chart/example.js') !!}


    <!-- KNOB JS -->
    <!--[if IE]>
    {!! Html::script('assets/jquery-knob/excanvas.js') !!}

    <![endif]-->
    {!! Html::script('assets/jquery-knob/jquery.knob.js') !!}


   <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
    {!! Html::script('assets/sparkline-chart/jquery.sparkline.min.js') !!}
    {!! Html::script('assets/sparkline-chart/chart-sparkline.js') !!}

    <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->


@stop




