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
                                     <a class="pull-right create-demo-modal" data-target="createDemo" data-toggle="modal" href="#"><button class="btn btn-success">Add Demo</button></a>
                                </div>
                            </div>
                        </div>            
                        <div class="panel-body"  style="overflow-y:auto">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                               
                                    <table  id="dataTable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Regis</th>
                                            <th>Address</th>
                                            <th>Sex</th>
                                            <th>#</th>
                                            <th>#</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($demos as $demo)

                                            <tr>
                                                <td>{!! $demo->id !!}</td>
                                                <td>
                                                    <a class="show-demo-modal" data-toggle="modal"  data-demo-id="{{ $demo->id }}" data-demo-url="{!! route('demo.show',$demo->id) !!}"  href="#" style="">{!! $demo->name !!}</a>
                                                </td>
                                                <td>{!! $demo->email !!}</td>
                                                <td>{!! $demo->reg !!}</td>
                                                <td>{!! $demo->address !!}</td>
                                                <td>{!! $demo->sex !!}</td>
                                                <td><a class="btn btn-success btn-xs btn-archive edit-demo-modal" data-toggle="modal"  data-demo-id="{{ $demo->id }}" data-demoUpdateUrl="{!! route('demo.update',$demo->id) !!}" data-demo-url="{!! route('demo.edit',$demo->id)!!}" href="#" style="margin-right: 3px;">Edit</a></td>
                                                <td><a href="#" class="btn btn-danger btn-xs btn-archive deleteBtn" data-toggle="modal" data-demo-url="{!! route('demo.delete',$demo->id) !!}" data-target="#deleteConfirm" deleteId="{!! $demo->id !!}">Delete</a></td>
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

 
@include('sections.modals')  <!-- the two modals of this page  is kept in another folder for convenience  -->


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
            
            var table = $('#dataTable').dataTable();
            var thisPageUrl = "{{ route('demo.index') }}";
            // console.log(thisPageUrl);

            var deleteAttemptr = '';
            $(document).on("click", ".deleteBtn", function() {
                var deleteId = $(this).attr('deleteId');
                var url = $(this).data('demo-url');
                var rowSelected = $(this).closest("tr"); // catch the <tr></tr> of the expecting to be delete item
                var row1 = $(this).parents('tr'); // catch the <tr></tr> of the expecting to be delete item
                // console.log(rowSelected);
                // console.log(row1);
                deleteAttemptr = $(this).parent().parent(); // catch the <tr></tr> of the expecting to be delete item
                // console.log(deleteAttemptr);
                // $(".deleteForm").attr("action", url+'/'+deleteId);
                $("#deleteButtonYes").click(function(e){
                    
                    e.preventDefault();
                    // $('form.deleteForm').serialize();
                       $.ajax({
                            type: "get",
                            url: url,
                            data: $('form.deleteForm').serialize(),
                            success: function(response){
                                if(response.status_code == '201'){
                                    var message = 'Successfull';
                                    console.log(message);

                                    // generatePopUpMessage(response.data, 'success');
                                    //$(".carousel-inner").html(response.data);
                                    // $(this).modal('hide');
                                    //console.log(response);
                                    var message = '<div class="alert alert-success alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+response.data+'<br/></div>';
                                    $('#success').html('');
                                    $('#success').html(message);
                                    $("#deleteConfirm").modal('hide');
                                    // deleteAttemptr.remove().draw();
                                    // table.row(row1).remove().draw();
                                    deleteAttemptr.remove();               
                                }
                                
                                console.log(response);
                            },
                            error: function($response){
                                console.log($response);
                                var message = 'Something Went Wrong';

                                //var message = "";
                                // var response = $response.responseJSON;
                                // console.log(response);
                                // var obj = response.error;
                                // for (var key in obj) {
                                //     message += obj[key]+"<br>";
                                // }
                                var message = '<div class="alert alert-danger alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+message+'<br/></div>';
                                    $('#error').html('');
                                    $('#error').html(message);
                                // generatePopUpMessage(message, 'danger');
                                // $("#deleteConfirm").modal('hide');
                                $('#deleteConfirm').hide();
                                $('.modal-backdrop').hide();
                                //$("#error").html(response);
                            }
                        }); //ajax call end
                }); // delete button click event end 
            });

            //triggered when modal is about to be shown
            // $('#showDetails').on('show.bs.modal', function(e) {

            //     //get data-id attribute of the clicked element
            //     var dataId = $(e.relatedTarget).data('data-id');

            //     //populate the textbox
            //     $(e.currentTarget).find('#data').val(dataId);
            // });
             $(document).on('click', '.show-demo-modal', function(){
                    // get demo -id from where the modal is called with data-demo-id
                    var demo = null;
                    var demoId = $(this).data('demo-id');
                    var demoUrl = $(this).data('demo-url');
                    var infoModal = $('#showDetails'); // modal id 
                    
                    // console.log(demoUrl);
                    // return;
                    // Ajax Call
                    $.ajax({
                        url : demoUrl,  // which url should be called to the backEnd , this url is generated from where the modal is called
                        
                        method : 'GET', 
                        dataType : 'json',
                        // result success or error below 
                        success : function(response){
                           
                            // var message = response.data.message;
                            // var success = '<div class="alert alert-success alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+message+'</div>'
                            // this.span.html('');
                            // console.log(response);
                            demo = response;
                            // return;
                            
                            // saveButtonReference.hide(500);
                            htmlData = '<p><b>Name:</b><br>'+response.name+'</p>'+
                                        '<p><b>Email:</b><br>'+response.email+'</p>'+
                                        '<p><b>Registration:</b><br>'+response.reg+'</p>';
                                        // '<p><b>Built-in:</b><br>'; // assign html with expected value 
                            /* this function works like foreach loop first parameter is the array and second parameter within
                            function() is the variable to access the single value in that array */
                            // $.each(response.language, function(index, singleLanguage){
                            //    htmlData += '<i>'+singleLanguage.name+'</i>,';  
                            // });
                            // htmlData += '</p><p><b>Developers:</b><br> ';
                            // $.each(response.developer, function(index, singleDeveloper){
                            //    htmlData += '<i>'+singleDeveloper.name+'</i>,';
                            //    // console.log('a'); to check if the loop is working 
                            // });
                            // htmlData += '</p><p><b>Supervisor:</b><br> ';
                            // $.each(response.supervisor, function(index, singleSupervisor){
                            //    htmlData += '<i>'+singleSupervisor.name+'</i>,';
                            // });
                            htmlData += '</p><p><b>Address:</b><br>'+(response.address != null ? response.address : 'নাই') +'</p>'+
                                        '<p><b>Sex:</b><br>'+(response.sex != null? response.sex : 'রাতুল ভাই জানে') +'</p>';
                                        // '<p><b>Full Description:</b><br>'+(response.details.description != null ? response.details.description : 'রাতুল ভাই জানে')+'</p>'+
                                        // '<p><b>Dependency:</b><br>'+(response.details.dependency != null ? response.details.dependency : 'রাতুল ভাই জানে') +'</p>'+
                                        // '<p><b>Dependent demo:</b><br>'+(response.details.dependent_pro_id != null ? response.details.dependent_pro_id : 'রাতুল ভাই জানে') +'</p>'+
                                        // '<p><b>Database Backup:</b><br><a href="'+(response.details.db_backup != null ? response.details.db_backup : 'রাতুল ভাই জানে') +'"><button class="btn btn-info">Download</button></a></p>';
                            infoModal.find('.modal-body').html(htmlData);
                            infoModal.find('.modal-title').html(response.name);
                            $('#showDetails').modal('toggle');
                            $('#error').html('');
                        
                        },
                        error : function(errorResponse){
                            console.log(errorResponse);
                            // var messages = jQuery.parseJSON(errorResponse.responseText);
                            var msg = 'Something went wrong.';
                            var message = '<div class="alert alert-danger alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+msg+'<br/></div>';
                                
                            $('#error').html(message);
                            // console.log(message);
                          
                        }
                    });
                    // Ajax Call End 

                    return false;

            });

            function generatePopUpMessage(message, type){
                var message = '<div class="alert alert-'+type+' alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+message+'<br/></div>';
                $('#error1').html('');
                $('#error1').html(message);
                
            }

                // these above code concept line was borrowed from legaats demo which was done by Mr. Md. Nayeem Iqubal Joy. Also , he helped dubugging it. 
            $(document).on('click', '.create-demo-modal', function(){
                // console.log('fkjdkfj');
                // var item_count = {{count($demos)}};
                // console.log(item_count);
                $('#createDemo').modal('toggle');

                $("#submitDemo").click(function(e){
                    e.preventDefault();

                    var $form = $(this);
                    // var $target = $($form.attr('data-target'));
                    
                    $.ajax({
                        type: "POST",
                        url: $form.attr('action'),
                        data: $('form.createForm').serialize(),
                        dataType: 'json',
                        // function(data) {
                        //     console.log(data);
                        // },
                        success: function(response){
                            console.log('ok success');
                            console.log(response);
                            if(response.status_code == '201'){
                                 // var message = 'Successfull';
                                    var message = '<div class="alert alert-success alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+response.message+'<br/></div>';
                                    $('#success').html('');
                                    $('#success').html(message);
                                    
                                    // generatePopUpMessage(response.data, 'success');
                                    //$(".carousel-inner").html(response.data);
                                    // $(this).modal('hide');
                                    //console.log(response);
                                    $("#createDemo").modal('hide');
                                        var newRow = '<tr>\
                                            <td>'+response.data.id+'</td>\
                                            <td>\
                                                <a class="show-demo-modal" data-toggle="modal"  data-demo-id="'+response.data.id+'" data-demo-url="'+thisPageUrl+'/'+response.data.id+'/show"  href="#" style="">'+response.data.name+'</a>\
                                            </td>\
                                            <td>'+response.data.email+'</td>\
                                            <td>'+response.data.reg+'</td>\
                                            <td>'+response.data.address+'</td>\
                                            <td>'+response.data.sex+'</td>\
                                            <td><a class="btn btn-success btn-xs btn-archive edit-demo-modal" data-toggle="modal"  data-demo-id="'+response.data.id+'" data-demoUpdateUrl="'+thisPageUrl+'/'+response.data.id+'" data-demo-url="'+thisPageUrl+'/'+response.data.id+'/edit" href="#" style="margin-right: 3px;">Edit</a></td>\
                                            <td><a href="#" class="btn btn-danger btn-xs btn-archive deleteBtn" data-toggle="modal" data-demo-url="'+thisPageUrl+'/delete/'+response.data.id+'" data-target="#deleteConfirm" deleteId="'+response.data.id+'">Delete</a></td>\
                                        </tr>';

                                    $("tbody").append(newRow);
                                    // location.reload(); // refresh page 
                                                   
                                }


                            // $("#thanks").html(msg)
                            // $("#form-content").modal('hide'); 
                        },
                        error: function(errorRespone){
                            console.log('Not ok, Failed');
                            // var message = 'Something Went Wrong';
                                var message = "";
                                console.log(errorRespone);
                                // var ett = errorRespone.responseText;
                                // console.log(ett);
                                var response = errorRespone.responseJSON; // getting object 
                                // console.log(response);

                                for (var key in response) {
                                    message += response[key]+"<br>";
                                }
                                // console.log(message);
                                generatePopUpMessage(message, 'danger');
                                // $("#error").html(message);
                        }
                    }); // end of ajax
                }); // end of submit button click 
                
            }); // end of create 
            // 
            // begining of edit
            $(document).on('click', '.edit-demo-modal', function(){
                // console.log('fkjdkfj');
                var demoId = $(this).data('demo-id');
                    var demoUrl = $(this).data('demo-url');
                    console.log(demoUrl);
                    var infoModal = $('#editDemo'); // modal id 
                    var demoUpdateUrl = "{{ route('demo.index') }}/"+demoId;
                    console.log(demoUpdateUrl);
                    
                    // var demoUpdateUrl = $(this).data('demoUpdateUrl'); // this does not work 
                    // console.log(demoUpdateUrl);

                 $('#editDemo').modal('toggle');
                   $.ajax({
                        type: "GET",
                        url: demoUrl,
                        // data: $('form.editForm').serialize(),
                        dataType: 'json',
                        // function(data) {
                        //     console.log(data);
                        // },
                        success: function(response){
                            console.log('ok success');
                            console.log(response);
                            
                            htmlData = '<div class="form-group"><label for="name" class="control-label col-lg-2">Demo Name*</label>'+
                                '<div class="col-lg-8"><input class="form-control" value="'+response.name+'" placeholder="Enter demo Name" required="required" name="name" type="text" id="name"></div>'+
                                '</div>'+
                                '<div class="form-group"><label for="email" class="control-label col-lg-2">Email Address*</label>'+
                                '<div class="col-lg-8"><input class="form-control" value="'+response.email+'" placeholder="Enter a valid email address" required="required" name="email" type="text" id="email"></div>'+
                                '</div>'+
                                '<div class="form-group"><label for="reg" class="control-label col-lg-2">Registration Number*</label>'+
                                '<div class="col-lg-8"><input class="form-control" value="'+response.reg+'" placeholder="Registration Number" required="required" name="reg" type="text" id="reg"></div>'+
                                '</div>'+
                                '<div class="form-group"><label for="address" class="control-label col-lg-2">Full Address*</label>'+
                                '<div class="col-lg-8"><textarea class="form-control" placeholder="Description of the demo" row="2" required="required" name="address" cols="50" rows="10" id="address">'+response.address+'</textarea></div>'+
                                '</div>'+
                                '<div class="form-group"><label for="sex" class="control-label col-lg-2">Sex*</label>'+
                                '<div class="col-lg-8"><select class="form-control chosen-select" required="required" data-placeholder="Select Category" tabindex="2" id="sex" name="sex"><option value="Female">Female</option><option value="Male">Male</option></select></div>'+
                                '</div>';
                            infoModal.find('.modal-body-form').html(htmlData);
                            infoModal.find('.modal-title').html(response.name);
                            // $.ajax({                 // ajax call to submit and update data 
                            //     type: "PUT",
                            //     url: demoUpdateUrl,
                            //     data: $('form.editForm').serialize(),
                            //     dataType: 'json',
                                
                            //     success: function(response){
                            //         console.log('ok success');
                            //         console.log(response);
                            //     },
                            //     error: function($response){
                            //         console.log($response);
                            //     }
                            // }); // ajax call end 
                            $("#submitEditDemo").click(function(e){
                                e.preventDefault();

                                var $form = $(this);
                                // var $target = $($form.attr('data-target'));
                                
                                $.ajax({
                                    type: "PUT",
                                    url: demoUpdateUrl,
                                    data: $('form.editForm').serialize(),
                                    dataType: 'json',
                                    success: function(response){
                                        console.log('ok success');
                                        console.log(response);
                                        if(response.status_code == '201'){
                                             // var message = 'Successfull';
                                                var message = '<div class="alert alert-success alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+response.data+'<br/></div>';
                                                $('#success').html('');
                                                $('#success').html(message);
                                                
                                                // generatePopUpMessage(response.data, 'success');
                                                //$(".carousel-inner").html(response.data);
                                                // $(this).modal('hide');
                                                //console.log(response);
                                                $("#editDemo").modal('toggle');
                                                location.reload(); // refresh page 
                                                               
                                            }


                                        // $("#thanks").html(msg)
                                        // $("#form-content").modal('hide'); 
                                    },
                                    error: function($response){
                                        // alert('kfdjk');
                                        // var message = 'Something Went Wrong';
                                            var message = "";
                                            console.log($response);
                                            // var ett = $response.responseText;
                                            // console.log(ett);
                                            var response = $response.responseJSON; // getting object 
                                            // console.log(response);

                                            for (var key in response) {
                                                message += response[key]+"<br>";
                                            }
                                            var message = '<div class="alert alert-danger alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+message+'<br/></div>';
                                            $('#error2').html('');
                                            $('#error2').html(message);
                                            // console.log(message);
                                            // generatePopUpMessage(message, 'danger');
                                            // $("#error").html(message);
                                    }
                                }); // end of ajax
                            }); // end of submit button click 

                        },
                        error: function(response){
                            // var message = 'Something Went Wrong';
                            // var messages = jQuery.parseJSON(errorResponse.responseText);
                            var msg = 'Something went wrong.';
                            var message = '<div class="alert alert-danger alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+msg+'<br/></div>';
                                
                            $('#error').html(message);
                            // console.log(message);
                        }
                    }); // end of ajax
                // }); // end of submit button click 
                
            }); // end of edit

        }); // end of dom 

    </script>


@stop







