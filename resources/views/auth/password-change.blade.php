@extends('layouts.adminLayouts.admin-layout')

@section('admin-content')
    <div class="container">
        @if(Session::has('ok'))
            <div class="alert alert-success">
                <strong>{{ Session::get('old_password') }}</strong>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header">Գաղնաբառի փոխարինում</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('changePassword') }}">
                            @csrf
                            @method('put')
                            <div class="form-group row">
                                <label for="old_password" class="col-md-4 col-form-label text-md-right">Հին գաղնամառ</label>

                                <div class="col-md-6">
                                    <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required autocomplete="current-password">

                                    @if(Session::has('old_password'))
                                        <div style="width: 100%;margin-top: 0.25rem; font-size: 80%; color: #e3342f">
                                        <strong>{{ Session::get('old_password') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Նոր գաղնաբառ</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="confirm_password" class="col-md-4 col-form-label text-md-right">Կրկնել նոր գաղնաբառը</label>

                                <div class="col-md-6">
                                    <input id="confirm_password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    @if(Session::has('password_confirmation'))
                                        <div style="width: 100%;margin-top: 0.25rem; font-size: 80%; color: #e3342f">
                                            <strong>{{ Session::get('password_confirmation') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Հաստատել
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
