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
		<div class="col-12">
			<div class="product-header">
				<div class="container-fluid pr-0">
					<div class="row align-items-center">
						<div class="col-md-12 pr-0">
                            <div class="row">
                                <div class="col-10">
                                    @include('layouts.adminLayouts.nav-name', ['name' => 'Տեսականի'])
                                </div>
                                <div class="col-2 text-right">
                                @can('homeEdit')
                                    <button data-toggle="modal" data-target="#productCreate" class="productCreateBtn btn btn-primary w-100 d-flex text-center justify-content-center">
                                        Ավելացնել
                                    </button>
                                @endcan
                                </div>
                                <div class="col-5 mt-3">
                                    <form action="{{ route('home-product.index') }}">
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
		<div class="col-12 col-custom-padding pt-0 mt-3">
			<div class="like-table-contianer bg-white container">
				<div class="row">
					<div class="col-1 under-border-1">
						<p>Նկար</p>
					</div>
					<div class="col-4 under-border-1">
						<p>Անուն</p>
					</div>
					<div class="col-2 under-border-1">
						<p>Тrello անուն</p>
					</div>
					<div class="col-3 under-border-1">
						<p>Կարգավիճակ</p>
					</div>
					<div class="col-2 under-border-1">
						<p class="text-center">Գործողություններ</p>
					</div>
				</div>
                @foreach($items as $item)
				<div class="row align-items-center mb-3">
					<div class="col-1">
                        <img width="100%" src="{{ asset('images/'.$item->photo) }}" alt="">
                    </div>
					<div class="col-4">
                        <p class="m-0 one-line-crop">{{ $item->name }} </p>
                    </div>
					<div class="col-2">
                        {{ $item->trello }}
                    </div>
					<div class="col-3">
						<form id="statusBtn{{ $item->id }}" action="{{ route('homeProduct.status', $item->id) }}" method="post"> @csrf @method('put')
							<div class="row">
                            <div class="col-5">
                                    <label class="custom_radio" for="passive{{ $item->id }}">
                                    <input @if($item->status == 0) checked @endif name="status" type="radio" value="0" @cannot('homeEdit') disabled  @endcannot @can('homeEdit') id="passive{{ $item->id }}" class="statusBtn" @endcan>
                                        <span class="checkmark"></span>
                                        Պասիվ
                                    </label>
							    </div>
                                <div class="col-6">
                                    <label class="custom_radio" for="active{{ $item->id }}">
                                        <input @if($item->status) checked @endif name="status" type="radio" value="1" @cannot('homeEdit') disabled  @endcannot @can('homeEdit') id="active{{ $item->id }}"  class="statusBtn" @endcan>
                                        <span class="checkmark"></span>
                                        Ակտիվ
                                    </label>
                                </div>
							</div>
						</form>
					</div>
					<div class="col-2">
						<div class="row justify-content-evenly ml-auto">
                            @can('homeEdit')
							<a class="btn btn-36 m-0" href="{{ route('home-product.edit', $item) }}">
                                <img src="{{asset('images/icons/edit-icon.svg')}}" alt="">
                            </a>
                            @endcan
                            @can('admin')
                                <form class="" action="{{ route('home-product.destroy', $item) }}" method="post"> @csrf @method('delete')
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
    <div class="modal fade productCreateModal" id="productCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <form action="{{ route('home-product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body bg-white">
                                <div class="row">
                                        <div class="form-group col-12">
                                            <label for="file">Նկար</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                        <input required name="photo" type="file" class="custom-file-input" id="file">
                                                    <label class="custom-file-label" for="file">Ներբեռնել</label>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="form-group col-3">
                                        <label for="price">Զեղչված գին*</label>
                                        <div class="input-group">
                                            <input required name="price" type="number" class="form-control" id="price">
                                            <div class="input-group-append">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="sale">Զեղչի չափ*</label>
                                        <div class="input-group">
                                            <input required name="sale" type="number" class="form-control" id="sale">
                                            <div class="input-group-append">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="trello">Trello</label>
                                        <input name="trello" type="text" class="form-control" id="trello" required>
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="name">Անուն</label>
                                        <input name="name" type="text" class="form-control" id="name"
                                            required>
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="index">Ինդեքս</label>
                                        <input name="order_by" type="number" class="form-control" id="index">
                                    </div>
                                    <div class="form-group col-12">
                                        <p class="anotherInfo">
                                        Լրացուցիչ ինֆո
                                        </p>
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="slider">Սլայդեր</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input multiple name="slider[]" type="file" class="custom-file-input" id="slider">
                                                <label class="custom-file-label" for="slider">Ներբեռնել</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="youtube">Youtube լինկ</label>
                                        <input name="youtube" type="text" class="form-control" id="youtube">
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="description">Նկարագրություն</label>
                                       <div class="d-flex">
                                            <input name="description[]" type="text" class="form-control" id="description">
                                            <a href="#" class="add_new_btn charackeristicAddBtn"><img src="{{asset('images/icons/times-icon.svg')}}" alt=""></a>
                                       </div>
                                       <!-- ԱՎԵԼԱՑՆԵԼ ՆՈՐԸ ՍԵՂՄԵԼՈՒՑ ԱՎԵԼԱՆԱ ԵՍ ՁևՈՎ, ԻՐԱ ՄԵՋԻ ՊԱՐՈՒՆԱԿՈՒԹՅՈՒՆՈՎ || ՍԿԻԶԲ -->
                                       <div class="form-group px-0 mb-0">
                                            <div class="TextBoxDiv">
                                                <input type="text" class="form-control">
                                                <button class="removeInput" id="0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20.851" height="20.85" viewBox="0 0 20.851 20.85">
                                                        <path d="M175.673,172.545a2.212,2.212,0,1,1-3.129,3.129l-6.648-6.649-6.648,6.649a2.212,2.212,0,0,1-3.129-3.129l6.648-6.648-6.648-6.648a2.212,2.212,0,1,1,3.129-3.129l6.648,6.648,6.648-6.648a2.212,2.212,0,1,1,3.129,3.129l-6.648,6.648Zm0,0" transform="translate(-155.471 -155.471)"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- ԱՎԵԼԱՑՆԵԼ ՆՈՐԸ ՍԵՂՄԵԼՈՒՑ ԱՎԵԼԱՆԱ ԵՍ ՁևՈՎ, ԻՐԱ ՄԵՋԻ ՊԱՐՈՒՆԱԿՈՒԹՅՈՒՆՈՎ || ՎԵՐՋ -->
                                    </div>
                                </div>
                                <div class="row mt-3">
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
