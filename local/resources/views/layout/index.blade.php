@include('layout.header')

    <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
		@include('layout.slide')
        <!-- end slide -->

        <div class="space20"></div>


        <div class="row main-left">
            @include('layout.menu')

            @yield('content')
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->

    <!-- Footer -->
@include('layout.footer')
