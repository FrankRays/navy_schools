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
                                    <li><a href="{!! route('school.class.show', [$school_id, $class_id]) !!}">{!! $title !!}</a></li>
                                    <li><a href="{!! route('school.class.students', [$school_id, $class_id]) !!}">Students</a></li>
                                    <li><a href="{!! route('school.class.result', [$school_id, $class_id]) !!}">Result</a></li>
                                    
                                </ul>

            
                                <div class="tab-content m-0">
                                    <div id="aboutme" class="tab-pane active">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4>{!! $title !!}</h4>
                                            </div>
                                            <div class="col-md-6">
                                                 <a class="pull-right" href="{!! route('school.class.result', [$school_id, $class_id]) !!}"><button class="btn btn-success">Back</button></a>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="profile-desk">
                                        <table class="table table-stripped table-bordered" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Subject \ Student</th>
                                                    @foreach($students as $student)
                                                    <th>{!! $student->name !!}</th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($rows as $in=>$row)
                                                <tr>
                                                    <td>{!! $row !!}</td>
                                                    @foreach($students as $indx=>$student)
                                                    <td>{{ $data[$in][$indx] }}</td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                                <tr class="info">
                                                    <td>Total Marks</td>
                                                    @foreach($students as $indx=>$student)
                                                    <td>{!! $totals[$indx] !!}</td>
                                                    @endforeach
                                                </tr>
                                                <tr class="info">
                                                    <td>Total Percentage</td>
                                                    @foreach($students as $indx=>$student)
                                                    <td>{!! $percentage[$indx] !!}</td>
                                                    @endforeach
                                                </tr>
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