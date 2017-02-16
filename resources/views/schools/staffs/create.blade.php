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
                                <a class="pull-right" href="{!! route('school.staff',[$school_id,$type]) !!}"><button class="btn btn-info">Back</button></a>
                            </div>
                        </div>
                    </div>
                        <div class="panel-body">
                                
                            <div class=" form"> 

                                {!! Form::open(array('route' => ['school.staff.store', $school_id, $type] , 'method' => 'post', 'class' => 'cmxform form-horizontal tasi-form')) !!}


                                <div class="form-group">
                                    {!! Form::label('name', "Name", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Enter stuff name')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('rank', "Rank", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::text('rank', null, array('class' => 'form-control','placeholder' => 'rank')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('po', "P/O No", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::text('po', null, array('class' => 'form-control', 'placeholder' => 'P/O No')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('appointment', "Appointment", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::text('appointment', null, array('class' => 'form-control', 'placeholder' => 'Appointment')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('contact', "Contact No", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::text('contact', null, array('class' => 'form-control', 'placeholder' => 'Contact No')) !!}
                                    </div>
                                </div>
                               

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-6">
                                    {!! Form::submit('Save', array('class' => 'btn btn-success')) !!}
                                    </div>
                                </div>

                                {!! Form::close() !!}
                            </div>
                                 
                        </div>
                       
                </div>

            </div>

        </div>

@stop
