@extends('layouts.adminLayouts.admin-layout')

@section('admin-content')
    <div class="col-7 mt-5 col-custom-padding home-prduct-edit">
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div style="color: red" class="error">{{ $error }}</div>
            @endforeach
        @endif
        <form action="{{ route('home-product.update', $homeProduct) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body bg-white">
                <div class="row">
                    <div class="form-group col-12">
                        <label for="file">Նկար</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="photo" type="file" class="form-control" id="file">
                                <label class="custom-file-label" for="file">Ներբեռնել</label>
                            </div>
                        </div>
                        <img width="75" class="my-2" src="{{ asset('images/'.$homeProduct->photo) }}" alt="">
                    </div>
                    <div class="form-group col-3">
                        <label for="price">Զեղչված գին*</label>
                        <div class="input-group">
                            <input value="{{ $homeProduct->price }}" required name="price" type="number" class="form-control" id="price">
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-3">
                        <label for="sale">Զեղչի չափ*</label>
                        <div class="input-group">
                            <input value="{{ $homeProduct->sale }}" required name="sale" type="number" class="form-control" id="sale">
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <label for="trello">Trello</label>
                        <input value="{{ $homeProduct->trello }}" name="trello" type="text" class="form-control" id="trello" required>
                    </div>
                    <div class="form-group col-12">
                        <label for="name">Անուն</label>
                        <input value="{{ $homeProduct->name }}" name="name" type="text" class="form-control" id="name"
                            required>
                    </div>
                    <div class="form-group col-12">
                        <label for="index">Ինդեքս</label>
                        <input value="{{ $homeProduct->order_by }}" name="order_by" type="number" class="form-control" id="index">
                    </div>
                    <div class="form-group col-12">
                        <p class="anotherInfo">
                        Լրացուցիչ ինֆո
                        </p>
                    </div>
                    <div class="form-group col-12">
                        <label for="slider">Սլայդեր</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input multiple name="slider[]" type="file" class="custom-file-input" id="slider">
                                <label class="custom-file-label" for="slider">Ներբեռնել</label>
                            </div>
                        </div>
                        @if($homeProduct->slider && count($homeProduct->slider))
                            @foreach ($homeProduct->slider as $slider)
                                <img width="75" class="my-2" src="{{ asset('images/'.$slider->photo) }}" alt="">
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group col-12">
                        <label for="youtube">Youtube լինկ</label>
                        <input value="{{ $homeProduct->youtube }}" name="youtube" type="text" class="form-control" id="youtube">
                    </div>
                    <div class="form-group col-12">
                        <label for="description">Նկարագրություն</label>
                        @forelse($homeProduct->description as $description)
                            <div class="d-flex">
                                <input name="description[]" type="text" class="form-control" id="description" value="{{ $description->description }}">
                                <a href="#" class="add_new_btn charackeristicAddBtn"><img src="{{asset('images/icons/times-icon.svg')}}" alt=""></a>
                            </div>
                            @empty
                            <div class="d-flex">
                                <input name="description[]" type="text" class="form-control" id="description">
                                <a href="#" class="add_new_btn charackeristicAddBtn"><img src="{{asset('images/icons/times-icon.svg')}}" alt=""></a>
                            </div>
                        @endforelse
                        <!-- ԱՎԵԼԱՑՆԵԼ ՆՈՐԸ ՍԵՂՄԵԼՈՒՑ ԱՎԵԼԱՆԱ ԵՍ ՁևՈՎ, ԻՐԱ ՄԵՋԻ ՊԱՐՈՒՆԱԿՈՒԹՅՈՒՆՈՎ || ՍԿԻԶԲ -->
                        <div class="form-group px-0 mb-0">
                            <div class="TextBoxDiv">
                                <input type="text" class="form-control">
                                <button class="removeInput" id="0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20.851" height="20.85" viewBox="0 0 20.851 20.85">
                                        <path d="M175.673,172.545a2.212,2.212,0,1,1-3.129,3.129l-6.648-6.649-6.648,6.649a2.212,2.212,0,0,1-3.129-3.129l6.648-6.648-6.648-6.648a2.212,2.212,0,1,1,3.129-3.129l6.648,6.648,6.648-6.648a2.212,2.212,0,1,1,3.129,3.129l-6.648,6.648Zm0,0" transform="translate(-155.471 -155.471)"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <!-- ԱՎԵԼԱՑՆԵԼ ՆՈՐԸ ՍԵՂՄԵԼՈՒՑ ԱՎԵԼԱՆԱ ԵՍ ՁևՈՎ, ԻՐԱ ՄԵՋԻ ՊԱՐՈՒՆԱԿՈՒԹՅՈՒՆՈՎ || ՎԵՐՋ -->
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="form-group col-12 mb-0">
                        <button type="submit" class="btn btn-primary productCreateBtn ml-auto d-flex">Ավելացնել</button>
                    </div>
                </div>
            </div>







        </form>
    </div>
@endsection
