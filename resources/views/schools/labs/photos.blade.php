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
                                    @include('includes.alert')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><h3 class="panel-title">Add New Photo</h3></div>
                                            <div class="panel-body">
                                                {!! Form::open([ 
                                            'route' => ['school.lab.photos.add', $school_id, $lab->id],
                                            'method'=>'post','files'=>'true','class'=>'form-inline'
                                            ]) !!}
                                                    <div class="form-group">
                                                        <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                                        {!! Form::file('file_path', null, null, ['class'=>'form-control', 'placeholder'=> 'enter obtained marks', 'required']) !!}
                                                    </div>
                                                      
                                                    <div class="form-group m-l-12">
                                                        <label class="sr-only" for="exampleInputPassword2">Password</label>
                                                        Description: {!! Form::text('description', null, null, ['class'=>'form-control', 'placeholder'=> 'photo description', "id"=>"exampleInputPassword2"]) !!}
                                                    </div>

                                                    <button type="submit" class="btn btn-success m-l-10">Save</button>
                                                {!! Form::close() !!}
                                            </div> <!-- panel-body -->
                                        </div> <!-- panel -->
                                    </div> <!-- col -->
                                     
                                </div>
                                
                                    <div class="row">
                                        
                                        @foreach($lab->photos as $photo)
                                        <div class="col-md-4">
                                            <span>    
                                                {!! Html::image($photo->file_path, $photo->description, array('class' => 'thumb', 'width'=>'100%')) !!}
                                                
                                                <a href="{!! route('school.lab.photos.delete', [$school_id, $lab->id, $photo->id]) !!}" class="btn btn-danger btn-archive btn-xs deleteBtn" data-toggle="confirmation" data-title="Delete Data?">Delete</a>

                                            </span>
                                        </div>
                                        @endforeach
                                        
                                    </div>
                                    
                                </div>
                                <br> <!-- about-me -->

                                <div class="panel-footer">


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

@stop

@section('script')
    
    <script type="text/javascript">

        jQuery(document).ready(function() {

            $('[data-toggle=confirmation]').confirmation({
              rootSelector: '[data-toggle=confirmation]',
              // other options
            });

        });

    </script>


@stop
