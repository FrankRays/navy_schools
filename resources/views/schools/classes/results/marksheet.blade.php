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
                                                <h4>Marksheet: {!! $result->subject !!}</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="panel">
                                                {!! Form::open([ 
                                                'route' => ['school.class.result.file', $school_id, $class->id, $result->id],
                                                'method'=>'post','files'=>'true','class'=>'form-inline'
                                                ]) !!}

                                                    <div class="">
                                                        <div class="input-group">

                                                            {!! Form::file('file_path', null, null, ['class'=>'form-control', 'placeholder'=> 'enter obtained marks']) !!}

                                                            <span class="input-group-btn">
                                                            
                                                            <button type="submit" class="btn btn-effect-ripple btn-success">Save/Update</button>

                                                            </span>
                                                        </div>
                                                    </div>
                                                {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="profile-desk">
                                    <table  id="dataTable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Rank & Name</th>
                                            <th>P/O No</th>
                                            <th>Marks Obtained</th>
                                            <th>Pass Marks</th>
                                            <th>Full Marks</th>
                                            <th>Remarks</th>
                                            <!-- <th>#</th> -->
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($class->students as $demo)

                                            <tr>
                                                <td>{!! $demo->serial_number !!}</td>
                                                <td>{!! $demo->rank !!} {!! $demo->name !!}</td>
                                                <td>{!! $demo->po_number !!}</td>
                                                <td>
                                                
                                                {!! Form::open([ 
                                                'route' => ['school.class.result.update', $school_id, $class->id, $result->id, $demo->id],
                                                'method'=>'post','class'=>'form-inline'
                                                ]) !!}

                                                    <div class="col-md-6">
                                                        <div class="input-group m-t-10">

                                                            {!! Form::text('marks', $demo->marks, null, ['class'=>'form-control', 'placeholder'=> 'enter obtained marks']) !!}

                                                            <span class="input-group-btn">
                                                            
                                                            <button type="submit" class="btn btn-effect-ripple btn-xs btn-primary">Save</button>

                                                            </span>
                                                        </div>
                                                    </div>
                                                {!! Form::close() !!}
                                                </td>
                                                <td>{!! $result->full_marks/2 !!}</td>
                                                <td>{!! $result->full_marks !!}</td>
                                                @if($demo->marks)
                                                    @if($demo->marks >= ($result->full_marks/2))
                                                    <td class="success"> Pass </td>
                                                    @else
                                                    <td class="danger">Fail</td>
                                                    @endif
                                                @else
                                                <td></td>
                                                @endif
                                                <!-- <td>
                                                  <a href="{!! route('school.class.result.show', [ $school_id, $class->id, $demo->id]) !!}" class="btn btn-info btn-xs btn-archive" style="margin-right: 3px;">Details</a>
                                                  <a href="{!! route('school.class.student.edit',[ $school_id, $class->id, $demo->id]) !!}" class="btn btn-success btn-xs btn-archive edit-demo-modal" href="#" style="margin-right: 3px;">Edit</a>
                                                  <a href="{!! route('school.class.student.delete',[ $school_id, $class->id, $demo->id]) !!}" class="btn btn-danger btn-xs btn-archive deleteBtn" data-toggle="confirmation" data-title="Delete Data?">Delete</a>
                                                </td> -->
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>

                            
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