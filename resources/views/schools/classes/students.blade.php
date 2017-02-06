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
                                        href="{{ route('school.class.create', $school_id) }}">
                                        <button class="btn btn-success">Add Student</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body"  style="overflow-y:auto">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">

                                    <table  id="dataTable" class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>#</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($class->students as $indx => $demo)
                                            
                                            <tr>
                                                <td>{!! $indx+1  !!}</td>
                                                <td>{!! Html::image($demo->photo_url, $demo->name, array('class' => 'thumb', 'height' => '100%')) !!}</td>
                                                <td>{!! $demo->name !!}</td>
                                                <td>
                                                  <a href="{!! route('school.class.show',[$school_id,$demo->id]) !!}" class="btn btn-info btn-xs btn-archive" style="margin-right: 3px;">Details</a>
                                                  <a href="{!! route('school.class.edit',[$school_id,$demo->id]) !!}" class="btn btn-success btn-xs btn-archive" href="#" style="margin-right: 3px;">Edit</a>
                                                  <a href="{!! route('school.class.delete',[$school_id,$demo->id]) !!}" class="btn btn-danger btn-xs btn-archive deleteBtn" data-toggle="confirmation" data-title="Delete Data?">Delete</a></td>
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
                "aaSorting": [],
                "order": []
            });

            $('[data-toggle=confirmation]').confirmation({
              rootSelector: '[data-toggle=confirmation]',
              // other options
            });

        });

    </script>


@stop
