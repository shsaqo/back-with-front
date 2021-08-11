@extends('layouts.app')

@section('content')
<div class="container loginContainer">
    <div class="loginContent">
        <div class="loginTitle text-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="74" viewBox="0 0 338 74">
                <text id="new" transform="translate(0 60)" font-size="56" font-family="SegoeUI-Bold, Segoe UI" font-weight="700">
                    <tspan x="0" y="0">TrendMarket</tspan>
                </text>
            </svg>
        </div>
        <div class="loginForm">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div>

                    <div class="inputParent">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-Mail Address">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary ml-auto loginButton">
                        {{ __('Վերականգնել') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
    <footer class="loginFooter mt-auto">
        <div class="container">
            <div class="row justify-content-between">
                <p>lorem</p>
                <p>Lorem, ipsum.</p>
            </div>
        </div>
    </footer>
</div>
@endsection
