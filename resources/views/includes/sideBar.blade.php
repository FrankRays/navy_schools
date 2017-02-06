 <!-- Aside Start-->
<aside class="left-panel">

            <!-- brand -->
            <div class="logo">
                <a href="#" class="logo-expanded">
                    <i class="ion-social-buffer"></i>
                    <span href="{!!route('dashboard')!!}" class="nav-label">{!! Config::get('customConfig.names.siteName')!!}</span>

                </a>
            </div>
            <!-- / brand -->


            <!-- Navbar Start -->
            <nav class="navigation">
                <ul class="list-unstyled">

                     <li class="{!! Menu::isActiveRoute('dashboard') !!}"><a href="{{ route('dashboard') }}"><i class="ion-flask"></i> <span class="nav-label">Dashboard</span></a>                 
                    </li>

                    @if(Auth::user()->hasRole('admin'))
                    <li class="has-submenu"><a href="#"><i class="ion-grid"></i> <span class="nav-label">Schools</span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('school.show',1) }}"> Electrical School</a></li>
                            <li><a href="{{ route('school.show',2) }}"> Engineering School</a></li>
                            <li><a href="{{ route('school.show',3) }}"> Seamanship School</a></li>
                        </ul>
                    </li>


                    <li class="has-submenu"><a href="#"><i class="fa fa-user"></i> <span class="nav-label">Admin Panel</span></a>
                        <ul class="list-unstyled">
                            <li><a href="#"> Staffs</a></li>
                            <li><a href="{!! route('foni') !!}"> FO/NI</a></li>
                            <li><a href="#"> Special Instructions</a></li>
                            <li><a href="#"> Correspondences</a></li>

                        </ul>
                    </li>

                    @endif
                </ul>
            </nav>



</aside>
        <!-- Aside Ends-->



