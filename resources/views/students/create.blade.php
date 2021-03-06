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
                                <a class="pull-right" href="{!! route('school.class.students',[$school_id, $class_id])!!}"><button class="btn btn-success">Back</button></a>
                            </div>
                        </div>
                    </div>
                        <div class="panel-body">
                                
                            <div class=" form"> 

                                {!! Form::open(array('route' => ['school.class.student.store', $school_id, $class_id] , 'method' => 'post', 'class' => 'cmxform form-horizontal tasi-form', 'files' => true)) !!}


                                <div class="form-group">
                                    {!! Form::label('name', "Full Name", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Enter Full Name', 'required' => 'required', 'aria-required' =>'true')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('email', "Email", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Email', 'required' => 'required')) !!}
                                    </div>
                                </div>

                                 <div class="form-group">
                                    {!! Form::label('photo_url', "Photo", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::file('photo_url', null, array('class' => 'form-control', 'placeholder' => 'Image of the Student')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('serial_number', "Serial Number", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::text('serial_number', null, array('class' => 'form-control','placeholder' => 'Serial Number', 'required')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('po_number', "P/O Number", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::text('po_number', null, array('class' => 'form-control','placeholder' => 'P/O Number', 'required')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('rank', "Rank", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::text('rank', null, array('class' => 'form-control','placeholder' => 'Rank','required')) !!}
                                    </div>
                                </div>


                                <div class="form-group">
                                    {!! Form::label('blood_group', "Blood Group", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::text('blood_group', null, array('class' => 'form-control','placeholder' => 'Rank')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('mobile', "Contact No.", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::text('mobile', null, array('class' => 'form-control','placeholder' => 'Contact No')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('barrack_location', "Barrack Location", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::text('barrack_location', null, array('class' => 'form-control','placeholder' => 'Barrack Location', 'required')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('permanent_address', "Permanent Address", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::text('permanent_address', null, array('class' => 'form-control','placeholder' => 'Permanent Address')) !!}
                                    </div>
                                </div>

                               

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-6">
                                    {!! Form::submit('Add Student', array('class' => 'btn btn-success')) !!}
                                    </div>
                                </div>

                                {!! Form::close() !!}
                            </div>
                                 
                        </div>
                       
                </div>

            </div>

        </div>

@stop
