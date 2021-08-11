@extends('layouts.adminLayouts.admin-layout')

@section('admin-content')

@if (Session::has('ok'))
<div class="alert alert-info">{{ Session::get('ok') }}</div>
@endif

<div class="color-page">
    <div class="card-body">
        <div class="row">
            <div class="col-md-7 bg-white col-custom-padding">
                <div class='form-group'>
                    <label>Ընտրված գույներ</label>
                    <div class="d-flex mt-2 flex-wrap">
    
                        @foreach($items as $item)
                        <div class="d-flex flex-column justify-content-center mr-3 mb-2 page-color-labelParent">
                            <div style="background:{{ $item->color }}" class="page-color-label"></div>
                            <form action="{{ route('color.delete', $item) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn deleteTimes">
                                    <img src="{{asset('images/icons/times-icon.svg')}}" alt="">
                                </button>
                            </form>
                        </div>
    
                        @endforeach
                        <form action="{{ route('color.create') }}" method="post">
                            @csrf
                            <div>
                                <div class="row align-items-center">
                                    <div class="product-bottom">
                                        <button type="submit" class="btn btn-info btn btn-primary d-inline-flex align-items-center justify-content-center">
                                            <img src="{{asset('./images/icons/colorplus.png')}}" alt="">
                                        </button>
                                    </div>
                                    <div class="color-picker-parent ml-3">
                                        <input class="form-control product-color-picker description_color" name="color" type="color" id="color">
                                        <div class="color-image"> <img src="{{asset('./images/icons/picker.png')}}" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </form>
    
                    </div>
                    <button class="colorVisibleBtns">Ջնջել</button>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
