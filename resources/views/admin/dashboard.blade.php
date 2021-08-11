@extends('layouts.adminLayouts.admin-layout')

@section('admin-content')

    @if (Session::has('ok'))
        <div class="alert alert-info">{{ Session::get('ok') }}</div>
    @endif
    <div class="col-7 col-custom-padding">
        <div class="product-header">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-10">@include('layouts.adminLayouts.nav-name', ['name' => 'Սլայդեր'])</div>
                    <div class="col-md-2 text-right pr-0">
                        <a href="{{ route('code-script.create') }}" type="submit"
                           class="btn btn-primary w-100 d-flex text-center justify-content-center  py-2 px-5">Ավելացնել</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap code-table">
                <form id="statusBtn" action="{{ route('slider.status') }}" method="post">
                    @csrf
                    @method('put')
                    <label for="passive">Պասիվ</label>
                    <input @if($items->status == 0) checked @endif name="status" type="radio" value="0" id="passive" class="statusBtn"><br>
                    <label for="active">Ակտիվ</label>
                    <input @if($items->status) checked @endif name="status" type="radio" value="1" id="active" class="statusBtn">
                </form>
                <thead>
                <tr>
                    <th>Նկար</th>
                    <th>Trello</th>
                    <th>Գնման ենթակա</th>
                    <th>Գործողություն</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items->sliderItem as $item)
                    <tr>
                        <td>
                            <img width="100" src="{{ $item->photo }}" alt="">
                        </td>
                        <td class="item-code">{{ $item->trello }}</td>
                        <td>{{ $item->buy_status ? 'Այո' : 'Ոչ' }}</td>
                        <td>
                            <div class="row">
                                <a class="btn col-md-3" href="{{ route('slider.edit', $item) }}"><img src="{{asset('images/icons/edit-icon.svg')}}" alt=""></a>
                                <form class="col-md-3" action="{{ route('slider.destroy', $item) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn delete-custom-btn"><img src="{{asset('images/icons/trash-icon.svg')}}" alt=""></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
