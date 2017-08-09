<body>

<!-- Header-->
@include('layouts.header')
<!-- End header-->

<!-- Content -->
@yield('content')
<!-- End content -->

<!-- Footer -->
@include('layouts.footer')
<!-- End footer -->

<!-- js-->
{{--<script src="public/js/bootstrap.min.js" type="text/javascript"> </script>--}}
{{--<link rel="stylesheet" href="public/js/example.js">--}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
{{--<script src="https://code.jquery.com/jquery-1.11.3.js"></script>--}}
{{--<script type="text/javascript" src="public/js/jsindex.js"></script>--}}
{{--<script src="public/js/jquery-3.1.1.min.js"></script>--}}
{{--<script src="public/js/jquery.validate.js"></script>--}}
{{--<script src="public/js/additional-methods.min.js"></script>--}}

@yield('script')

</body>

</html>