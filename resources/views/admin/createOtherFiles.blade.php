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
                                <a class="pull-right" href="{!! route('otherfiles', $type)!!}"><button class="btn btn-success">Back</button></a>
                            </div>
                        </div>
                    </div>
                        <div class="panel-body">
                                
                            <div class=" form"> 

                                {!! Form::open(array('route' => ['otherfiles.store', $type] , 'method' => 'post', 'class' => 'cmxform form-horizontal tasi-form', 'files' => true)) !!}


                                 <div class="form-group">
                                    {!! Form::label('file_path', "Upload File", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::file('file_path', null, array('class' => 'form-control', 'placeholder' => 'upload file', 'required')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('type', "Type", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::select('type', $options, null, array('class' => 'form-control', 'required')) !!}
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
