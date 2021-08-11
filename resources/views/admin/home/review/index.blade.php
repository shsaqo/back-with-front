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
    <div class="container ml-0 home-review-page">
        <div class="row">
            <div class="col-12 pr-0">
                <div class="product-header">
                    <div class="container-fluid pr-0">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="row algn-items-center">
                                    <div class="col-10">
                                        @include('layouts.adminLayouts.nav-name', ['name' => 'Մեկնաբանություններ'])
                                    </div>
                                    <div class="col-2 text-right">
                                        @can('homeEdit')
                                        <button data-toggle="modal" data-target="#reviewCreate" class="productCreateBtn btn btn-primary w-100 d-flex text-center justify-content-center">Ավելացնել</button>
                                        @endcan
                                    </div>
                                    <div class="col-3 mt-3">
                                        <form action="{{ route('home-review.index') }}">
                                            <div class="productSearchInput">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="search" value="{{ request()->get('search') }}">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="input-group-text">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16.148" height="16.148" viewBox="0 0 16.148 16.148">
                                                                <g id="loupe_1_" data-name="loupe (1)" transform="translate(0 -0.003)" opacity="0.5">
                                                                    <g id="Group_6524" data-name="Group 6524" transform="translate(0 0.003)">
                                                                    <path id="Path_6143" data-name="Path 6143" d="M15.95,15,11.358,10.41a6.4,6.4,0,1,0-.951.951L15,15.953A.673.673,0,1,0,15.95,15ZM6.392,11.441a5.046,5.046,0,1,1,5.046-5.046A5.051,5.051,0,0,1,6.392,11.441Z" transform="translate(0 -0.003)" fill="#212121"/>
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
                            <p>Մեկնաբանություններ</p>
                        </div>
                        <div class="col-2 under-border-1">
                            <p>Անուն</p>
                        </div>
                        <div class="col-3 under-border-1">
                            <p>Գնահատական</p>
                        </div>
                        <div class="col-2 under-border-1">
                            <p class="text-center">Գործողություններ</p>
                        </div>
                    </div>
                    @foreach($items as $item)
                    <div class="row align-items-center mt-3">
                        <div class="col-1">
                            <img width="100%" src="{{ asset('images/'.$item->user_photo) }}" alt="">
                        </div>
                        <div class="col-4">
                            <p class="m-0 one-line-crop">{{ $item->message }}</p>
                        </div>
                        <div class="col-2">
                            {{ $item->name }}
                        </div>
                        <div class="col-3">
                            <div class="starContainer">
                                <div class="commentor-stars">
                                    <div class="rateYo" data-readonly="true" data-rate="{{ $item->star }}"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="row justify-content-evenly ml-auto">
                                @can('homeEdit')
                                    <a class="btn btn-36 m-0" href="{{ route('home-review.edit', $item) }}">
                                        <img src="{{asset('images/icons/edit-icon.svg')}}" alt="">
                                    </a>
                                @endcan
                                @can('admin')
                                    <form class="" action="{{ route('home-review.destroy', $item) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn delete-custom-btn btn-36 m-0">
                                            <img src="{{asset('images/icons/trash-icon.svg')}}" alt="">
                                        </button>
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
                <!-- <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Սլայդեր</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> -->
                <div class="modal-body">
                    <div class="col-12 col-custom-padding">
                        <form action="{{ route('home-review.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body bg-white">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="name">Անուն</label>
                                        <input name="name" type="text" class="form-control" id="name" required>
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="message">Տեքստ</label>
                                        <input name="message" type="text" class="form-control" id="message" required>
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="user_photo">նկար</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input required name="user_photo" type="file" class="custom-file-input" id="user_photo">
                                                <label class="custom-file-label" for="user_photo">Ներբեռնել</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="file">ֆայլեր</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input name="file[]" type="file" class="custom-file-input" id="file" multiple>
                                                <label class="custom-file-label" for="file">Ներբեռնել</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="youtube">Youtube լինկ</label>
                                        <input name="youtube" type="text" class="form-control" id="youtube">
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="star">Աստղ</label>
                                        <div class="starContainer">
                                            <div class="commentor-stars">
                                                <div class="rateYoCreateEdit" data-rate="0"></div>
                                                <input value="0" name="star" type="hidden" class="form-control" id="star">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-12 mb-0 mt-3 ">
                                         @can('homeEdit') <button type="submit" class="btn btn-primary productCreateBtn ml-auto d-flex ">Ավելացնել</button> @endcan
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
