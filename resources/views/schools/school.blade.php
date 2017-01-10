@extends('layouts.default')
    @section('content')
        @include('includes.alert')
        <h1>{!! $school->name !!}</h1>

        <div class="row">
                    <div class="col-lg-3 col-sm-6">
                    	<a href="{!! route('school.class.index', $school->id) !!}">
	                        <div class="widget-panel widget-style-2 white-bg">
	                            <i class="ion-eye text-pink"></i> 
	                            <h2 class="m-0 counter">{!! $class_number !!}</h2>
	                            <div>Classes</div>
	                        </div>
                      	</a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <a href="{!! route('school.course.index', $school->id) !!}">
                            <div class="widget-panel widget-style-2 white-bg">
                                <i class="ion-wifi text-purple"></i> 
                                <h2 class="m-0 counter">{!! $course_number !!}</h2>
                                <div>Courses</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget-panel widget-style-2 white-bg">
                            <i class="ion-ios7-pricetag text-info"></i> 
                            <h2 class="m-0 counter">7</h2>
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
@stop