<div class="product-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-8">@include('layouts.adminLayouts.nav-name', ['name' => 'Հատուկ առաջարկներ'])</div>
            <div class="col-md-2">
                <!-- <form action="{{ route('thankYou.create') }}" method="get">
                    <input type="text" name="search" placeholder="Որոնում" class="form-control" value="{{ request()->get('search') }}">
                </form> -->
            </div>
           <div class="col-md-2 text-right">
            @if(!$update)
            @can('specEdit') <a rel="modal:open" href="#specialOfferModal" class="btn btn-primary w-100 d-flex text-center justify-content-center  py-2 px-5">Ավելացնել</a> @endcan
               <!-- <button class="btn btn-primary w-100 d-flex text-center justify-content-center" data-toggle="modal" data-target="#specialOfferModal">Ավելացնել</button> -->
            @endIf
            </div>
            <div class="col-3 mt-3">
                <form action="{{ route('thankYou.create') }}" method="get">
                    <div class="productSearchInput">
                        <div class="input-group">
                            <input value="{{ request()->get('search') }}" name="search" type="text" class="form-control" laceholder="Որոնում">
                            <button type="submit" class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25.696" height="25.695" viewBox="0 0 25.696 25.695">
                                        <g id="loupe" transform="translate(0 -0.003)">
                                            <g id="Group_6547" data-name="Group 6547" transform="translate(0 0.003)">
                                                <path id="Path_6126" data-name="Path 6126" d="M25.382,23.871l-7.307-7.307a10.19,10.19,0,1,0-1.514,1.514l7.307,7.307a1.07,1.07,0,1,0,1.514-1.514ZM10.171,18.2a8.03,8.03,0,1,1,8.03-8.03A8.038,8.038,0,0,1,10.171,18.2Z" transform="translate(0 -0.003)" fill="#9a99af" />
                                            </g>
                                        </g>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="bg-white special-offer-card-body">
    <div class="container-fluid">
        <div class="row row-item">
            <div class="col-1">
                <p>Նկար</p>
            </div>
            <div class="col-1">
                <p>Trello</p>
            </div>
            <div class="col-1">
                <p>Անուն</p>
            </div>
            <div class="col-1">
                <p>Ամսաթիվ</p>
            </div>
            <div class="col-2">
                <p>Նկարագիր</p>
            </div>
            <div class="col-4">
                <p>Նշել որ գնումից հետո հայտնվի այս ապրանքը</p>
            </div>
            <div class="col-2">
                <p class="text-center">Գործողություններ</p>
            </div>
        </div>
    </div>
</div>
@foreach($items as $item)
<div class="bg-white special-offer-card-body">
    <div class="container-fluid">
        <div class="row row-item">
            <div class="col-1">
                <div class="offer-image">
                    <img class="img-fluid" width="80" src="{{ asset('images/'.$item->photo) }}"
                         alt="Photo">
                </div>
            </div>
            <div class="col-1">
                <div class="offer-date">
                    {{ $item->trello }}
                </div>
            </div>
            <div class="col-1">
                <div class="offer-date">
                    {{ $item->name }}
                </div>
            </div>
            <div class="col-1">
                <div class="offer-date">
                    {{ $item->created_at }}
                </div>
            </div>
            <div class="col-2">
                <div class="offer-descr">
                    <p>{{ $item->description[0] }}</p>
                </div>
            </div>
            <div class="col-4">
                <form action="{{ route('thankYou.update', $item->id) }}" method="post">
                    <div class="d-flex">
                        @csrf
                        @method('put')
                        <div>
                            <select name="attached[]" class="multiselect" multiple="multiple">
                                @foreach($products as $index_1 => $product)
                                    <option @if(in_array($product->url, $item->attached)) selected @endif value="{{ $product->url }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @can('specEdit') <button type="submit" class="btn btn-info mx-2 large-blue-btn large-save-btn">Ավելացնել</button> @endcan
                    </div>
                </form>
            </div>
            <div class="col-2">
                <div class="row">
                    {{--<a class="btn btn-success col-md-3" href="{{ route('thankYou.edit', $item->id) }}">Edit</a>--}}
                    <form class="col-md-12" action="{{ route('thankYou.delete', $item->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <div class="d-flex justify-content-around">
                            @can('specEdit') <a class=" btn btn-36 mr-0" href="{{ route('thankYou.edit', $item->id) }}"><img src="{{asset('images/icons/edit-icon.svg')}}" alt=""></a> @endcan
                            @can('admin')
                                <button type="submit" class="spec-offer-btn btn btn-36 ml-3" >
                                    <img src="{{asset('images/icons/trash-icon.svg')}}" alt="">
                                    <input type="submit" class="btn btn-danger d-none" value="Delete">
                                </button>
                            @endcan
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endforeach
