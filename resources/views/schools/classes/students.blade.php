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
                                    <li class="active"><a>Students</a></li>
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
                                                <h4>Students</h4>
                                            </div>
                                            <div class="col-md-6">
                                                 <a class="pull-right" href="{!! route('school.class.student.create', [$school_id, $class->id]) !!}"><button class="btn btn-success">Add Student</button></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-desk">
                                    <table  id="dataTable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Serial No.</th>
                                            <th>P/O No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>#</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($class->students as $demo)

                                            <tr>
                                                <td>{!! $demo->serial_number !!}</td>
                                                <td>{!! $demo->po_number !!}</td>
                                                <td>{!! $demo->name !!}</td>
                                                <td>{!! $demo->email !!}</td>
                                                <td>
                                                  <a href="{!! route('school.class.student.show', [ $school_id, $class->id, $demo->id]) !!}" class="btn btn-info btn-xs btn-archive" style="margin-right: 3px;">Details</a>
                                                  <a href="{!! route('school.class.student.edit',[ $school_id, $class->id, $demo->id]) !!}" class="btn btn-success btn-xs btn-archive edit-demo-modal" href="#" style="margin-right: 3px;">Edit</a>
                                                  <a href="{!! route('school.class.student.delete',[ $school_id, $class->id, $demo->id]) !!}" class="btn btn-danger btn-xs btn-archive deleteBtn" data-toggle="confirmation" data-title="Delete Data?">Delete</a></td>
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