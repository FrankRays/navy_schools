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
                                        <!-- <div class="img-wrapper m-r-15"><img src="{!! asset($lab->photo_url) !!}" width="20%" alt="profile photo" class="br-radius"></div> -->
                                        <br>
                                        
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
