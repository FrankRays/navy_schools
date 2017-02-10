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
                                    <li class="active"><a>Result</a></li>
                                    
                                    @if(!$class->approval)
                                    <li class="pull-right btn btn-success btn-xs"><a href="{!! route('school.class.approve',[$school_id, $class->id]) !!}"><i class="fa fa-save"></i>Draft</a></li>
                                    @endif
                                </ul>

            
                                <div class="tab-content m-0">
                                    <div id="aboutme" class="tab-pane active">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4>Results</h4>
                                            </div>
                                            <div class="col-md-6">
                                                 <a class="pull-right" 
                                                 href="{!! route('school.class.result.create',[$school_id, $class->id]) !!}">
                                                 <button class="btn btn-success">Add Result</button>
                                                 </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-desk">
                                    <table  id="dataTable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Result File</th>
                                            <th>#</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($class->results as $demo)

                                            <tr>
                                                <td>{!! $demo->subject !!}</td>
                                                <td>
                                                @if($demo->file_path)
                                                <a href="{!! $demo->file_path !!}"><i class="fa fa-file fa-2x"></i></a>
                                                @else
                                                Not uploaded
                                                @endif
                                                </td>
                                                <td>
                                                  <a href="{!! route('school.class.result.show', [ $school_id, $class->id, $demo->id]) !!}" class="btn btn-info btn-xs btn-archive" style="margin-right: 3px;">Details</a>
                                                  <a href="{!! route('school.class.result.edit',[ $school_id, $class->id, $demo->id]) !!}" class="btn btn-success btn-xs btn-archive edit-demo-modal" href="#" style="margin-right: 3px;">Edit</a>
                                                  <a href="{!! route('school.class.result.delete',[ $school_id, $class->id, $demo->id]) !!}" class="btn btn-danger btn-xs btn-archive deleteBtn" data-toggle="confirmation" data-title="Delete Data? You may loss all of the marksheets and files under this subject!!!">Delete</a></td>
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