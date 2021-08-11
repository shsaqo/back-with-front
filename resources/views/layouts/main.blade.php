<!DOCTYPE html>
<html lang="hy">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('home/libs/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home/libs/rating/jquery.rateyo.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home/libs/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/main.css') }}">

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

<footer class="footer">
    <div class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-3 text-md-left text-center mb-md-0 mb-2">
                    <p>Copyright © 2021 TrendMarket</p>
                </div>
                <div class="col-12 col-lg-9 text-right">
                    <div class="row ml-lg-auto ml-auto mr-lg-0 mr-auto justify-content-start justify-content-lg-end">
                        <div class="col-12 col-md-6 col-lg-4 text-center text-md-right">
                            <p>
                                <a href="{{ route('legalInfo') }}">Օգտագործման կանոններ</a>
                            </p>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 text-center text-md-right">
                            <p>
                                <a href="{{ route('privacy') }}">Գաղտնիության քաղաքականությունը</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('trendStyle/libs/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('trendStyle/libs/jquery/jquery-migrate-1.4.1.min.js') }}"></script>

<script src="{{ asset('trendStyle/libs/bootstrap/popper.min.js') }}"></script>

<script src="{{ asset('trendStyle/libs/bootstrap/bootstrap.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

<script src="{{ asset('home/libs/dynamic-adaptive/dinamyc-adapt.js') }}"></script>

<script src="{{ asset('home/libs/rating/jquery.rateyo.min.js') }}"></script>

<script src="{{ asset('home/libs/swiper/swiper-bundle.min.js') }}"></script>

<script src="{{ asset('home/js/main.js') }}"></script>

</body>
</html>
