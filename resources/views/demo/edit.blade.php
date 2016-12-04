@extends('layouts.default')
@section('content')
    <div class="wraper container-fluid">

        @include('includes.alert')
        
        <!-- Masiur Rahman Siddiki -->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                    <h4>{{ $title }}</h4>
                            </div>
                            <div class="col-md-6">                            
                                <a class="pull-right" href="{!! route('project.index')!!}"><button class="btn btn-success">Project List</button></a>
                            </div>
                         </div>
                    </div>

                    <div class="panel-body">
                            
                        <div class=" form"> 

                            {!! Form::model($project, ['route' => ['project.update',$project->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

                            <div class="form-group">
                                {!! Form::label('name', "Project Name*", array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-lg-6">
                                    {!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Enter project Name', 'required' => 'required', 'aria-required' =>'true')) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('git_link', "Git Link*", array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-lg-6">
                                    {!! Form::text('git_link', null, array('class' => 'form-control', 'placeholder' => 'Git Link of the project', 'required' => 'required')) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('tech_description', "Technical Description*", array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-lg-6">
                                    {!! Form::textarea('tech_description', null, array('class' => 'form-control','placeholder' => 'Description of the project', 'row' => 1, 'required')) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('category_id', "Category*", array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-lg-6">
                                    {!! Form::select('category_id', $categories, null, array('class' => 'form-control chosen-select', 'required' => 'required', 'data-placeholder' => "Select Category" , 'tabindex'=>2)) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('language_id', "Language*", array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-lg-6">
                                    {!! Form::select('language_id[]', $languages, $selectedLanguage , array('class' => 'form-control chosen-select','multiple', 'data-placeholder' => 'Select Language')) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('developer_id', "Developer*", array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-lg-6">
                                    {!! Form::select('developer_id[]', $users, $selectedDeveloper, array('class' => 'form-control chosen-select' ,'id' => 'chosen-select', 'multiple', 'data-placeholder' => 'Choose a Developer')) !!}
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                {!! Form::label('supervisor', "Supervisor*", array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-lg-6">
                                    {!! Form::select('supervisor', $users, null, array('class' => 'form-control chosen-select' ,'id' => 'chosen-select', 'data-placeholder' => 'Project Supervisor')) !!}
                                </div>
                            </div> -->

                            <div class="form-group">
                                {!! Form::label('domain', "Project Domain", array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-lg-6">
                                    {!! Form::text('domain', $project->details->domain, array('class' => 'form-control', 'placeholder' => 'Up & Running Server Domain')) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('credentials', "Credentials*", array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-lg-6">
                                    {!! Form::text('credentials', $project->details->credentials, array('class' => 'form-control', 'placeholder' => 'Username, Passwords etc.')) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('description', "Full Description", array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-lg-6">
                                    {!! Form::textarea('description', $project->details->description, array('class' => 'form-control','placeholder' => 'Description of the Project', 'row' => 2)) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('dependency', "Dependency of the Project", array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-lg-6">
                                    {!! Form::textarea('dependency', $project->details->dependency, array('class' => 'form-control', 'data-placeholder' => "if this project is dependend on any project or other things", 'row' => 2)) !!}
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                {!! Form::label('dependent_pro_id', "Dependent Project*", array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-lg-6">
                                    {!! Form::select('dependent_pro_id[]', $projects, null, array('class' => 'form-control chosen-select','multiple', 'data-placeholder' => 'Select Project')) !!}
                                </div>
                            </div> -->

                            <div class="form-group">
                                {!! Form::label('db_backup', "Backup of the Project*", array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-lg-6">
                                    {!! Form::file('db_backup', null, array('class' => 'form-control', 'placeholder' => 'Backup of the Project', 'required' => 'required')) !!}
                                </div>
                            </div>

                            
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-6">
                                {!! Form::submit('Save Changes', array('class' => 'btn btn-success')) !!}
                                </div>
                            </div>

                            {!! Form::close() !!}
                        </div>
                             
                    </div>
                </div>

            </div>

        </div>

@stop


@section('style')

    {!! Html::style('chosen/chosen.css') !!}
    {!! Html::style('assets/summernote/summernote.css') !!}
@stop

@section('script')

    {!! Html::script('chosen/chosen.jquery.js') !!}
    {!! Html::script('assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js') !!}
    {!! Html::script('assets/summernote/summernote.min.js') !!}


    {!! Html::script('assets/jquery.validate/jquery.validate.min.js') !!}
    {!! Html::script('assets/jquery.validate/form-validation-init.js') !!}



    <!-- for editor-->
   <!-- <script type="text/javascript">

        jQuery(document).ready(function(){
                
                $('.wysihtml5').wysihtml5();

                $('.summernote').summernote({
                    height: 200,                 // set editor height

                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor

                    focus: true                 // set focus to editable area after initializing summernote
                });

        });
    </script> -->
    <script type="text/javascript">
    // var config = {
    //   '.chosen-select'           : {},
    //   '.chosen-select-deselect'  : {allow_single_deselect:true},
    //   '.chosen-select-no-single' : {disable_search_threshold:10},
    //   '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
    //   '.chosen-select-width'     : {width:"95%"}
    // }
    // for (var selector in config) {
    //   $(selector).chosen(config[selector]);
    // }
    $(".chosen-select").chosen({no_results_text: "Oops, nothing found!"});
  </script>


@stop