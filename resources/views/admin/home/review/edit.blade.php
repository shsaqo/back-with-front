@extends('layouts.adminLayouts.admin-layout')

@section('admin-content')
    <div class="col-7 mt-5 col-custom-padding">
        <form action="{{ route('home-review.update', $item) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body bg-white">
                <div class="row">
                    <div class="form-group col-12">
                        <label for="name">Անուն</label>
                        <input name="name" type="text" class="form-control" id="name" required value="{{ $item->name }}">
                    </div>
                    <div class="form-group col-12">
                        <label for="message">Տեքստ</label>
                        <input name="message" type="text" class="form-control" id="message" required value="{{ $item->message }}">
                    </div>
                    <div class="form-group col-12">
                        <label for="user_photo">նկար</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="user_photo" type="file" class="custom-file-input" id="user_photo">
                                <label class="custom-file-label" for="file">Ներբեռնել</label>
                            </div>
                        </div>
                        <img width="75" src="{{ asset('images/'.$item->user_photo) }}" alt="">
                    </div>
                    <div class="form-group col-12">
                        <label for="file">ֆայլեր</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="file[]" type="file" class="custom-file-input" id="file" multiple>
                                <label class="custom-file-label" for="file">Ներբեռնել</label>
                            </div>
                        </div>
                        @if ($item->file && count($item->file))
                            @foreach($item->file as $file)
                                <img width="75" src="{{ asset('images/'.$file->file) }}" alt="{{ $file->id }}">
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group col-12">
                        <label for="youtube">Youtube լինկ</label>
                        <input name="youtube" type="text" class="form-control" id="youtube" value="{{ $item->youtube }}">
                    </div>
                    <div class="form-group col-12">
                    <label for="star">Աստղ</label>
                    <div class="starContainer">
                        <div class="commentor-stars">
                            <div class="rateYoCreateEdit" data-rate="{{ $item->star }}"></div>
                            <input value=" " name="star" type="hidden" class="form-control" id="star">
                        </div>
                    </div>
                </div>
                </div>
                <div class="row mt-3 ">
                    <div class="form-group col-12 mb-0">
                        <button type="submit" class="btn btn-primary productCreateBtn ml-auto d-flex">Խմբագրել</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
