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
                                </ul>

            
                                <div class="tab-content m-0">
                                    <div id="aboutme" class="tab-pane active">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-md-6">
                                            </div>
                                            <div class="col-md-6">
                                                 <a class="pull-right" href="{!! route('staff.create',$type) !!}"><button class="btn btn-success">Add Staff</button></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-desk">
                                    <table  id="dataTable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Serial No.</th>
                                            <th>P/O No.</th>
                                            <th>Rank & Name</th>
                                            <th>Appointment</th>
                                            <th>Contact</th>
                                            <th>#</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($stuffs as $indx=>$demo)

                                            <tr>
                                                <td>{!! $indx+1 !!}</td>
                                                <td>{!! $demo->po !!}</td>
                                                <td>{!! $demo->rank.' '.$demo->name !!}</td>
                                                <td>{!! $demo->appointment !!}</td>
                                                <td>{!! $demo->contact !!}</td>
                                                <td>
                                                    <a href="{!! route('staff.edit',$demo->id) !!}" class="btn btn-success btn-xs btn-archive edit-demo-modal" href="#" style="margin-right: 3px;">Edit</a>
                                                    <a href="{!! route('staff.delete',$demo->id) !!}" class="btn btn-danger btn-xs btn-archive deleteBtn" data-toggle="confirmation" data-title="Delete Data?">Delete</a>
                                                      
                                                </td>
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
@section('style')

{!! Html::style('assets/datatables/jquery.dataTables.min.css') !!}

@endsection

@section('script')

    {!! Html::script('assets/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/datatables/dataTables.bootstrap.js') !!}

    <!-- for Datatable -->
    <script type="text/javascript">

        $(document).ready(function() {

            var table = $('#dataTable').dataTable({
                "aaSorting": [],
                "order": [],
                "pageLength": 20,
                stateSave: true
            });

            $('[data-toggle=confirmation]').confirmation({
              rootSelector: '[data-toggle=confirmation]',
              // other options
            });

        });

    </script>


@stop