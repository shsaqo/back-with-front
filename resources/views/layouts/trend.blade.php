<!DOCTYPE html>
<html lang="hy">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('home/libs/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('trendStyle/libs/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('trendStyle/libs/slick/slick-theme.css') }}">
    @if(!request()->is('/'))
        <link rel="stylesheet" href="{{ asset('trendStyle/css/main.css') }}">
    @endif
{{--    home--}}
    <link rel="stylesheet" href="{{ asset('home/libs/rating/jquery.rateyo.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home/libs/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/main.css') }}">

{{--    end home--}}
    <title>{{ $trend ?? "TrendGift" }}</title>
    @livewireStyles
@php $codes = \App\Models\CodeScript::all() @endphp
    @if ($codes && count($codes))
        @foreach($codes as $code)
            @if ($code->type == 1)
                {!! $code->code !!}
            @endif
        @endforeach
    @endif

</head>
<body>
@if ($codes && count($codes))
    @foreach($codes as $code)
        @if ($code->type == 2)
            {!! $code->code !!}
        @endif
    @endforeach
@endif
    @yield('content')

@livewireScripts



<script src="{{ asset('trendStyle/libs/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('trendStyle/libs/jquery/jquery-migrate-1.4.1.min.js') }}"></script>

<script src="{{ asset('trendStyle/libs/slick/slick.min.js') }}"></script>

<script src="{{ asset('trendStyle/libs/bootstrap/popper.min.js') }}"></script>

<script src="{{ asset('trendStyle/libs/countdown/jquery.countdown.min.js') }}"></script>

<script src="{{ asset('trendStyle/libs/bootstrap/bootstrap.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

@if(!request()->is('/'))
<script src="{{ asset('trendStyle/js/main.js') }}"></script>
@endif
{{--home--}}
@if(request()->is('/'))
<script src="{{ asset('home/libs/dynamic-adaptive/dinamyc-adapt.js') }}"></script>
<script src="{{ asset('home/libs/rating/jquery.rateyo.min.js') }}"></script>
<script src="{{ asset('home/libs/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('home/js/main.js') }}"></script>
@endif
{{--end home--}}

</body>
</html>
