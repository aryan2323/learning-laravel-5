<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Document</title>
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/new.css') }}">


    {{--<link rel="stylesheet" href="/css/app.css">--}}
</head>
<body>

@include('partials.nav')

<div class="container" >
    @include('flash::message')

        {{--<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>--}}
        {{--<script src="//code.jquery.com/jquery.js"></script>--}}
    {{--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>--}}

    {{--<script>--}}
    {{--$('div.alert').not('.alert-important').delay(3000).slideUp(300);--}}
    {{--</script>--}}


    @yield('content')
</div>

<script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/select2.min.js') }}"></script>


@yield('footer')
</body>
</html>