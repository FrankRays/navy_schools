@extends('layouts.default')
@section('content')
    <div class="wraper container-fluid">

        @include('includes.alert')
        <!-- <div class="page-title"> 
            <h3 class="title">{!!$title!!}</h3> 
        </div> -->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                    <h4>{{ $title }}</h4>
                            </div>
                            <div class="col-md-6">                            
                                <a class="pull-right" href="{!! route('school.course.index',$school_id) !!}"><button class="btn btn-success">Back</button></a>
                            </div>
                        </div>
                    </div>
                        <div class="panel-body">
                                
                            <div class=" form"> 

                                {!! Form::model($course, array('route' => ['school.course.update', $school_id, $course->id] , 'method' => 'put', 'class' => 'cmxform form-horizontal tasi-form', 'files' => true)) !!}


                                <div class="form-group">
                                    {!! Form::label('name', "Name", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Basic name ex: CSE', 'required' => 'required', 'aria-required' =>'true')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('code', "Batch", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::text('code', null, array('class' => 'form-control', 'placeholder' => 'Course code', 'required' => 'required')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('officer', "Course Officer's Name", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::text('officer', null, array('class' => 'form-control','placeholder' => 'officer name')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('officer_mobile', "Course Officer's contact number", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::text('officer_mobile', null, array('class' => 'form-control','placeholder' => 'officer mobile')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('chief', "Course Chief's Name", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::text('chief', null, array('class' => 'form-control','placeholder' => 'Chief name')) !!}
                                    </div>
                                </div>


                                <div class="form-group">
                                    {!! Form::label('chief_mobile', "Course Chief's contact number", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::text('chief_mobile', null, array('class' => 'form-control','placeholder' => 'Chief Mobile')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('strength', "Strength", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::text('strength', null, array('class' => 'form-control','placeholder' => 'Strength')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('duration', "Duration", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::text('duration', null, array('class' => 'form-control','placeholder' => 'Duration', 'required')) !!}
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    {!! Form::label('start_date', "Start Date", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::date('start_date', null, array('class' => 'form-control','placeholder' => 'select a date', 'required')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('end_date', "End Date", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::date('end_date', null, array('class' => 'form-control','placeholder' => 'select a date', 'required')) !!}
                                    </div>
                                </div>

                               

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-6">
                                    {!! Form::submit('Update Course', array('class' => 'btn btn-success')) !!}
                                    </div>
                                </div>

                                {!! Form::close() !!}
                            </div>
                                 
                        </div>
                       
                </div>

            </div>

        </div>

@stop
