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
                                    <li><a href="{!! route('school.class.show', [$school_id, $class->id]) !!}">{!! $title !!}</a></li>
                                    <li><a href="{!! route('school.class.students', [$school_id, $class->id]) !!}">Students</a></li>
                                    <li><a href="{!! route('school.class.result', [$school_id, $class->id]) !!}">Result</a></li>
                                    
                                    @if(!$class->approval)
                                    <li class="pull-right btn btn-success btn-xs"><a href="{!! route('school.class.approve',[$school_id, $class->id]) !!}"><i class="fa fa-save"></i>Draft</a></li>
                                    @endif
                                </ul>

            
                                <div class="tab-content m-0">
                                    <div id="aboutme" class="tab-pane active">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4>Add Result</h4>
                                            </div>
                                            <div class="col-md-6">
                                                 <a class="pull-right" href="{!! route('school.class.result', [$school_id, $class->id]) !!}"><button class="btn btn-success">Back</button></a>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="profile-desk">

                                        <div class=" form"> 

                                {!! Form::open(array('route' => ['school.class.result.store', $school_id, $class->id] , 'method' => 'post', 'class' => 'cmxform form-horizontal tasi-form', 'files' => true)) !!}


                                <div class="form-group">
                                    {!! Form::label('subject', "Subject", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::text('subject', null, array('class' => 'form-control', 'placeholder' => 'Enter Subject', 'required' => 'required', 'aria-required' =>'true')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('full_marks', "Full Marks", array('class' => 'control-label col-lg-2')) !!}
                                    <div class="col-lg-6">
                                        {!! Form::number('full_marks', null, array('step'=>'any','class' => 'form-control', 'placeholder' => 'Full marks', 'required' => 'required')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-6">
                                    {!! Form::submit('Save', array('class' => 'btn btn-success')) !!}
                                    </div>
                                </div>

                                {!! Form::close() !!}
                            </div>
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

@section('script')

    <!-- for Datatable -->
    <script type="text/javascript">

        $(document).ready(function() {

            $('[data-toggle=confirmation]').confirmation({
              rootSelector: '[data-toggle=confirmation]',
              // other options
            });

        });

    </script>


@stop