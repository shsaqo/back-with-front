@extends('layouts.adminLayouts.admin-layout')

@section('admin-content')
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div style="color: red" class="error">{{ $error }}</div>
        @endforeach
    @endif
<div class="col-7 col-custom-padding">
    <form action="{{ route('slider.update', $item) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card-body bg-white">
            <div class="row">
                <div class="form-group col-6">
                    <label for="file">Նկար web.</label>
                    @if($errors->has('photo'))
                    <div style="color: red" class="error">{{ $errors->first('photo') }}</div>
                    @endif
                    <div class="input-group">
                        <div class="custom-file">
                            <input name="photo" type="file" class="custom-file-input" id="file">
                            <label class="custom-file-label" for="file">Ներբեռնել</label>
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
                        <img width="100%" src="{{asset('images/'.$item->photo)}}" alt="">
                    </div>
                </div>
                <div class="form-group col-6">
                    <label for="file_mob">Նկար mob.</label>
                    @if($errors->has('photo'))
                    <div style="color: red" class="error">{{ $errors->first('photo') }}</div>
                    @endif
                    <div class="input-group">
                        <div class="custom-file">
                            <input name="photo_mobile" type="file" class="custom-file-input" id="file_mob">
                            <label class="custom-file-label" for="file_mob">Ներբեռնել</label>
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
                        <img width="100%" src="{{asset('images/'.$item->photo_mobile)}}" alt="">
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="form-group col-12">
                    <label for="name">Trello</label>
                    @if($errors->has('photo'))
                    <div style="color: red" class="error">{{ $errors->first('trello') }}</div>
                    @endif
                    <input value="{{ $item->trello }}" name="trello" type="text" class="form-control" id="name">
                </div>
            </div>
            <div class="row align-items-center">
                <div class="form-group col-6">
                    <label for="index">Հերթականություն</label>
                    <input value="{{ $item->order_by }}" name="order_by" type="number" class="form-control" id="index">
                </div>
                <div class="form-group col-6 mb-0 pb-0">
                    <div class="row">
                        <div class="col-6">
                            <label class="custom_radio mb-0" for="passive">
                                <input @if($item->buy_status == 0) checked @endif value="0" name="buy_status" type="radio" id="passive">
                                <span class="checkmark"></span>
                                Գնել պասիվ
                            </label>
                        </div>
                        <div class="col-6">
                            <label class="custom_radio mb-0" for="active">
                                <input @if($item->buy_status) checked @endif value="1" name="buy_status" type="radio" id="active">
                                <span class="checkmark"></span>
                                Գնել ակտիվ
                            </label>
                        </div>
                    </div>
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
