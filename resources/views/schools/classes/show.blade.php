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
                                    <li><a href="{!! route('school.class.students', [$school_id, $class->id]) !!}">Students</a></li>
                                    <li><a href="{!! route('school.class.result', [$school_id, $class->id]) !!}">Result</a></li>
                                    
                                    @if(!$class->approval)
                                    <li class="pull-right btn btn-success btn-xs"><a href="{!! route('school.class.approve',[$school_id, $class->id]) !!}"><i class="fa fa-save"></i>Draft</a></li>
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
                                                        {!! $class->name !!} {!! $class->code !!}
                                                    </td>
                                                </tr>
                                                @if($class->officer)
                                                <tr>
                                                    <td><b>Course Officer</b></td>
                                                    <td>
                                                        {!! $class->officer !!}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if($class->officer_mobile)
                                                <tr>
                                                    <td><b>Course officer's contact number</b></td>
                                                    <td>
                                                        {!! $class->officer_mobile !!}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if($class->chief)
                                                <tr>
                                                    <td><b>Course Chief</b></td>
                                                    <td class="ng-binding">{!! $class->chief !!}</td>
                                                </tr>
                                                @endif
                                                @if($class->chief_mobile)
                                                <tr>
                                                    <td><b>Course chief's contact number</b></td>
                                                    <td class="ng-binding">{!! $class->chief_mobile !!}</td>
                                                </tr>
                                                @endif
                                                @if($class->instructor)
                                                <tr>
                                                    <td><b>Course instructor's contact number</b></td>
                                                    <td class="ng-binding">{!! $class->instructor !!}</td>
                                                </tr>
                                                @endif
                                                @if($class->instructor_mobile)
                                                <tr>
                                                    <td><b>Course instructor's contact number</b></td>
                                                    <td class="ng-binding">{!! $class->instructor_mobile !!}</td>
                                                </tr>
                                                @endif
                                                @if($class->strength > 0)
                                                <tr>
                                                    <td><b>Strength</b></td>
                                                    <td class="ng-binding">{!! $class->strength !!}</td>
                                                </tr>
                                                @endif
                                                <tr>
                                                    <td><b>Duration</b></td>
                                                    <td class="ng-binding">{!! $class->duration !!} weeks</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Start Date</b></td>
                                                    <td class="ng-binding">{!! Carbon\Carbon::parse($class->start_date)->format('d/m/Y') !!}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Termination Date</b></td>
                                                    <td class="ng-binding">{!! Carbon\Carbon::parse($class->end_date)->format('d/m/Y') !!}</td>
                                                </tr>


                                            </tbody>
                                        </table>
                                      <div class="panel-footer">
                                        <a href="{!! route('school.class.edit',[$school_id,$class->id]) !!}" class="btn btn-success btn-xs btn-archive" href="#" style="margin-right: 3px;">Edit</a>
                                        <a href="{!! route('school.class.delete',[$school_id,$class->id]) !!}" class="btn btn-danger btn-xs btn-archive deleteBtn" data-toggle="confirmation" data-title="Delete Data?">Delete</a></td>
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