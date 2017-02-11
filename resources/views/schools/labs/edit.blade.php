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
                                <a class="pull-right" href="{!! route('school.lab',$school_id)!!}"><button class="btn btn-info">Back</button></a>
                            </div>
                        </div>
                    </div>
                        <div class="panel-body">
                                
                            <div class=" form"> 

                                {!! Form::model($lab, array('route' => ['school.lab.update', $school_id, $lab->id] , 'method' => 'put', 'class' => 'cmxform form-horizontal tasi-form', 'files' => true)) !!}


                                <div class="form-group">
                                    {!! Form::label('name', "Lab Title", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Enter Lab Name')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('oic', "Lab OIC Name", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::text('oic', null, array('class' => 'form-control', 'placeholder' => 'OIC')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('oic_mobile', "OIC contact number", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::text('oic_mobile', null, array('class' => 'form-control','placeholder' => 'OIC contact Number')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('lic', "Lab In charge", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::text('lic', null, array('class' => 'form-control','placeholder' => 'In charge name')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('lic_mobile', "Lab in charge contact number", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::text('lic_mobile', null, array('class' => 'form-control','placeholder' => 'Lab In charge contact number')) !!}
                                    </div>
                                </div>


                                <div class="form-group">
                                    {!! Form::label('lab_facility', "Lab Facility", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::textarea('lab_facility', null, array('class' => 'form-control','placeholder' => 'lab facilities')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('equipmet_list', "Equipment List", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::textarea('equipment_list', null, array('class' => 'form-control','placeholder' => 'example: 10 computers, 2 routers')) !!}
                                    </div>
                                </div>
                               

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-6">
                                    {!! Form::submit('Save Laboratory', array('class' => 'btn btn-success')) !!}
                                    </div>
                                </div>

                                {!! Form::close() !!}
                            </div>
                                 
                        </div>
                       
                </div>

            </div>

        </div>

@stop
