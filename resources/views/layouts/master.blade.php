<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device.width, initial-scale=1">
    <title>Book</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


</head>

<body>
    <div class="mw-100">
        @include('partials.menu')
    </div>
    <div class="container">
        <div class="col-md-12">
            @yield('content')
        </div>
    </div>
    @section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    @show
</body>

</html>