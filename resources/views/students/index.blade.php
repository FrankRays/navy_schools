@extends('layouts.default')
@section('content')

    <div class="row">
        <div class="col-lg-12">

            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-default">
                    @include('includes.alert')
                    <span id="success"></span>
                    <span id="error"></span>
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>{{ $title }}</h4>
                                </div>
                                <div class="col-md-6">
                                     <a class="pull-right" href="{!! route('student.create') !!}"><button class="btn btn-success">Add Student</button></a>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body"  style="overflow-y:auto">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">

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
                                        @foreach ($demos as $demo)

                                            <tr>
                                                <td>{!! $demo->serial_number !!}</td>
                                                <td>{!! $demo->po_number !!}</td>
                                                <td>{!! $demo->name !!}</td>
                                                <td>{!! $demo->email !!}</td>
                                                <td>
                                                  <a href="{!! route('student.show', $demo->id) !!}" class="btn btn-info btn-xs btn-archive" style="margin-right: 3px;">Details</a>
                                                  <a href="{!! route('student.edit',$demo->id) !!}" class="btn btn-success btn-xs btn-archive edit-demo-modal" href="#" style="margin-right: 3px;">Edit</a>
                                                  <a href="{!! route('student.delete',$demo->id) !!}" class="btn btn-danger btn-xs btn-archive deleteBtn" data-toggle="confirmation" data-title="Delete Data?">Delete</a></td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
