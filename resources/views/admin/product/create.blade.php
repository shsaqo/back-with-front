@extends('layouts.adminLayouts.admin-layout')
@section('admin-content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form class="form" action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <h1 class="page-inner-title">
                Ավելացնել ապրանք
            </h1>
        </div>
    </div>
    <div class="row align-items-center col-custom-padding">
        <div class="col-8 form-group">
            <ul class="nav nav-tabs productTabs" id="productCreateTab" role="tablist">
                <li class="nav-item" role="presenatiton">
                    <a class="nav-link active" id="productType-tab" data-toggle="tab" href="#productType" role="tab" aria-controls="type" aria-selected="true">Տեսակ</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="productDescr-tab" data-toggle="tab" href="#productDescr" role="tab" aria-controls="descr" aria-selected="false">Նկարագրություն</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="productImage-tab" data-toggle="tab" href="#productImage" role="tab" aria-controls="image" aria-selected="false">Նկար</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="productCharacteristic-tab" data-toggle="tab" href="#productCharacteristic" role="tab" aria-controls="characteristic" aria-selected="false">Բնութագիր</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="productReview-tab" data-toggle="tab" href="#productReview" role="tab" aria-controls="review" aria-selected="false">Կարծիք</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="productBuyers-tab" data-toggle="tab" href="#productBuyers" role="tab" aria-controls="buyers" aria-selected="false">Գնորդներ</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="productColors-tab" data-toggle="tab" href="#productColors" role="tab" aria-controls="colors" aria-selected="false">Գույներ</a>
                </li>
            </ul>
        </div>
        <div class=" offset-2 col-2 product-bottom">
            <button type="submit" class="btn btn-info btn btn-primary d-inline-flex align-items-center justify-content-center">Ավելացնել</button>
        </div>
    </div>
    <div class="tab-content bg-white col-custom-padding productTabContent" id="productCreateTabContent">
        <div class="col-5 tab-pane fade row show active" id="productType" role="tabpanel" aria-labelledby="productType-tab">
            <div class="row form-group">
                <div class="col-12">
                    <label>Տեսակ *</label>
                    <siv class="select-wrapper">
                        <select class="form-control">
                            <option value="1">option 1</option>
                            <option value="2">option 2</option>
                            <option value="3">option 3</option>
                        </select>
                    </siv>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-4">
                    <label for="count">Քանակ պահեստում*</label>
                    <div class="input-group">
                        <input value="{{ old('count') }}" min="0" name="count" id="count" type="number" class="form-control" required>
                    </div>
                </div>
                <div class="col-4">
                    <label for="sale-price">Զեղչված գին *</label>
                    <div class="input-group">
                        <input value="{{ old('price') }}" name="price" id="sale-price" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="col-4">
                    <label for="sale-size">Զեղչված չափ *</label>
                    <div class="input-group">
                        <input value="{{ old('sale') }}" name="sale" id="sale-size" type="text" class="form-control" required>
                        <div class="input-group-append">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <label>1. Զեղչի գործման ամսաթվի հետհաշվարկ</label>
                    <div class="show-hide-countdown mb-4 mt-3">
                        <label for="input_status1" class="custom_radio">
                            <input type="radio" name="sale_time_one_status" value="0" id="input_status1">
                            <span class="checkmark"></span>
                            Պասիվ
                        </label>
                        <label for="input_status" class="custom_radio">
                            <input checked type="radio" name="sale_time_one_status" value="1" id="input_status">
                            <span class="checkmark"></span>
                            Ակտիվ
                        </label>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <label>2. Զեղչի գործման ամսաթվի հետհաշվարկ</label>
                    {{-- <select name="sale_time_two_status" class="form-control">
                            <option value="0">Off</option>
                            <option @if (old('sale_time_two_status') == 1) selected @endif value="1">On</option>
                            </select> --}}

                    <div class="show-hide-countdown mb-4 mt-3">
                        <label for="input_status1_second" class="custom_radio">
                            <input type="radio" name="sale_time_two_status" value="0" id="input_status1_second">
                            <span class="checkmark"></span>
                            Պասիվ
                        </label>
                        <label for="input_status_second" class="custom_radio">
                            <input checked type="radio" name="sale_time_two_status" value="1" id="input_status_second">
                            <span class="checkmark"></span>
                            Ակտիվ
                        </label>

                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <label for="url">Գրեք URL *</label>
                    <input value="{{ old('url') }}" name="url" type="text" class="form-control" id="url" placeholder="URL" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <label>Գնորդի թողած տվյալները</label>
                    <div class="select-wrapper">
                        <select name="phone_type" class="form-control">
                            <option @if (old('phone_type')==1) selected @endif value="1">Հեռախոսահամար</option>
                            <option @if (old('phone_type')==2) selected @endif value="2">Հեռախոսահամար և անուն</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <label>Ինչպե՞ս պատվիրել</label>
                    <div class="select-wrapper">
                        <select name="how_to_order_type" class="form-control">
                            <option @if (old('how_to_order_type')==1) selected @endif value="1">Տեսակ 1 - Փոքր</option>
                            <option @if (old('how_to_order_type')==2) selected @endif value="2">Տեսակ 2 - Խաչաձև</option>
                            <option @if (old('how_to_order_type')==3) selected @endif value="3">Տեսակ 3 - Մեծ</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5 tab-pane fade row" id="productDescr" role="tabpanel" aria-labelledby="productDescr-tab">
            <div class="row form-group">
                <div class="col-12">
                    <label for="custom">Անվանում trello-ում*</label>
                    <input value="{{ old('custom') }}" name="custom" type="text" class="form-control" id="custom" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <label for="name">Ապրանքի Անուն*</label>
                    <input value="{{ old('name') }}" name="name" type="text" class="form-control" id="name" required>
                </div>
            </div>
            <div class="row form-group">
              <div class="col-12">
                    <label for="last_name">Ապրանքի Անուն footer</label>
                    <input value="{{ old('last_name') }}" name="last_name" type="text" class="form-control" id="last_name">
              </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <label for="description">Կարճ բնութագիր</label>
                    <input value="{{ old('description') }}" name="description" type="text" class="form-control" id="description">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <label for="info_short_description_important_text">Ինֆորմացիոն տեքստ</label>
                    <textarea name="info_short_description_important_text" type="text" class="form-control" id="info_short_description_important_text"></textarea>
                </div>
            </div>
        </div>
        <div class="col-5 tab-pane fade row " id="productImage" role="tabpanel" aria-labelledby="productImage-tab">
            <div class="row form-group">
                <div class="col-12">
                    <label for="photo">Ապրանքի նկար*</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input name="image" type="file" class="custom-file-input" id="photo" required>
                            <label class="custom-file-label" for="photo">Ներբեռնել</label>
                        </div>
                    </div>
                    <div class="added-image-product" id="uploaded-file">
                        <div>
                            <img src="#" alt="" id="uploaded_image" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <label for="user_photo">Ապրանքի Նկար footer</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input name="last_image" type="file" class="custom-file-input" id="last_photo">
                            <label class="custom-file-label" for="last_photo">Ներբեռնել</label>
                        </div>
                    </div>
                    <div class="added-image-product" id="uploaded-file_footer_product_image">
                        <img src="" alt="" id="product_uploaded_file">
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <div id="slider-form-group">
                        <label for="photo">Ներբեռնեք նկարներ սլայդի համար</label>
                        <div class="input-group mb-3" id="slider_container">
                            <div class="custom-file">
                                <input multiple name="slider_image[]" type="file" class="custom-file-input" id="slider_image">
                                <label class="custom-file-label" for="slider">Ներբեռնել</label>
                            </div>
                        </div>
                        <div class="added-image-product" id="slider_upload_container">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <label for="youtube_link">Տեղադրեք հոլովակի հղումը</label>
                    <input value="{{ old('youtube_link') }}" name="youtube_link" type="text" class="form-control" id="youtube_link">
                </div>
            </div>
        </div>
        <div class="tab-pane fade row" id="productCharacteristic" role="tabpanel" aria-labelledby="productCharacteristic-tab">
            <div class="col-12">
                <div class="row">
                    <div class="col-5 border-right-1">
                        <div class="row form-group">
                            <div class="col-12">
                                <label for="short_description">Առաջին բնութագրի վերնագիր</label>
                                <input name="info_short_description" type="text" class="form-control" id="short_description">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12">
                                <label>Ընտրեք բնութագրող կետերը ցույց տալու տեսակը</label>
                                <div class="select-wrapper">
                                    <select name="info_short_description_type" class="form-control">
                                        <option value="0">Ընտրված չէ</option>
                                        <option value="1">Տեսակ 1 - Կետ</option>
                                        <option value="2">Տեսակ 2 - Թիվ</option>
                                        <option value="3">Տեսակ 3 - Չեք</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12" id="short_desc">
                                <label for="short_descriptions">Առաջին բնութագրի կետեր</label>
                                <div class="d-flex">
                                    <input name="info_short_description_text[]" type="text" class="form-control" id="short_descriptions" placeholder="Կարճ Բնութագրություներ">
                                    <button id="add_input" onclick="addInput(event)" class="add_new_btn charackeristicAddBtn"><img src="{{ asset('./images/icons/times-icon.svg') }}" alt=""></button>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12">
                                <label for="photo">Առաջին բնութագրի նկար</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="info_short_description_image" type="file" class="custom-file-input" id="short_photo">
                                        <label class="custom-file-label" for="short_photo">Ներբեռնել</label>
                                    </div>
                                </div>
                                <div class="added-image-product" id="uploaded-file_short_descr">
                                    <button class="delete-image-icon" id="delete_short_desc_img">
                                        <img src="{{asset('./images/icons/times-icon.svg')}}" alt="">
                                    </button>
                                    <img src="" alt="" id="upload_short_desc_file" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="row form-group">
                            <div class="col-12">
                                <label for="info_long_description">Երկրորդ բնութագրի վերնագիր</label>
                                <input name="info_long_description" type="text" class="form-control" id="info_long_description">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12">
                                <label>Ընտրեք երկրորդ բնութագրող կետերը ցույց տալու տեսակը</label>
                                <div class="select-wrapper">
                                    <select name="info_long_description_type" class="form-control">
                                        <option value="0">Ընտրված չէ</option>
                                        <option value="1">Տեսակ 1 - Կետ</option>
                                        <option value="2">Տեսակ 2 - Թիվ</option>
                                        <option value="3">Տեսակ 3 - Չեք</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12" id="long_desc_container">
                                <label for="short_descriptions">Երկրորդ բնութագրի կետեր</label>
                                <div class="d-flex">
                                    <input name="info_long_description_text[]" type="text" class="form-control" id="long_descriptions" placeholder="Երկար Բնութագրություներ">
                                    <button id="add_inputLong" onclick="addLongDescInput(event)" class="add_new_btn charackeristicAddBtn"><img src="{{ asset('./images/icons/times-icon.svg') }}" alt=""></button>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12">
                                <label for="photo">Երկրորդ բնութագրի նկար</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="info_long_description_image" type="file" class="custom-file-input" id="info_long_description_photo">
                                        <label class="custom-file-label" for="info_long_description_photo">Ներբեռնել</label>
                                    </div>

                                </div>
                                <div class="added-image-product" id="uploaded-file_long_descr">
                                    <button class="delete-image-icon" id="delete_long_desc_image">
                                        <img src="{{asset('./images/icons/times-icon.svg')}}" alt="">
                                    </button>
                                    <img src="" alt="" id="long_desc_uploaded_file" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5 tab-pane fade row" id="productReview" role="tabpanel" aria-labelledby="productReview-tab">
            <div class="row form-group">
                <div class="col-12">
                    <label>Ընտրեք մեկնաբանությունները ցույց տալու տեսակը</label>
                    <div class="select-wrapper">
                        <select name="comment_type[]" class="form-control">
                            <option value="0">Ընտրված չէ</option>
                            <option value="1">Սլայդ</option>
                            <option value="2">Ֆեյսբուք</option>
                            <option value="3">Ստանդարտ</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <label for="comment_text">Գրել Մեկնաբանություն</label>
                    <textarea name="comment_text[]" type="text" class="form-control" id="comment_text"></textarea>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <div class="row">
                        <div class="col-7">
                            <label for="user_name">Օգտատիրոջ Անուն</label>
                            <input name="user_name[]" type="text" class="form-control" id="user_name">
                        </div>
                        <div class="col-5">
                            <label for="comment_time">Ամսաթիվ</label>
                            <input name="comment_time[]" type="text" class="form-control" id="comment_time" placeholder="Օր / Ամիս / Տարի">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <label for="user_photo">Օգտատիրոջ նկար</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input name="user_image[]" type="file" class="custom-file-input" id="uploaded_user_file">
                            <label class="custom-file-label" for="user_photo">Ներբեռնել</label>
                        </div>

                    </div>
                    <div class="added-image-product" id="uploaded-file_user_image">
                        <button class="delete-image-icon" id="remove_user_uploaded_file">
                            <img src="{{asset('./images/icons/times-icon.svg')}}" alt="">
                        </button>
                        <img src="" alt="" id="user_uploaded_file" />
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <label for="comment_photo">Օգտատիրոջ կողմից ավելացված տեսահոլովակի հղում</label>
                    <input name="comment_video[]" type="text" class="form-control" id="slider">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-6">
                    <label for="like">Հավանումների քանակը</label>
                    <input name="like[]" id="like" type="number" min="0" value="0" class="form-control w-50">
                </div>
            </div>
            <div id="commentsHere"></div>
            <div class="row form-group">
                <div class="col-12">
                    <button id="comment_add_btn" class="add_new_btn">Ավելացնել</button>
                </div>
            </div>
        </div>
        <div class="col-5 tab-pane fade row" id="productBuyers" role="tabpanel" aria-labelledby="productBuyers-tab">
            <div class="row form-group">
                <div class="col-12">
                    <label for="alert_1">1-ին Հաղորդագրություն 7վ․</label>
                    <textarea data-container="body" data-toggle="popover" data-placement="top" data-html="true" data-trigger="focus" name="alert_1" type="text" class="form-control withPopover" id="alert_1">{{ old('alert_1') }}</textarea>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <label for="alert_2">2-րդ Հաղորդագրություն 2ր․</label>
                    <textarea data-container="body" data-toggle="popover" data-placement="top" data-html="true" data-trigger="focus" name="alert_2" type="text" class="form-control withPopover" id="alert_2">{{ old('alert_2') }}</textarea>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <label for="alert_3">3-րդ Հաղորդագրություն 7ր․</label>
                    <textarea data-container="body" data-toggle="popover" data-placement="top" data-html="true" data-trigger="focus" name="alert_3" type="text" class="form-control withPopover" id="alert_3">{{ old('alert_3') }}</textarea>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <label for="alert_4">4-րդ Հաղորդագրություն 15ր․</label>
                    <textarea data-container="body" data-toggle="popover" data-placement="top" data-html="true" data-trigger="focus" name="alert_4" type="text" class="form-control withPopover" id="alert_4">{{ old('alert_4') }}</textarea>
                </div>
            </div>
        </div>
        <div class="col-12 tab-pane fade row" id="productColors" role="tabpanel" aria-labelledby="productColors-tab">
            <div class="row form-group">
                <div class="col-12">
                    <label for="description_color">Կարճ բնութագրի ետնամասի գույն</label>
                    <div class="color-picker-parent">
                        <input value="{{ old('description_color') ?? '#ffffff' }}" class="form-control product-color-picker description_color" name="description_color" type="color" id="description_color">
                        <div class="color-image"> <img src="{{ asset('./images/icons/picker.png') }}" alt=""></div>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <label>Հիմնական գույն</label>
                    @if (count($colors))
                    @foreach ($colors as $color)
                    <div class="custom-control custom-radio">
                        <input value="{{ $color->color }}" class="custom-control-input" type="radio" id="color{{ $color->id }}" name="color">
                        <label style="background: {{ $color->color }};" for="color{{ $color->id }}" class="custom-control-label page-color-label"></label>
                    </div>
                    @endforeach
                </div>
                <div class="col-12 mt-3">
                    <label>Երկրորդական գույն</label>
                    @foreach ($colors as $color)
                    <div class="custom-control custom-radio">
                        <input value="{{ $color->color }}" class="custom-control-input" type="radio" id="colorTwo{{ $color->id }}" name="color_two">
                        <label style="background: {{ $color->color }};" for="colorTwo{{ $color->id }}" class="custom-control-label page-color-label"></label>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>

        </div>
    </div>
</form>



@endsection
