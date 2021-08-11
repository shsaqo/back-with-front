@extends('layouts.adminLayouts.admin-layout')

@section('admin-content')
    <div class="addWorkerModal edit-page">
        <div class="modal-body modalBodyContainer">
            <div class="col-7 col-custom-padding">
                <div class="card-body bg-white p-0">
                    <div class="container-fluid">
                        @if (Session::has('ok'))
                            <div class="alert alert-info">{{ Session::get('ok') }}</div>
                        @endif

                        <form action="{{ route('worker.update', $user) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-12">
                                    <div class="inputItem">
                                        <label for="email">էլ․հասցե *</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input readonly value="{{ $user->email }}" name="email" type="text" class="form-control" id="email" placeholder="էլ․հասցե">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="inputItem">
                                        <label for="position">Դեր *</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input value="{{ $user->position }}" name="position" type="text" class="form-control" id="position" placeholder="Դեր">
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
                                                    <input @if($user->product_permission == 1) checked  @endif value="1" name="product_permission" type="radio" class="form-control" id="product_permission_1">
                                                    <span class="checkmark"></span>
                                                    դիտորդ
                                                </label>
                                            </div>
                                            <div class="custom-file col-md-5">
                                                <label class="custom_radio" for="product_permission_2">
                                                    <input @if($user->product_permission == 2) checked  @endif value="2" name="product_permission" type="radio" class="form-control" id="product_permission_2">
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
                                                    <input @if($user->special_permission == 1) checked  @endif value="1" name="special_permission" type="radio" class="form-control" id="special_permission_1">
                                                    <span class="checkmark"></span>
                                                    դիտորդ
                                                </label>
                                            </div>
                                            <div class="custom-file col-md-5">
                                                <label class="custom_radio" for="special_permission_2">
                                                    <input @if($user->special_permission == 2) checked  @endif value="2" name="special_permission" type="radio" class="form-control" id="special_permission_2">
                                                    <span class="checkmark"></span>
                                                    ստեղծել/փոփոխել
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 checkBoxItemContainer">
                                    <div class="checkBoxItem">
                                        <label for="">Գլխավոր</label>
                                        <div class="input-group row">
                                            <div class="custom-file col-md-5">
                                                <label class="custom_radio" for="home_permission_1">
                                                    <input @if($user->home_permission == 1) checked  @endif value="1" name="home_permission" type="radio" class="form-control" id="home_permission_1">
                                                    <span class="checkmark"></span>
                                                    դիտորդ
                                                </label>
                                            </div>
                                            <div class="custom-file col-md-5">
                                                <label class="custom_radio" for="home_permission_2">
                                                    <input @if($user->home_permission == 2) checked  @endif value="2" name="home_permission" type="radio" class="form-control" id="home_permission_2">
                                                    <span class="checkmark"></span>
                                                    ստեղծել/փոփոխել
                                                </label>
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
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
