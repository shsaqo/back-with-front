@extends('layouts.app')

@section('content')

<div class="container loginContainer flex-column">
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger">{{$error}}</div>
    @endforeach
    @endif
    <div class="loginContent">
        <div class="loginTitle text-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="74" viewBox="0 0 338 74">
                <text id="new" transform="translate(0 60)" font-size="56" font-family="SegoeUI-Bold, Segoe UI" font-weight="700">
                    <tspan x="0" y="0">TrendMarket</tspan>
                </text>
            </svg>
        </div>
        <div class="loginForm">
            <form action="{{ route('worker.registration') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="email">Համակարգ մուտք գործելու հրավեր</label>
                                <div class="input-group">
                                    <div class="inputParent w-100">
                                        <input readonly name="email" type="email" class="form-control" id="email" value="{{ $user->email }}">
                                        <input name="user_token" type="hidden" value="{{ request()->get('token') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0 pr-1">
                                <div class="input-group">
                                    <div class="inputParent w-100">
                                        <input name="name" type="text" class="form-control" id="name" placeholder="Անուն *">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 pl-0 pl-1">
                                <div class="input-group">
                                    <div class="inputParent w-100">
                                        <input name="last_name" type="text" class="form-control" id="last_name" placeholder="Ազգանուն *">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0 pr-1">
                                <div class="input-group">
                                    <div class="inputParent w-100">
                                        <input name="password" type="password" class="form-control" id="password" placeholder="Գաղտնաբառ *">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 pl-0 pl-1">
                                <div class="input-group">
                                    <div class="inputParent w-100">
                                        <input name="password_confirmation" type="password" class="form-control" id="confirm_password" placeholder="Կրկնել գաղտնաբառ *">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="custom-file inputParent w-100">
                                        <div class="d-flex align-items-center">
                                            <div class="avatarImage" id="avatarImage">
                                                <img src="{{asset ('images/icons/avatar.png')}}" alt="">
                                            </div>
                                        </div>
                                        <label for="avatar" id="avatarLabel" class="avatarLabel">
                                            ավելացնել նկար
                                            <input name="avatar" type="file" class="form-control" id="avatar" class="d-invisble">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row mt-1">
                    <div class="col-12 mb-0">
                        <button type="submit" class="btn btn-primary loginButton ml-auto d-flex">Գրանցվել</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
