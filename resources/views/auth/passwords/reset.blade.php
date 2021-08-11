@extends('layouts.app')

@section('content')
<div class="container loginContainer">
    <div class="loginContent">
        <div class="loginTitle text-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="109" height="74" viewBox="0 0 109 74">
                <text id="new" transform="translate(0 60)" font-size="56" font-family="SegoeUI-Bold, Segoe UI" font-weight="700">
                    <tspan x="0" y="0">new</tspan>
                </text>
            </svg>
        </div>
        <div class="loginForm">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="inputParent">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="inputParent">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('Նոր գաղտնաբառ') }}">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="inputParent">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Հաստատեք նոր գաղտնաբառը') }}">
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
