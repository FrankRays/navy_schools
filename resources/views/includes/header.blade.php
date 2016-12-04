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

                <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
        {!! Html::script('js/html5shiv.js') !!}
        {!! Html::script('js/respond.min.js') !!}

        <![endif]-->

        <script>
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

                ga('create', 'UA-62751496-1', 'auto');
                ga('send', 'pageview');

        </script>

</head>