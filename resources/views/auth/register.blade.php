<!DOCTYPE html>
<html lang="en">



@include('includes.header')



<body>

<div class="wrapper-page animated fadeInDown">
    <div class="panel panel-color panel-primary">
        <div class="panel-heading">
            <h3 class="text-center m-t-10"> Navy Schools</h3>
        </div>
        <br>
        @include('includes.alert')

        {!! Form::open(array('route' => 'postRegister', 'method' => 'post', 'class' => 'form-signin')) !!}

        <div class="form-group ">
            <div class="col-xs-12"><br>
                {!! Form::text('username', '', array('class' => 'form-control', 'placeholder' => 'User Name', 'autofocus')) !!}
            </div>
        </div>

        <div class="form-group ">
            <div class="col-xs-12"><br>
                {!! Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'Email Address', 'autofocus')) !!}
            </div>
        </div>

        <div class="form-group ">
            <div class="col-xs-12"><br>
                {!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) !!}
            </div>
        </div>

        <div class="form-group ">
            <div class="col-xs-12"><br>
                {!! Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Confirm Password')) !!}
            </div>
        </div>



        <div class="form-group text-right">
            <br>
            <div class="col-xs-12"><br>
                {!! Form::submit('Sign Up', array('class' => 'btn btn-lg btn-login btn-block btn-purple ', 'type'=>'submit')) !!}
                <br>
            </div>
        </div>







        <center>
            <p>or you can sign up via social network</p>

            <div class="login-social-link">
                <a href="{{ route('login/fb') }}" class="btn btn-primary"><i class="fa fa-facebook"></i> Facebook</a>
                <!-- <a href="#" class="btn btn-info"><i class="fa fa-twitter"></i>Twitter</a> -->
                <a href="{{ route('login/gp') }}" class="btn btn-danger"><i class="fa fa-google-plus"></i> Google</a>
            </div>


            <div class="registration">
                <br>
                Already have an account?
                <a class="" href="{{ route('login') }}">
                    Log In
                </a>
            </div>
        </center>

        {!! Form::close() !!}

    </div>
</div>


</body>
<!-- js placed at the end of the document so the pages load faster -->
{!! HTML::script('js/jquery.js') !!}
{!! HTML::script('js/bootstrap.min.js') !!}
{!! HTML::script('js/pace.min.js') !!}
{!! HTML::script('js/wow.min.js') !!}
{!! HTML::script('js/jquery.nicescroll.js') !!}

        <!--common script for all pages-->
{!! HTML::script('js/jquery.app.js') !!}

</html>
