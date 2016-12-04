<!-- Header -->
<section class="content">
<header class="top-head container-fluid">
                <button type="button" class="navbar-toggle pull-left">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>



                <!-- Search -->
    <!--             <form role="search" class="navbar-left app-search pull-left hidden-xs">
                   <input type="text" placeholder="Search..." class="form-control">
                   <a href="#"><i class="fa fa-search"></i></a>
                 </form>
      -->
                <!-- Left navbar -->



                <nav class=" navbar-default" role="navigation">

                    <!--
                    <ul class="nav navbar-nav hidden-xs">
                        <li class="dropdown">
                          <a data-toggle="dropdown" class="dropdown-toggle" href="#">English <span class="caret"></span></a>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="#">German</a></li>
                                <li><a href="#">French</a></li>
                                <li><a href="#">Italian</a></li>
                                <li><a href="#">Spanish</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Files</a></li>
                    </ul>
                   -->
                    <!-- Right navbar -->

                    <ul class="nav navbar-nav navbar-right top-menu top-right-menu">

                        @include('includes.notificationMenu')
                        @include('includes.inboxMenu')
                        @include('includes.profileMenu')

                    </ul>
                    <!-- End right navbar -->

                </nav>

            </header>


<!-- Header Ends -->

