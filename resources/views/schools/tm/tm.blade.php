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
                                     <a class="pull-right" 
                                        href="{!! route('school.tm.create', $school_id) !!}">
                                        <button class="btn btn-success">Add Special Instructions</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body" style="overflow-y:auto">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="text-center">TM</h4>
                                    <hr>
                                    <table  id="dataTable1" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>File</th>
                                            <th>#</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($tm as $demo)

                                            <tr>
                                                <td>{!! $demo->created_at->format('d-m-y') !!}</td>
                                                <td>
                                                <a href="{!! $demo->file_path !!}" class="btn btn-default  btn-archive" style="margin-right: 3px;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                                </td>
                                                <td>
                                                  <a href="{!! route('school.tm.delete', [$school_id, $demo->id]) !!}" class="btn btn-danger btn-xs btn-archive deleteBtn" data-toggle="confirmation" data-title="Delete Data?">Delete</a>
                                                </td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                <div class="col-md-6">
                                        <h4 class="text-center">Daily Order</h4>
                                        <hr>
                                        <table  id="dataTable2" class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>File</th>
                                                <th>#</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($do as $demo)

                                                <tr>
                                                    <td>{!! $demo->created_at->format('d-m-y') !!}</td>
                                                    <td>
                                                    <a href="{!! $demo->file_path !!}" class="btn btn-default  btn-archive" style="margin-right: 3px;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                                    </td>
                                                    <td>
                                                      <a href="{!! route('school.tm.delete', [$school_id, $demo->id]) !!}" class="btn btn-danger btn-xs btn-archive deleteBtn" data-toggle="confirmation" data-title="Delete Data?">Delete</a>
                                                    </td>
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

            var table1 = $('#dataTable1').dataTable();
            var table2 = $('#dataTable2').dataTable();

            $('[data-toggle=confirmation]').confirmation({
              rootSelector: '[data-toggle=confirmation]',
              // other options
            });

        });

    </script>


@stop
