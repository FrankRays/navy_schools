<!DOCTYPE html>
<html lang="en">

@include('includes.header')

<body>

@include('includes.sideBar')


@include('includes.topMenu')


<div class="wraper container-fluid">
    <section class="">
        @yield('content')
    </section>
</div>


@include('includes.footer')

</body>
</html>