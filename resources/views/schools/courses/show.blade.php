@extends('layouts.default')
@section('content')

  <!-- Page Content Start -->
            <!-- ================== -->



                <div class="row m-t-30">
                    <div class="col-sm-12">
                        <div class="panel panel-default p-0">
                            <div class="panel-body p-0">
                                <ul class="nav nav-tabs profile-tabs">
                                    <li class="active"><a data-toggle="tab" href="#aboutme">{!! $title !!}</a></li>
                                </ul>

                                <div class="tab-content m-0">

                                    <div id="aboutme" class="tab-pane active">
                                    <div class="profile-desk">
                                
                                        <table class="table table-condensed">
                                            <tbody>

                                                <tr>
                                                    <td><b>Course Full Name</b></td>
                                                    <td>
                                                        {!! $course->name !!} {!! $course->code !!}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Officer</b></td>
                                                    <td>
                                                        {!! $course->officer !!}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Officer's Mobile</b></td>
                                                    <td>
                                                        {!! $course->officer_mobile !!}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Chief</b></td>
                                                    <td class="ng-binding">{!! $course->chief !!}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Chief's mobile</b></td>
                                                    <td class="ng-binding">{!! $course->chief_mobile !!}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Strength</b></td>
                                                    <td class="ng-binding">{!! $course->strength !!}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Duration</b></td>
                                                    <td class="ng-binding">{!! $course->duration !!} weeks</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Start Date</b></td>
                                                    <td class="ng-binding">{!! date('d-m-y', strtotime($course->start_date)) !!}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>End Date</b></td>
                                                    <td class="ng-binding">{!! date('d-m-y', strtotime($course->end_date)) !!}</td>
                                                </tr>


                                            </tbody>
                                        </table>
                                    </div> <!-- end profile-desk -->
                                </div> <!-- about-me -->

                                <div class="panel-footer">
                                    <a href="{!! route('school.course.edit',[$school_id,$course->id]) !!}" class="btn btn-success btn-xs btn-archive" href="#" style="margin-right: 3px;">Edit</a>
                                    <a href="{!! route('school.course.delete',[$school_id,$course->id]) !!}" class="btn btn-danger btn-xs btn-archive deleteBtn" data-toggle="confirmation" data-title="Delete Data?">Delete</a></td>
                                </div>
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
