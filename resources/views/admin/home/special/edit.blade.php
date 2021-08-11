@extends('layouts.adminLayouts.admin-layout')

@section('admin-content')
<div class="col-7 col-custom-padding">
    @if($errors->any())
    @foreach ($errors->all() as $error)
    <div style="color: red" class="error">{{ $error }}</div>
    @endforeach
    @endif
    <form action="{{ route('home-special.update', $item) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card-body bg-white">
            <div class="row">
                <div class="form-group col-6">
                    <label for="photo">Նկար web.</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input name="image" type="file" class="custom-file-input" id="photo">
                            <label class="custom-file-label" for="photo">Ներբեռնել</label>
                        </div>
                    </div>
                    <div class="image-container">
                        <button class="image_times_btn" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="8.264" height="8.264" viewBox="0 0 8.264 8.264">
                                <g id="Group_387" data-name="Group 387" transform="translate(0.707 0.707)">
                                    <line id="Line_62" data-name="Line 62" x2="6.849" y2="6.849" fill="none" stroke="#212121" stroke-linecap="round" stroke-width="1" />
                                    <line id="Line_63" data-name="Line 63" x1="6.849" y2="6.849" fill="none" stroke="#212121" stroke-linecap="round" stroke-width="1" />
                                </g>
                            </svg>
                        </button>
                        <img width="100%" src="{{ asset('images/'.$item->photo) }}" alt="">
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
                    <div class="image-container">
                        <button class="image_times_btn" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="8.264" height="8.264" viewBox="0 0 8.264 8.264">
                                <g id="Group_387" data-name="Group 387" transform="translate(0.707 0.707)">
                                    <line id="Line_62" data-name="Line 62" x2="6.849" y2="6.849" fill="none" stroke="#212121" stroke-linecap="round" stroke-width="1" />
                                    <line id="Line_63" data-name="Line 63" x1="6.849" y2="6.849" fill="none" stroke="#212121" stroke-linecap="round" stroke-width="1" />
                                </g>
                            </svg>
                        </button>
                        <img width="100%" src="{{ asset('images/'.$item->photo_mob) }}" alt="">
                    </div>
                </div>
                <div class="form-group col-12">
                    <label for="trello">Trello</label>
                    <input value="{{ $item->trello }}" name="trello" type="text" class="form-control" id="trello" required>
                </div>
                <div class="form-group col-4">
                    <label for="price">Գին</label>
                    <div class="input-group">
                        <input value="{{ $item->price }}" name="price" type="text" class="form-control" id="price" required>
                        <div class="input-group-append">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-4">
                    <label for="sale">Զեղչ</label>
                    <div class="input-group">
                        <input value="{{ $item->sale }}" required name="sale" type="number" class="form-control" id="sale">
                        <div class="input-group-append">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-4">
                    <label for="sale">Հերթականություն</label>
                    <div class="input-group">
                        <input value="{{ $item->order_by }}" name="order_by" type="number" class="form-control" id="order_by">
                    </div>
                </div>
                <div class="form-group col-6">
                    <label for="youtube_photo">Youtube Նկար</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input name="youtube_image" type="file" class="custom-file-input" id="youtube_photo">
                            <label class="custom-file-label" for="photo">Ներբեռնել</label>
                        </div>
                    </div>
                    <div class="image-container">
                        <button class="image_times_btn" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="8.264" height="8.264" viewBox="0 0 8.264 8.264">
                                <g id="Group_387" data-name="Group 387" transform="translate(0.707 0.707)">
                                    <line id="Line_62" data-name="Line 62" x2="6.849" y2="6.849" fill="none" stroke="#212121" stroke-linecap="round" stroke-width="1" />
                                    <line id="Line_63" data-name="Line 63" x1="6.849" y2="6.849" fill="none" stroke="#212121" stroke-linecap="round" stroke-width="1" />
                                </g>
                            </svg>
                        </button>
                        <img width="100%" src="{{ asset('images/'.$item->youtube_photo) }}" alt="">
                    </div>
                </div>
                <div class="form-group col-6">
                    <label for="youtube_photo_mob">Youtube Նկար</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input name="youtube_photo_mobile" type="file" class="custom-file-input" id="youtube_photo_mob">
                            <label class="custom-file-label" for="photo">Ներբեռնել</label>
                        </div>
                    </div>
                    <div class="image-container">
                        <button class="image_times_btn" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="8.264" height="8.264" viewBox="0 0 8.264 8.264">
                                <g id="Group_387" data-name="Group 387" transform="translate(0.707 0.707)">
                                    <line id="Line_62" data-name="Line 62" x2="6.849" y2="6.849" fill="none" stroke="#212121" stroke-linecap="round" stroke-width="1" />
                                    <line id="Line_63" data-name="Line 63" x1="6.849" y2="6.849" fill="none" stroke="#212121" stroke-linecap="round" stroke-width="1" />
                                </g>
                            </svg>
                        </button>
                        <img width="100%" src="{{ asset('images/'.$item->youtube_photo_mob) }}" alt="">
                    </div>
                </div>
                <div class="form-group col-12">
                    <label for="youtube">Youtube լինկ</label>
                    <input value="{{ $item->youtube }}" name="youtube" type="text" class="form-control" id="youtube">
                </div>
                <div class="form-group col-3">
                    <label for="type">Դասավորվածությունը</label>
                    <select  name="type" id="type" class="w-100">
                        <option @if($item->type == 1) selected @endif value="1">Պադվալ</option>
                        <option @if($item->type == 8) selected @endif value="8">8</option>
                        <option @if($item->type == 16) selected @endif value="16">16</option>
                        <option @if($item->type == 24) selected @endif value="24">24</option>
                    </select>
                </div>
            </div>
            <div class="row mt-1">
                <div class="form-group col-12 mb-0">
                    <button type="submit" class="btn btn-primary productCreateBtn ml-auto d-flex">Խմբագրել</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
