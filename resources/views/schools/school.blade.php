@extends('layouts.default')
    @section('content')
        @include('includes.alert')
        <div class="col-md-10 col-md-offset-1 text-center">
            <h1>{!! $school->name !!}</h1>

            <div class="row">

                <a href="" class="btn btn-lg btn-info">Admin of School</a>
                <a href="{!! route('school.course.index', $school->id) !!}" class="btn btn-lg btn-info">All Courses</a>
                <a href="{!! route('school.course.ongoing', $school->id) !!}" class="btn btn-lg btn-info">Ongoing Courses</a>
                <a href="{!! route('school.class.index', $school->id) !!}" class="btn btn-lg btn-info">Classes</a>
                <a href="" class="btn btn-lg btn-info">Laboratories</a>
                <a href="{!! route('school.course.archive', $school->id) !!}" class="btn btn-lg btn-info">Archive</a>

            </div>

            <!-- <div class="row">
                <h3>Classes Panel</h3>
                <div class="col-lg-3 col-sm-6">
                	<a href="{!! route('school.class.index', $school->id) !!}">
                        <div class="widget-panel widget-style-2 white-bg">
                            <i class="ion-eye text-pink"></i> 
                            <div>Classes</div>
                        </div>
                  	</a>
                </div>
            </div> -->
        
        </div>
@stop