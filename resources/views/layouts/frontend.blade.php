<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" sizes="180x180" href="favicon.ico">
    <title>
    @yield('title') HamroStore
    </title>
    <meta name="descriptions" content="@yield('meta_desc')">
    <meta name="keywords" content="@yield('meta_tags')">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Alertify CSS-->
    <link rel="stylesheet" href="{{asset('css/alertify.min.css')}}"/>

    <!-- Autocomplete -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <!--owl-carousel Css-->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">

</head>
<body>
@include('layouts.inc.front-navbar')
<main>
    @yield('content')
</main>
@include('layouts.inc.front-footer')
<h1></h1>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/bootstrap.js') }}" defer></script>
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.js')}}"></script>
<script src="{{ asset('js/custom.js') }}" defer></script>
<!-- Autocomplete -->
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
        src = "{{ route('searchproductajax') }}";
        $( "#search_text" ).autocomplete({
          source: function(request, response){
            $.ajax({
                url: src,
                data: {
                    term: request.term
                },
                dataType: "json",
                success: function(data){
                    response(data);
                }
            })

          },
          minLength:1,
        });

        $(document).on( 'click', '.ui-menu-item', function(){
            $('#search-form').submit();
        })

    })
</script>
<!-- Alertify JavaScript -->
<script src="{{asset('js/alertify.min.js')}}"></script>
<script>
    @error('email')
    $('#LoginModal').modal('show');
    @enderror
    @if(session('status'))
        alertify.set('notifier', 'position', 'top-right');
        alertify.success("{{ session('status') }}");
        @endif
</script>
    @yield('script')
</body>
</html>
