<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="shortcut icon" href="img/favicon_1.ico">

        <title>{!! $title !!} - {!! Config::get('customConfig.names.siteName')!!}</title>




        <!-- Bootstrap core CSS -->
        {!! Html::style('css/bootstrap.min.css') !!}
        {!! Html::style('css/bootstrap-reset.css') !!}


                <!--Animation css-->
        {!! Html::style('css/animate.css') !!}


                <!--Icon-fonts css-->
        {!! Html::style('assets/font-awesome/css/font-awesome.css') !!}
        {!! Html::style('assets/ionicon/css/ionicons.min.css') !!}


                <!--Morris Chart CSS -->
        {!! Html::style('assets/morris/morris.css') !!}



                <!-- Custom styles for this template -->
        {!! Html::style('css/style.css') !!}
        {!! Html::style('css/helper.css') !!}

        @yield('style')

</head>