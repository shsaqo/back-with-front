@extends('layouts.adminLayouts.admin-layout')

@section('admin-content')

@if (Session::has('ok'))
<div class="alert alert-info">{{ Session::get('ok') }}</div>
@endif
@error('email')
<div class="alert alert-danger">{{ $errors->first('email') }}</div>
@enderror

<div class="col-12 col-custom-padding">
    <div class="product-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-9 workerHeaderTitle">@include('layouts.adminLayouts.nav-name', ['name' => 'Դեր/Աշխատակից'])</div>
                <div class="col-md-3 text-right pr-0">
                    <button data-toggle="modal" data-target="#reviewCreate" class="productCreateBtn btn btn-primary w-100 d-flex text-center justify-content-center  workerHeaderBtn">Գրանցել նոր ադմին</button>

                    {{-- <a href="{{ route('code-script.create') }}" type="submit"--}}
                    {{-- class="btn btn-primary w-100 d-flex text-center justify-content-center  py-2 px-5">Ավելացնել</a>--}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container m-0 workerTable">
    <div class="row tableHedaer">
        <div class="col-1"></div>
        <div class="col-2">
            <p class="tableLabels">Անուն</p>
        </div>
        <div class="col-2">
            <p class="tableLabels">Կարգավիճակ</p>
        </div>
        <div class="col-1">
            <p class="tableLabels">Ամսաթիվ</p>
        </div>
        <div class="col-1">
            <p class="tableLabels">Դեր</p>
        </div>
        <div class="col-3">
            <p class="tableLabels">Էլ․ հասցե</p>
        </div>
        <div class="col-1">
            <p class="tableLabels text-center">Խմբագրել</p>
        </div>
        <div class="col-1">
            <p class="tableLabels text-center">Ջնջել</p>
        </div>
    </div>
    @foreach($users as $user)
    <div class="row align-items-center  mb-4">
        <div class="col-1"><img style="border-radius: 50px" width="50" src="@if($user->avatar) {{ asset('images/'.$user->avatar) }} @else  {{ asset('images/icons/avatar.png') }} @endif" alt=""></div>
        <div class="col-2">
            <p>
                {{ $user->name }}
            </p>
        </div>
        <div class="col-2">
            <p>
                <span class="statusSpan @if($user->status) active @else waiting @endif">
                </span>
                @if($user->status)
                Ակտիվ
                @else
                Սպասվում է
                @endif
            </p>
        </div>
        <div class="col-1">
            {{ $user->created_at->format('Y-m-d') }}
        </div>
        <div class="col-1">
            {{ $user->position }}
        </div>
        <div class="col-3">
            <p class="workerEmailP">
                <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
            </p>
        </div>
        <div class="col-1">
            <a class="btn-36" href="{{ route('worker.edit', $user) }}"><img src="{{asset('images/icons/edit-icon.svg')}}" alt=""></a>
        </div>
        <div class="col-1">
            <form class="" action="{{ route('worker.delete', $user) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn delete-custom-btn btn-36" value="Delete"><img src="{{asset('images/icons/trash-icon.svg')}}" alt=""></button>
            </form>
        </div>
    </div>
    @endforeach
</div>
<div class="modal fade addWorkerModal" id="reviewCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <form action="{{ route('worker.invitation') }}" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Անձնական տվյալներ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="20.865" height="20.865" viewBox="0 0 20.865 20.865">
                                <g id="Group_6545" data-name="Group 6545" transform="translate(2.121 2.121)">
                                    <line id="Line_1821" data-name="Line 1821" x2="16.622" y2="16.622" fill="none" stroke="#43425d" stroke-linecap="round" stroke-width="3" />
                                    <line id="Line_1822" data-name="Line 1822" x1="16.622" y2="16.622" fill="none" stroke="#43425d" stroke-linecap="round" stroke-width="3" />
                                </g>
                            </svg>
                        </span>
                    </button>
                </div>
                <div class="modal-body modalBodyContainer">
                    <div class="col-12 col-custom-padding">
                        @csrf
                        <div class="card-body bg-white p-0">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="inputItem">
                                            <label for="email">էլ․հասցե *</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="email" type="text" class="form-control" id="email" placeholder="էլ․հասցե">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="inputItem">
                                            <label for="position">Դեր *</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="position" type="text" class="form-control" id="position" placeholder="Դեր">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 checkBoxItemContainer">
                                        <div class="checkBoxItem">
                                            <label for="">Ապրանքներ</label>
                                            <div class="input-group row">
                                                <div class="custom-file col-md-5">
                                                    <label class="custom_radio" for="product_permission_1">
                                                        <input value="1" name="product_permission" type="radio" class="form-control" id="product_permission_1">
                                                        <span class="checkmark"></span>
                                                        դիտորդ
                                                    </label>
                                                </div>
                                                <div class="custom-file col-md-5">
                                                    <label class="custom_radio" for="product_permission_2">
                                                        <input value="2" name="product_permission" type="radio" class="form-control" id="product_permission_2">
                                                        <span class="checkmark"></span>
                                                        ստեղծել/փոփոխել
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 checkBoxItemContainer">
                                        <div class="checkBoxItem">
                                            <label for="">Հատուկ առաջարկ</label>
                                            <div class="input-group row">
                                                <div class="custom-file col-md-5">
                                                    <label class="custom_radio" for="special_permission_1">
                                                        <input value="1" name="special_permission" type="radio" class="form-control" id="special_permission_1">
                                                        <span class="checkmark"></span>
                                                        դիտորդ
                                                    </label>
                                                </div>
                                                <div class="custom-file col-md-5">
                                                    <label class="custom_radio" for="special_permission_2">
                                                        <input value="2" name="special_permission" type="radio" class="form-control" id="special_permission_2">
                                                        <span class="checkmark"></span>
                                                        ստեղծել/փոփոխել
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 checkBoxItemContainer">
                                        <div class="checkBoxItem">
                                            <label for="">Դոմեն</label>
                                            <div class="input-group row">
                                                <div class="custom-file col-md-5">
                                                    <label class="custom_radio" for="home_permission_1">
                                                        <input value="1" name="home_permission" type="radio" class="form-control" id="home_permission_1">
                                                        <span class="checkmark"></span>
                                                        դիտորդ
                                                    </label>
                                                </div>
                                                <div class="custom-file col-md-5">
                                                    <label class="custom_radio" for="home_permission_2">
                                                        <input value="2" name="home_permission" type="radio" class="form-control" id="home_permission_2">
                                                        <span class="checkmark"></span>
                                                        ստեղծել/փոփոխել
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row mt-1">
                        <div class="form-group col-12 mb-0">
                            <button type="submit" class="btn btn-primary productCreateBtn ml-auto d-flex">Հաստատել</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
