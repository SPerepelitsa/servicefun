<!DOCTYPE html>
<html lang="ru">
<head>

    @include('partials._head')

</head>
<body>

@include('partials._nav')


    {{--@include('partials._validation_messages')--}}

    @yield('content')


@include('partials._footer')

@include('partials._javascripts')

@yield('scripts')

</body>
</html>