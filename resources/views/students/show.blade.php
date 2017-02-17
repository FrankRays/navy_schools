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
                                    @include('includes.alert')
                                        @if($student->photo_url)
                                        <div class="img-wrapper m-r-15"><img src="{!! asset($student->photo_url) !!}" width="20%" alt="profile photo" class="br-radius"></div>
                                        @endif
                                        <br>
                                        <h1>{!! $student->name !!}</h1>
                                        <table class="table table-condensed">
                                            <thead>
                                                <tr>
                                                    <th colspan="3"><h3>Details Information</h3></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><b>Serial Number</b></td>
                                                    <td>
                                                        {!! $student->serial_number !!}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>P/O no.</b></td>
                                                    <td>
                                                        {!! $student->po_number !!}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Full Name</b></td>
                                                    <td>
                                                        {!! $student->name !!}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Rank</b></td>
                                                    <td class="ng-binding">{!! $student->rank !!}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Contact No.</b></td>
                                                    <td class="ng-binding">{!! $student->mobile !!}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Email</b></td>
                                                    <td class="ng-binding">{!! $student->email !!}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Blood Group</b></td>
                                                    <td class="ng-binding">{!! $student->blood_group !!}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Accommodation</b></td>
                                                    <td class="ng-binding">{!! $student->barrack_location !!}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Permanent Address</b></td>
                                                    <td class="ng-binding">{!! $student->permanent_address !!}</td>
                                                </tr>
                                            
                                            </tbody>
                                        </table>
                                    </div> <!-- end profile-desk -->
                                </div> <!-- about-me -->

                                <div class="panel-footer">
                                
                                <a href="{!! route('school.class.student.edit',[ $school_id, $class_id, $student->id]) !!}" class="btn btn-success btn-archive edit-demo-modal" href="#" style="margin-right: 3px;">Edit</a>

                                  <a href="{!! route('school.class.student.delete',[ $school_id, $class_id, $student->id]) !!}" class="btn btn-danger btn-archive deleteBtn" data-toggle="confirmation" data-title="Delete Data?">Delete</a>
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
