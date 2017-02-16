@extends('layouts.default')
@section('content')

  <!-- Page Content Start -->
            <!-- ================== -->



                <div class="row m-t-30">
                    <div class="col-sm-12">
                        <div class="panel panel-default p-0">
                            <div class="panel-body p-0">
                            @include('includes.alert')

                                <ul class="nav nav-tabs profile-tabs">
                                    <li class="active"><a>{!! $title !!}</a></li>
                                </ul>

            
                                <div class="tab-content m-0">
                                    <div id="aboutme" class="tab-pane active">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4>Staffs</h4>
                                            </div>
                                            <div class="col-md-6">
                                                 <a class="pull-right" href="{!! route('school.show', $school->id) !!}"><button class="btn btn-info">Back</button></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-desk">
                                    
                                        <a href="{!! route('school.staff', [$school->id, 'officer'] ) !!}"><button class="btn btn-success">Officers</button></a>

                                        <a href="{!! route('school.staff', [$school->id, 'sailor']) !!}"><button class="btn btn-success">JCO / Sailors</button></a>

                                        <a href="{!! route('school.staff', [$school->id, 'civil']) !!}"><button class="btn btn-success">Civil</button></a>
                                    </div> <!-- end profile-desk -->
                                </div> <!-- about-me -->

                            </div>

                        </div>
                    </div>
                </div>
            </div>



<!-- Page Content Ends -->
<!-- ================== -->
@stop
