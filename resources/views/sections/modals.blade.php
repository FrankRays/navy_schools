<!-- Demo Details  show Modal -->
<div class="modal fade" id="showDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"> </h4>
            </div> 
            <div class="modal-body">
                
                
            </div>
            <div class="modal-footer">
          
                <a href="#" class="btn btn-info" data-dismiss="modal" >Close</a>
            </div>
        </div>
    </div>
</div>


<!-- Demo Delete Modal -->
<div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
            </div>
            <div class="modal-body">
                Are you sure to delete?
            </div>
            <div class="modal-footer">
                {!! Form::open(array('route' => array('demo.delete'), 'method'=> 'delete', 'class' => 'deleteForm')) !!}
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                {!! Form::submit('Yes, Delete', array('class' => 'btn btn-success', 'id' =>'deleteButtonYes')) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<!-- Demo Create Modal -->
<div class="modal fade" id="createDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add Demo</h4>
            </div>
            <div class="modal-body">
            @include('includes.alert')
            <span id="error1"></span>
                <div class=" form"> 
                    {!! Form::open(array('route' => 'demo.store' , 'method' => 'post', 'class' => 'form-horizontal createForm')) !!}

                    <div class="form-group">
                        {!! Form::label('name', "Demo Name*", array('class' => 'control-label col-lg-2')) !!}
                        <div class="col-lg-8">
                            {!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Enter demo Name', 'required' => 'required')) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('email', "Email Address*", array('class' => 'control-label col-lg-2')) !!}
                        <div class="col-lg-8">
                            {!! Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Enter a valid email address', 'required' => 'required')) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('reg', "Registration Number*", array('class' => 'control-label col-lg-2')) !!}
                        <div class="col-lg-8">
                            {!! Form::text('reg', null, array('class' => 'form-control', 'placeholder' => 'Git Link of the demo', 'required' => 'required')) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('address', "Full Address*", array('class' => 'control-label col-lg-2')) !!}
                        <div class="col-lg-8">
                            {!! Form::textarea('address', null, array('class' => 'form-control','placeholder' => 'Description of the demo', 'row' => 2, 'required')) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('sex', "Sex*", array('class' => 'control-label col-lg-2')) !!}
                        <div class="col-lg-8">
                            {!! Form::select('sex', ['Female','Male'], null, array('class' => 'form-control chosen-select', 'required' => 'required', 'data-placeholder' => "Select Category" , 'tabindex'=>2)) !!}
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
               
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                {!! Form::submit('Add demo', array('class' => 'btn btn-success', 'id' => 'submitDemo')) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<!-- Demo Edit Modal -->
<div class="modal fade" id="editDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Edit Demo</h4>
            </div>
            <div class="modal-body">
            @include('includes.alert')
            <span id="error2"></span>
                <div class=" form"> 
                    {!! Form::open(array('route' => 'demo.update' , 'method' => 'PUT', 'class' => 'form-horizontal editForm')) !!}
                    <div class="modal-body-form">
                    
                    </div>

                </div>
            </div>
            <div class="modal-footer">
               
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                {!! Form::submit('Add demo', array('class' => 'btn btn-success', 'id' => 'submitEditDemo')) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>