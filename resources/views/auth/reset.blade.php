<!DOCTYPE Html>
<Html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>{{ $title or "Password Reset" }} - {{ Config::get('customConfig.names.siteName')}}</title>

    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('css/bootstrap-reset.css') !!}
    {!! Html::style('fonts/font-awesome/css/font-awesome.css') !!}
    {!! Html::style('css/style.css') !!}
    {!! Html::style('css/style-responsive.css') !!}
    @yield('style')
    {!! Html::style('css/custom.css') !!}

    <!-- Html5 shim and Respond.js IE8 support of Html5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    {!! Html::script('js/Html5shiv.js') !!}
    {!! Html::script('js/respond.min.js') !!}
    <![endif]-->
</head>

<body class="login-body">
<div class="container">
    <div class=" col-md-4 col-md-offset-4"> 
        {!! Form::open(array('route' => 'postReset', 'method' => 'POST', 'class' => 'form-signin')) !!}

    <input type='hidden' name='token' value="{!!$token!!}">
    <h2 class="form-signin-heading"><center>Reset Password</center></h2>
    <div class="login-wrap">
        @include('includes.alert')

        
        {!! Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'Email Address', 'autofocus')) !!}<br>
        {!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'New Password')) !!}<br>
        {!! Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Confirm New Password')) !!}<br>

        {!! Form::submit('Reset Password', array('class' => 'btn btn-lg btn-success btn-block')) !!}
    </div>




    {!! Form::close() !!}
    </div>


</div>

<!-- js placed at the end of the document so the pages load faster -->
{!! Html::script('js/jquery.js') !!}
{!! Html::script('js/bootstrap.min.js') !!}

</body>
</Html>
