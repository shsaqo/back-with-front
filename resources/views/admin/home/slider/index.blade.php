@extends('layouts.adminLayouts.admin-layout')

@section('admin-content')

@if (Session::has('ok'))
<div class="alert alert-info">{{ Session::get('ok') }}</div>
@endif
@if($errors->any())
@foreach ($errors->all() as $error)
<div style="color: red" class="error">{{ $error }}</div>
@endforeach
@endif
<div class="container container ml-0 home-product-page">
    <div class="row">
        <div class="col-12 pr-0">
            <div class="product-header">
                <div class="container-fluid pr-0">
                    <div class="row align-items-center">
                        <div class="col-md-10">@include('layouts.adminLayouts.nav-name', ['name' => 'Սլայդեր'])</div>
                        <div class="col-md-2 text-right pr-0">
                            @can('homeEdit') <button data-toggle="modal" data-target="#sliderCreate" class="productCreateBtn btn btn-primary w-100 d-flex text-center justify-content-center  py-2 px-5">Ավելացնել</button> @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-custom-padding slider-index">
            <div class="like-table-contianer bg-white container">
                <div class="row mb-5 under-border-1">
                @can('homeEdit')
                    <div class="col-8">
                        <h3 class="list-title">Սլայդերների լիստ</h3>
                    </div>
                    <div class="ml-auto ">
                        <form id="statusBtn" action="{{ route('slider.status') }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-6">
                                    <label for="passive" class="custom_radio">
                                        <input @if(!isset($items) || isset($items) && $items->status == 0) checked @endif name="status" type="radio" value="0" id="passive" class="statusBtn">
                                        <span class="checkmark"></span>
                                        Պասիվ
                                    </label>
                                </div>
                                <div class="col-6">
                                    <label for="active" class="custom_radio">
                                        <input @if(isset($items) && $items->status) checked @endif name="status" type="radio" value="1" id="active" class="statusBtn">
                                        <span class="checkmark"></span>
                                        Ակտիվ
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                @endcan
                </div>
                <div class="row">
                    <div class="col-1 under-border-1">
                        <p>Նկար</p>
                    </div>
                    <div class="col-5 under-border-1">
                        <p>Trello</p>
                    </div>
                    <div class="col-2 text-center under-border-1">
                        <p>Գնման ենթակա</p>
                    </div>
                    <div class="col-2 text-center under-border-1">
                        <p>Հերթականություն</p>
                    </div>
                    <div class="col-2 under-border-1">
                        <p class="text-center">Գործողություն</p>
                    </div>
                </div>
                @isset($items->sliderItem)
                @foreach($items->sliderItem as $item)
                <div class="row align-items-center">
                    <div class="col-1">
                        <img width="100%" src="{{ asset('images/'.$item->photo) }}" alt="">
                    </div>
                    <div class="col-5">
                        {{ $item->trello }}
                    </div>
                    <div class="col-2 text-center">
                        {{ $item->buy_status ? 'Այո' : 'Ոչ' }}
                    </div>
                    <div class="col-2 text-center">
                        {{ $item->order_by }}
                    </div>
                    <div class="col-2">
                        <div class="row justify-content-evenly ml-auto">
                            @can('homeEdit') <a class="btn btn-36 m-0" href="{{ route('slider.edit', $item) }}"><img src="{{asset('images/icons/edit-icon.svg')}}" alt=""></a> @endcan
                        @can('admin')
                            <form class="" action="{{ route('slider.destroy', $item) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn delete-custom-btn btn-36 m-0"><img src="{{asset('images/icons/trash-icon.svg')}}" alt=""></button>
                            </form>
                        @endcan
                        </div>
                    </div>
                </div>
                @endforeach
                @endisset
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="sliderCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
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
            <div class="modal-body">
                <div class="col-12 col-custom-padding">
                    <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body bg-white">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="file">Նկար web.</label>
                                    @if($errors->has('photo'))
                                    <div style="color: red" class="error">{{ $errors->first('photo') }}</div>
                                    @endif
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input required name="photo" type="file" class="custom-file-input" id="file">
                                            <label class="custom-file-label" for="file">Ներբեռնել</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="file_mob">Նկար mob.</label>
                                    @if($errors->has('photo'))
                                    <div style="color: red" class="error">{{ $errors->first('photo') }}</div>
                                    @endif
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input required name="photo_mobile" type="file" class="custom-file-input" id="file_mob">
                                            <label class="custom-file-label" for="file_mob">Ներբեռնել</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="form-group col-6">
                                    <label for="index">Հերթականություն</label>
                                    <input name="order_by" type="number" class="form-control" id="index">
                                </div>
                                <div class="form-group col-6 mb-0 pb-0">
                                    <div class="row">
                                        <div class="col-6">
                                            <label class="custom_radio mb-0" for="passivec">
                                                <input checked value="0" name="buy_status" type="radio" id="passivec">
                                                <span class="checkmark"></span>
                                                Գնել պասիվ
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <label class="custom_radio mb-0" for="activec">
                                                <input value="1" name="buy_status" type="radio" id="activec">
                                                <span class="checkmark"></span>
                                                Գնել ակտիվ
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="name">Trello</label>
                                    @if($errors->has('photo'))
                                    <div style="color: red" class="error">{{ $errors->first('trello') }}</div>
                                    @endif
                                    @if($errors->has('buy_status'))
                                    <div style="color: red" class="error">{{ $errors->first('buy_status') }}</div>
                                    @endif
                                    <input name="trello" type="text" class="form-control" id="name">
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="form-group col-12 mb-0">
                                    <button type="submit" class="btn btn-primary productCreateBtn ml-auto d-flex">Ավելացնել</button>
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
