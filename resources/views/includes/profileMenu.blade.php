<!-- user login dropdown start-->
<li class="dropdown text-center">
    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
        <img alt="" src={{ asset('img/avatar-2.jpg') }} class="img-circle profile-img thumb-sm">
        <span class="username">{{ Auth::user()->username }}</span> <span class="caret"></span>
    </a>
    <ul class="dropdown-menu pro-menu fadeInUp animated" tabindex="5003" style="overflow: hidden; outline: none;">
        <li><a href="{!!route('profile')!!}"><i class="fa fa-briefcase"></i>Profile</a></li>
        <li><a href="{!!route('password.change')!!}"><i class="fa fa-cog"></i> Change Password</a></li>
        <li><a href="{!! route('logout') !!}"><i class="fa fa-sign-out"></i> Log Out</a></li>
        <!--
        <li><a href="#"><i class="fa fa-bell"></i> Friends <span class="label label-info pull-right mail-info">5</span></a></li>
         -->
    </ul>
</li>
<!-- user login dropdown end -->