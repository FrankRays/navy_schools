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
                                    @include('includes.alert')
                                    <div id="aboutme" class="tab-pane active">
                                    @if($lab->photos->count() > 0 )
                                    <div class="row">
                                        <div class="my-slider col-md-8 col-md-offset-2">
                                            <ul>
                                            @foreach($lab->photos as $photo)
                                                <li>
                                                {!! Html::image($photo->file_path, $photo->description, array('class' => 'thumb')) !!}
                                                </li>
                                            @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="profile-desk">
                                        <table class="table table-condensed">
                                            <thead>
                                                <tr>
                                                    <th colspan="3"><h3>{!! $lab->name !!}</h3></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><b>Lab OIC</b></td>
                                                    <td>
                                                        {!! $lab->oic !!}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Lab OIC contact number</b></td>
                                                    <td>
                                                        {!! $lab->oic_mobile !!}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Lab in charge</b></td>
                                                    <td>
                                                        {!! $lab->lic !!}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Lab in charge contact number</b></td>
                                                    <td>
                                                        {!! $lab->lic_mobile !!}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Lab Facility</b></td>
                                                    <td>
                                                        {!! $lab->lab_facility !!}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Equipment List</b></td>
                                                    <td>
                                                    <ul>
                                                    <?php 
                                                    
                                                        $arr = explode(",",$lab->equipment_list);
                                                        foreach ($arr as $key => $value) {
                                                            echo '<li>'.$value.'</li>';
                                                        }
                                                    ?>
                                                    </ul>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> <!-- end profile-desk -->
                                </div> <!-- about-me -->

                                <div class="panel-footer">
                                
                                <a href="{!! route('school.lab.edit',[ $school_id, $lab->id]) !!}" class="btn btn-success btn-archive edit-demo-modal" href="#" style="margin-right: 3px;">Edit</a>

                                <a href="{!! route('school.lab.photos',[ $school_id, $lab->id]) !!}" class="btn btn-info btn-archive edit-demo-modal" href="#" style="margin-right: 3px;">Manage Photos</a>

                                  <a href="{!! route('school.lab.delete',[ $school_id, $lab->id]) !!}" class="btn btn-danger btn-archive deleteBtn" data-toggle="confirmation" data-title="Delete Data?">Delete</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>



<!-- Page Content Ends -->
<!-- ================== -->
@stop

@section('style')

    {!! Html::style('css/unslider.css') !!}
    {!! Html::style('css/unslider-dots.css') !!}

    <style type="text/css">
        .my-slider{
            min-height: 300px;

        }

    </style>
@stop

@section('script')
    
    {!! Html::script('js/unslider-min.js') !!}

    <!-- for Datatable -->
    <script type="text/javascript">

        jQuery(document).ready(function() {

            $('[data-toggle=confirmation]').confirmation({
              rootSelector: '[data-toggle=confirmation]',
              // other options
            });

            $('.my-slider').unslider({
                animation: 'fade',
                autoplay: true,
                arrows: false
            });

        });

    </script>


@stop
