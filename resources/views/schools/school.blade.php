@extends('layouts.default')
    @section('content')
        @include('includes.alert')
        <h1>{!! $school->name !!}</h1>

        <div class="row">
            <h3>Courses Panel</h3>
                    <div class="col-lg-3 col-sm-6">
                        <a href="{!! route('school.course.index', $school->id) !!}">
                            <div class="widget-panel widget-style-2 white-bg">
                                <i class="ion-wifi text-purple"></i> 
                                <div>All Courses</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <a href="{!! route('school.course.ongoing', $school->id) !!}">
                            <div class="widget-panel widget-style-2 white-bg">
                                <i class="ion-wifi text-purple"></i>
                                <div>Ongoing Courses</div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <a href="{!! route('school.course.awaiting', $school->id) !!}">
                            <div class="widget-panel widget-style-2 white-bg">
                                <i class="ion-wifi text-purple"></i>
                                <div>Awaiting Courses</div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <a href="{!! route('school.course.archive', $school->id) !!}">
                            <div class="widget-panel widget-style-2 white-bg">
                                <i class="ion-wifi text-purple"></i>
                                <div>Archive</div>
                            </div>
                        </a>
                    </div>


                </div>
                <div class="row">
                    <h3>Classes Panel</h3>
                    <div class="col-lg-3 col-sm-6">
                    	<a href="{!! route('school.class.index', $school->id) !!}">
	                        <div class="widget-panel widget-style-2 white-bg">
	                            <i class="ion-eye text-pink"></i> 
	                            <div>Classes</div>
	                        </div>
                      	</a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget-panel widget-style-2 white-bg">
                            <i class="ion-ios7-pricetag text-info"></i>
                            <div>Laboratories</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget-panel widget-style-2 white-bg">
                            <i class="ion-android-contacts text-success"></i> 
                            <h2 class="m-0 counter"></h2>
                            <div>School Admin</div>
                        </div>
                    </div>
                </div>
        </div>
@stop