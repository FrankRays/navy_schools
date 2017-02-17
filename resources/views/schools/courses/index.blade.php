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
                                            <th>Serial</th>
                                            <th>Name</th>
                                            <th>Batch</th>
                                            @if($hasRight = Auth::user()->hasRole('admin')||
                                                Auth::user()->hasRole('electrical')||
                                                Auth::user()->hasRole('engineering')||
                                                Auth::user()->hasRole('seamanship'))
                                            <th>Verification</th>
                                            @endif
                                            <th>Days Left</th>
                                            <th>Status</th>
                                            <th>#</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($classes as $indx => $demo)
                                            
                                            
                                            <tr>
                                                <td>{!! $indx+1  !!}</td>
                                                <td>{!! $demo->name !!}</td>
                                                <td>{!! $demo->code !!}</td>
                                                @if($hasRight)
                                                @if($demo->approval)
                                                    <td class="panel info">verified</td>
                                                @else
                                                    <td class="panel danger">
                                                        <a href="{!! route('school.course.approve',[$school_id, $demo->id]) !!}" class="btn btn-success btn-xs btn-archive" style="margin-right: 3px;">Draft
                                                        </a>
                                                    </td>
                                                @endif
                                                @endif
                                                <td> 
                                                @if($today->diffInDays(Carbon\Carbon::parse($demo->start_date)) < 90 && $today < $demo->start_date)
                                                    D-{!! $today->diffInDays(Carbon\Carbon::parse($demo->start_date)) !!}
                                                @endif

                                                </td>
                                                <td>@if($today->diffInDays(Carbon\Carbon::parse($demo->start_date)) < 8 && $today < $demo->start_date)
                                                    FINAL PREPARATION<br>
                                                @endif
                                                @if($today->diffInDays(Carbon\Carbon::parse($demo->start_date)) < 15 && $today < $demo->start_date)
                                                    CLASS ROUTINE<br>
                                                @endif
                                                @if($today->diffInDays(Carbon\Carbon::parse($demo->start_date)) < 31 && $today < $demo->start_date)
                                                    PRE-COURSE MATERIAL<br>
                                                @endif
                                                @if($today->diffInDays(Carbon\Carbon::parse($demo->start_date)) < 56 && $today < $demo->start_date)
                                                    LETTER FOR VISIT PROGRAMME<br>
                                                @endif
                                                @if($today->diffInDays(Carbon\Carbon::parse($demo->start_date)) < 61 && $today < $demo->start_date)
                                                    COURSE YELLOW<br>
                                                @endif
                                                @if($today->diffInDays(Carbon\Carbon::parse($demo->start_date)) < 76 && $today < $demo->start_date)
                                                    COURSE SYLLABUS<br>
                                                @endif
                                                @if($today->diffInDays(Carbon\Carbon::parse($demo->start_date)) < 90 && $today < $demo->start_date)
                                                    INSTRUCTOR INVITATION<br>
                                                @endif
                                                @if($today->diffInDays(Carbon\Carbon::parse($demo->start_date)) < 91 && $today < $demo->start_date)
                                                    COURSE WILL COMMENSE<br>
                                                @endif
                                                @if($today >= $demo->start_date && $today <= $demo->end_date)
                                                    STARTED
                                                @endif
                                                </td>
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
