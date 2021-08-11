@extends('layouts.adminLayouts.admin-layout')

@section('admin-content')

<div class="container loginContainer flex-column">
 <div class="loginContent">
        <div class="loginForm">
            @if (Session::has('ok'))
                <div class="alert alert-info">{{ Session::get('ok') }}</div>
            @endif
            @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif
            <form action="{{ route('worker.setting.update', $user) }}" autocomplete="off" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div>
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-md-12 pr-0 pr-1">
                                <div class="input-group">
                                    <div class="inputParent w-100">
                                        <input required name="name" type="text" class="form-control" id="name"  autocomplete="off" value="{{ $user->name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="inputParent w-100">
                                        <input required name="old_password" type="password" class="form-control" id="old_password"  autocomplete="off" placeholder="Ներկայիս գաղտնաբառը *">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0 pr-1">
                                <div class="input-group">
                                    <div class="inputParent w-100">
                                        <input name="password" type="password" class="form-control" id="password"   autocomplete="new-password" placeholder="Գաղտնաբառ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 pl-0 pl-1">
                                <div class="input-group">
                                    <div class="inputParent w-100">
                                        <input name="password_confirmation" type="password" class="form-control"  id="confirm_password"  autocomplete="off" placeholder="Կրկնել գաղտնաբառ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="custom-file inputParent w-100">
                                        <div class="d-flex align-items-center">
                                            <div class="avatarImage" id="avatarImage">
                                                <img width="50" src="@if($user->avatar) {{asset ('images/'.$user->avatar)}} @else {{asset ('images/icons/avatar.png')}} @endif" alt="">
                                            </div>
                                        </div>
                                        <label for="avatar" id="avatarLabel" class="avatarLabel">
                                            Փոխել նկարը
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
                        <button type="submit" class="btn btn-primary loginButton ml-auto d-flex">Պահպանել</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
