@extends('layouts.adminLayouts.admin-layout')

@section('admin-content')
@include('admin.thank-you.index')
<div id="specialOfferModal">
        <div class="modal-body">
            @if ($update)
                @include('admin.thank-you.update')
            @else
            <form action="{{ route('thankYou.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 bg-white col-custom-padding">
                            <div class="form-group">
                                <label for="name">Ապրանքի Անուն*</label>
                                <input value="{{ old('name') }}" name="name" type="text" class="form-control" id="name"
                                       placeholder="Ապրանքի Անուն*" required>
                            </div>

                            <div class="form-group">
                                <label for="trello">Тrello անուն*</label>
                                <input value="{{ old('trello') }}" name="trello" type="text" class="form-control" id="trello"
                                       placeholder="Тrello անուն*" required>
                            </div>

                            <div class="form-group">
                                <label for="photo">Ապրանքի նկար*</label>
                                <div class="input-group" id="input_group">
                                    <div class="custom-file">
                                        <input name="image" type="file" class="custom-file-input" id="photo_thank_you" required>
                                        <label class="custom-file-label" for="photo">Ապրանքի նկար*</label>
                                    </div>
                                </div>
                                    <div class="added-image-product" id="uploaded-file_thank_you_image">
                                        <img src="" alt="" id="thank_you_uploaded_file" />
                                    </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                        <label for="sale-price">Զեղչված Գին *</label>
                                        <div class="input-group">
                                            <input value="{{ old('price') }}" name="price" id="sale-price" type="text" class="form-control"
                                            required>
                                            <div class="input-group-append">
                                               <span class="input-group-text">$</span>
                                            </div>
                                         </div>
                                    </div>

                                    <div class="col-3">
                                        <label for="sale-size">Զեղչի չափ *</label>
                                        <div class="input-group">
                                            <input value="{{ old('sale') }}" name="sale" id="sale-size" type="text" class="form-control"
                                            required>
                                            <div class="input-group-append">
                                               <span class="input-group-text">$</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="thanks_desc_container">
                                <label for="description">Կարճ նկարագրություն</label>
                                <input name="description[]" type="text" class="form-control" id="description"
                                placeholder="Բնութագրություներ">
                                <button onclick="addThanksDescription(event)" class="add_new_btn">ավելացնել նորը +</button>
                            </div>
                            <div class="product-bottom d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary mt-5">Ավելացնել</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @endif
        </div>
  </div>
    {{ $items->links() }}

@endsection
