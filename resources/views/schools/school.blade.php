@extends('layouts.default')
    @section('content')
        @include('includes.alert')
        <div class="col-md-10 col-md-offset-1 text-center">
            <h1>{!! $school->name !!}</h1>

            <div class="row">
                
                  <a data-toggle="dropdown" class="dropdown-toggle btn btn-lg btn-info" href="#" aria-expanded="true">Admin of School <span class="caret"></span></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="{!! route('school.staff.select',$school->id) !!}">Staffs</a></li>
                        <li><a href="{!! route('school.foni',$school->id) !!}">FO/NI</a></li>
                        <li><a href="{!! route('school.tm',$school->id) !!}">Special Instructions</a></li>
                        <li><a href="{!! route('school.cor',$school->id) !!}">Correspondences</a></li>
                    </ul>
                
                <!-- <a href="" class="btn btn-lg btn-info">Admin of School</a> -->
                <a href="{!! route('school.course.index', $school->id) !!}" class="btn btn-lg btn-info">All Courses</a>
                <a href="{!! route('school.course.ongoing', $school->id) !!}" class="btn btn-lg btn-info">Ongoing Courses</a>
                <a href="{!! route('school.class.index', $school->id) !!}" class="btn btn-lg btn-info">Classes</a>
                <a href="{!! route('school.lab', $school->id) !!}" class="btn btn-lg btn-info">Laboratories</a>
                <a href="{!! route('school.course.archive', $school->id) !!}" class="btn btn-lg btn-info">Archive</a>

            </div>
        
        </div>
@stop