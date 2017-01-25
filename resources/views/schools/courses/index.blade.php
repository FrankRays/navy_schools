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
                                        href="{{ route('school.course.create', $school_id) }}">
                                        <button class="btn btn-success">Add a course</button>
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
                                            <th>id</th>
                                            <th>Name</th>
                                            <th>Code</th>
                                            @if($hasRight = Auth::user()->hasRole('admin')||
                                                Auth::user()->hasRole('electrical')||
                                                Auth::user()->hasRole('engineering')||
                                                Auth::user()->hasRole('seamanship'))
                                            <th>Approval</th>
                                            @endif
                                            <th>#</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($classes as $demo)
                                            
                                            @if($today->diffInDays(Carbon\Carbon::parse($demo->start_date)) < 10)
                                            <tr class='danger'>
                                            @elseif($today->diffInDays(Carbon\Carbon::parse($demo->start_date)) < 20)
                                            <tr class="warning">
                                            @elseif($today >= $demo->start_date && $today <= $demo->end_date)
                                            <tr class="success">
                                            @else
                                            <tr>
                                            @endif
                                                <td>{!! $demo->id !!}</td>
                                                <td>{!! $demo->name !!}</td>
                                                <td>{!! $demo->code !!}</td>
                                                @if($hasRight)
                                                @if($demo->approval)
                                                    <td class="panel info">Approved</td>
                                                @else
                                                    <td class="panel danger">
                                                        <a href="{!! route('school.course.approve',[$school_id, $demo->id]) !!}" class="btn btn-success btn-xs btn-archive" style="margin-right: 3px;">Approve
                                                        </a>
                                                    </td>
                                                @endif
                                                @endif
                                                <td>
                                                  <a href="{!! route('school.course.show',[$school_id,$demo->id]) !!}" class="btn btn-info btn-xs btn-archive" style="margin-right: 3px;">Details</a>
                                                  <a href="{!! route('school.course.edit',[$school_id,$demo->id]) !!}" class="btn btn-success btn-xs btn-archive" href="#" style="margin-right: 3px;">Edit</a>
                                                  <a href="{!! route('school.course.delete',[$school_id,$demo->id]) !!}" class="btn btn-danger btn-xs btn-archive deleteBtn" data-toggle="confirmation" data-title="Delete Data?">Delete</a></td>
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
                "order": [0,'desc']
            });

            $('[data-toggle=confirmation]').confirmation({
              rootSelector: '[data-toggle=confirmation]',
              // other options
            });

        });

    </script>


@stop
