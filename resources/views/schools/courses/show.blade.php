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
                                    <li class="active"><a>{!! $title !!}</a></li>
                                    @if(!$course->approval)
                                    <li class="pull-right btn btn-success btn-xs"><a href="{!! route('school.course.approve',[$school_id, $course->id]) !!}"><i class="fa fa-save"></i>Draft</a></li>
                                    @endif
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
                                                @if($course->officer)
                                                <tr>
                                                    <td><b>Course Officer</b></td>
                                                    <td>
                                                        {!! $course->officer !!}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if($course->officer_mobile)
                                                <tr>
                                                    <td><b>Course officer's contact number</b></td>
                                                    <td>
                                                        {!! $course->officer_mobile !!}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if($course->chief)
                                                <tr>
                                                    <td><b>Course Chief</b></td>
                                                    <td class="ng-binding">{!! $course->chief !!}</td>
                                                </tr>
                                                @endif
                                                @if($course->chief_mobile)
                                                <tr>
                                                    <td><b>Course chief's contact number</b></td>
                                                    <td class="ng-binding">{!! $course->chief_mobile !!}</td>
                                                </tr>
                                                @endif
                                                @if($course->strength > 0)
                                                <tr>
                                                    <td><b>Strength</b></td>
                                                    <td class="ng-binding">{!! $course->strength !!}</td>
                                                </tr>
                                                @endif
                                                <tr>
                                                    <td><b>Duration</b></td>
                                                    <td class="ng-binding">{!! $course->duration !!} weeks</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Start Date</b></td>
                                                    <td class="ng-binding">{!! Carbon\Carbon::parse($course->start_date)->format('d/m/Y') !!}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Termination Date</b></td>
                                                    <td class="ng-binding">{!! Carbon\Carbon::parse($course->end_date)->format('d/m/Y') !!}</td>
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
