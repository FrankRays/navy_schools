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
                                    <li><a href="{!! route('school.course.show',[$school_id, $course->id]) !!}">{!! $title !!}</a></li>
                                    <li class="active"><a>Syllabus</a></li>
                                    <li><a href="{!! route('school.course.si.index',[$school_id, $course->id]) !!}">Special Instructions</a></li>
                                    @if(!$course->approval)
                                    <li class="pull-right btn btn-success btn-xs"><a href="{!! route('school.course.approve',[$school_id, $course->id]) !!}"><i class="fa fa-save"></i>Draft</a></li>
                                    @endif
                                </ul>

                                <div class="tab-content m-0">

                                    <div id="aboutme" class="tab-pane active">
                                    <div class="profile-desk">
                                        <div class="col-md-8">
                                                 
                                        <table class="table table-condensed">
                                            <thead>
                                                <tr>
                                                    <th>Subject</th>
                                                    <th>File</th>
                                                    <th>#</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($course->files as $syllabus)
                                                @if($syllabus->type=="syllabus")
                                                <tr>
                                                    <td>{!! $syllabus->subject !!}</td>
                                                    <td><a href="{!! $syllabus->file_path !!}"><i class="fa fa-file fa-2x"></i></a></td>
                                                    <td>
                                                         <a href="{!! route('school.course.syllabus.delete',[$school_id,$course->id, $syllabus->id]) !!}" class="btn btn-danger btn-xs btn-archive deleteBtn" data-toggle="confirmation" data-title="Delete Data?">Delete</a>
                                                    </td>
                                                </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                        </div>
                                        <div class="col-md-4">

                                            <div class="row">
                                                <div class="panel">
                                                    <div class="panel-header">
                                                        <h4>Add Syllabus</h4>    
                                                    </div>

                                                    {!! Form::open(array('route' => ['school.course.syllabus.store',$school_id, $course->id] , 'method' => 'post', 'class' => 'cmxform form-horizontal tasi-form', 'files' => true)) !!}
                                                    
                                                    <div class="form-group">
                                                        <div class="col-lg-10">
                                                            {!! Form::text('subject', null, array('class' => 'form-control', 'placeholder' => 'subject', 'required')) !!}
                                                        </div>
                                                    </div>

                                                     <div class="form-group">
                                                        <div class="col-lg-10">
                                                            {!! Form::file('file_path', null, array('class' => 'form-control', 'placeholder' => 'upload file', 'required')) !!}
                                                        </div>
                                                    </div>
                                                   

                                                    <div class="form-group">
                                                        <div class="col-lg-10">
                                                        {!! Form::submit('Save', array('class' => 'btn btn-success')) !!}
                                                        </div>
                                                    </div>

                                                    {!! Form::close() !!}

                                                    </div>
                                                </div>
                                            </div>  
                                        
                                        </div>

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

    {!! Html::script('assets/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/datatables/dataTables.bootstrap.js') !!}




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
