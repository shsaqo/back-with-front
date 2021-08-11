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
<div class="container ml-0 home-product-page">
    <div class="row">
        <div class="col-12 pr-0">
            <div class="product-header">
                <div class="container-fluid pr-0">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="row aling-items-center">
                                <div class="col-10">
                                    @include('layouts.adminLayouts.nav-name', ['name' => 'Հատուկ առաջարկ'])
                                </div>
                                <div class="col-2 text-right">
                                    <button data-toggle="modal" data-target="#reviewCreate" class="productCreateBtn btn btn-primary w-100 d-flex text-center justify-content-center">Ավելացնել</button>
                                </div>
                                <div class="col-3 mt-3">
                                    <form action="{{ route('home-special.index') }}">
                                        <div class="productSearchInput">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="search" value="{{ request()->get('search') }}">
                                                <div class="input-group-append">
                                                    <button type="submit" class="input-group-text">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16.148" height="16.148" viewBox="0 0 16.148 16.148">
                                                            <g id="loupe_1_" data-name="loupe (1)" transform="translate(0 -0.003)" opacity="0.5">
                                                                <g id="Group_6524" data-name="Group 6524" transform="translate(0 0.003)">
                                                                    <path id="Path_6143" data-name="Path 6143" d="M15.95,15,11.358,10.41a6.4,6.4,0,1,0-.951.951L15,15.953A.673.673,0,1,0,15.95,15ZM6.392,11.441a5.046,5.046,0,1,1,5.046-5.046A5.051,5.051,0,0,1,6.392,11.441Z" transform="translate(0 -0.003)" fill="#212121" />
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-custom-padding pt-0">
            <div class="like-table-contianer bg-white container">
                <div class="row">
                    <div class="col-1 under-border-1">
                        <p>Նկար</p>
                    </div>
                    <div class="col-4 under-border-1">
                        <p>Trello</p>
                    </div>
                    <div class="col-2 under-border-1">
                        <p>Գին</p>
                    </div>
                    <div class="col-3 under-border-1">
                        <p>Ամսաթիվ</p>
                    </div>
                    <div class="col-2 under-border-1">
                        <p class="text-center">Գործողություն</p>
                    </div>
                </div>
                @foreach($items as $item)
                <div class="row align-items-center mt-3">
                    <div class="col-1">
                        <img width="100%" src="{{ $item->photo ? asset('images/'.$item->photo) : asset('images/'.$item->youtube_photo)}}" alt="">
                    </div>
                    <div class="col-4">
                        {{ $item->trello }}
                    </div>
                    <div class="col-2">
                        {{ $item->price }}
                    </div>
                    <div class="col-3">
                        {{ $item->created_at }}
                    </div>
                    <div class="col-2">
                        <div class="row justify-content-evenly ml-auto">
                            @can('homeEdit') <a class="btn btn-36 m-0" href="{{ route('home-special.edit', $item) }}"><img src="{{asset('images/icons/edit-icon.svg')}}" alt=""></a> @endcan
                            @can('admin')
                                <form class="" action="{{ route('home-special.destroy', $item) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn delete-custom-btn btn-36 m-0"><img src="{{asset('images/icons/trash-icon.svg')}}" alt=""></button>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="reviewCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
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
                    <form action="{{ route('home-special.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body bg-white">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="photo">Նկար web.</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input name="image" type="file" class="custom-file-input" id="photo">
                                                <label class="custom-file-label" for="photo">Ներբեռնել</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="photo_mob">Նկար mob.</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input name="photo_mobile" type="file" class="custom-file-input" id="photo_mob">
                                                <label class="custom-file-label" for="photo">Ներբեռնել</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="trello">Trello</label>
                                        <input name="trello" type="text" class="form-control" id="trello" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label for="price">Գին</label>
                                        <div class="input-group">
                                            <input name="price" type="text" class="form-control" id="price" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="sale">Զեղչ</label>
                                        <div class="input-group">
                                            <input required name="sale" type="number" class="form-control" id="sale">
                                            <div class="input-group-append">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="sale">Հերթականություն</label>
                                        <div class="input-group">
                                            <input name="order_by" type="number" class="form-control w-100" id="order_by">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="youtube_photo">Youtube Նկար web</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input name="youtube_image" type="file" class="custom-file-input" id="youtube_photo">
                                                <label class="custom-file-label" for="youtube_photo">Ներբեռնել</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="youtube_photo_mob">Youtube Նկար mob</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input name="youtube_photo_mobile" type="file" class="custom-file-input" id="youtube_photo_mob">
                                                <label class="custom-file-label" for="youtube_photo">Ներբեռնել</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="youtube">Youtube լինկ</label>
                                        <input name="youtube" type="text" class="form-control" id="youtube">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="type">Դասավորվածությունը</label>
                                        <select name="type" id="type" class="w-100">
                                            <option value="1">Պադվալ</option>
                                            <option value="8">8</option>
                                            <option value="16">16</option>
                                            <option value="24">24</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-1">
                            <div class="form-group col-12 mb-0">
                                <button type="submit" class="btn btn-primary productCreateBtn ml-auto d-flex">Ավելացնել</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
