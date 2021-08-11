@extends('layouts.adminLayouts.admin-layout')

@section('admin-content')
@if (Session::has('ok'))
<div class="alert alert-info">{{ Session::get('ok') }}</div>
@endif
<div class="product-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-10">@include('layouts.adminLayouts.nav-name', ['name' => 'Ապրանքներ'])</div>
            <div class="col-md-2 text-right">
                @can('productEdit')
                <a href="{{ route('product.create') }}" class="btn btn-primary w-100 d-flex text-center justify-content-center" type="submit">
                    Ավելացնել
                </a>
                @endcan
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-3">
                <form action="{{ route('product.index') }}" method="get">
                    <div class="productSearchInput">
                        <div class="input-group">
                            <input value="{{ request()->search }}" name="search" type="text" class="form-control" laceholder="Որոնում trello լինկ անուն">
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
            <div class="col-3">
                <div class="producstMultiSelectParent">
                    <select id="MultiSelectFilter">
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                        <option value="4">Option 4</option>
                        <option value="5">Option 5</option>
                        <option value="6">Option 6</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="productListPage">
    <div class="container-fluid ml-0 bg-white">
        <div class="row under-border-1">
            <div class="col-1 flex-grow-and-basis"></div>
            <div class="col">
                <p class="productListHeaderText">Անվանում trello-ում</p>
            </div>
            <div class="col-1">
                <p class="productListHeaderText">Հղում</p>
            </div>
            <div class="col-2">
                <p class="productListHeaderText">Տեսակ</p>
            </div>
            <div class="col-2">
                <p class="productListHeaderText">Ամսաթիվ</p>
            </div>
            <div class="col-2 col-10percent">
                <p class="productListHeaderText">Ակտիվ/պասիվ</p>
            </div>
            <div class="col-1">
                <p class="productListHeaderText text-center">Խմբագրել</p>
            </div>
            <div class="col-1">
                <p class="productListHeaderText text-center">Ջնջել</p>
            </div>
        </div>
        @foreach($items as $item)
        <div class="row align-items-center mb-3">
            <div class="col flex-grow-and-basis">
                <img width="100%" class="img-fluid" src="{{ asset('images/'.$item->photo) }}" alt="Photo">
            </div>
            <div class="col">
                <p class="productListContentText">{{ $item->custom }}</p>
            </div>
            <div class="col-1">
                <a href="/{{ $item->url }}" target="_blank"><u>{{ $item->url }}</u></a>
            </div>
            <div class="col-2">
                <p class="productListContentText">{{ $item->name }}</p>
            </div>
            <div class="col-2">
                {{ $item->created_at }}
            </div>
            <div class="col-2 col-10percent text-center">
                <form name="st{{ $item->id }}" onchange="autoSubmit(event)" action="{{ route('product.update', $item->url) }}" method="post">
                    @csrf
                    @method('put')
                    <div>
                        <input type="hidden" name="status" value="{{$item->status}}" id="hiddenInput">
                        <label class="switchItem">
                            <input type="checkbox" @if($item->status == '1') checked @endIf>
                            <span class="sliderItem round"></span>
                        </label>
                    </div>
                </form>
            </div>
            <div class="col-1">
                <div class="text-center">
                    @can('productEdit')
                    <a class="btn btn-36" href="edit-product/{{ $item->url }}">
                        <img src="{{asset('images/icons/edit-icon.svg')}}" alt="">
                    </a>
                    @endcan
                </div>
            </div>
            <div class="col-1">
                <form action="{{ route('product.delete', $item->url) }}" method="post">
                    @csrf
                    @method('delete')
                    <div class="text-center">
                        @can('admin')
                        <button type="button" class="btn delete-custom-btn btn-36" data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                            <img src="{{asset('images/icons/trash-icon.svg')}}" alt="">
                        </button>
                        @endcan
                    </div>
                    <div class="modal fade productDeleteModal" id="exampleModal{{ $item->id }}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3>Ջնջե՞լ ապրանքը</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="productDeleteAnswer">Վստահ ե՞ք որ ցանկանում եք ջնջել այս ապրանքը</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Չեղարկել</button>
                                    <button type="submit" class="btn btn-danger" value="Delete">ՋՆջել</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    <!-- /.card-body -->
</div>
{{ $items->links("pagination::bootstrap-4") }}
<script>
    function autoSubmit(event) {
        var formObject = event.currentTarget;
        const checkbox = event.target.closest('input[type="checkbox"]');
        const value = checkbox.checked ? 1 : 0;
        const hiddenInput = document.querySelector('#hiddenInput');
        hiddenInput.value = value;
        formObject.submit();
    }

</script>
@endsection
