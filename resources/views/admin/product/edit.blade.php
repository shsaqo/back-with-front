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

<form class="edit-form" action="{{ route('product.update', $item->url) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-12">
            <h1 class="page-inner-title">
                Խմբագրել ապրանքը
            </h1>
        </div>
    </div>
    <div class="row align-items-center col-custom-padding">
        <div class="col-8 form-group">
            <ul class="nav nav-tabs productTabs" id="ProductEditTabs" role="tablist">
                <li class="nav-item" role="presenatiton">
                    <a class="nav-link active" id="edit_productType-tab" data-toggle="tab" href="#edit_productType" role="tab" aria-controls="type" aria-selected="true">Տեսակ</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="edit_productDescr-tab" data-toggle="tab" href="#edit_productDescr" role="tab" aria-controls="descr" aria-selected="false">Նկարագրություն</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="edit_productImage-tab" data-toggle="tab" href="#edit_productImage" role="tab" aria-controls="image" aria-selected="false">Նկար</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="edit_productCharacteristic-tab" data-toggle="tab" href="#edit_productCharacteristic" role="tab" aria-controls="characteristic" aria-selected="false">Բնութագիր</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="edit_productReview-tab" data-toggle="tab" href="#edit_productReview" role="tab" aria-controls="review" aria-selected="false">Կարծիք</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="edit_productBuyers-tab" data-toggle="tab" href="#edit_productBuyers" role="tab" aria-controls="buyers" aria-selected="false">Գնորդներ</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link " id="edit_productColors-tab" data-toggle="tab" href="#edit_productColors" role="tab" aria-controls="colors" aria-selected="false">Գույներ</a>
                </li>
            </ul>
        </div>
        <div class=" offset-2 col-2 product-bottom">
            <button type="submit" class="btn btn-info btn btn-primary d-inline-flex align-items-center justify-content-center">Խմբագրել</button>
        </div>
    </div>
    <div class="tab-content bg-white col-custom-padding productTabContent" id="ProductEditTabsContent">
        <div class="col-5 tab-pane fade row  show active" id="edit_productType" role="tabpanel" aria-labelledby="edit_productType-tab">
            <div class="row form-group">
                <div class="col-12">
                    <label>Տեսակ *</label>
                    <div class="select-wrapper">
                        <select class="form-control">
                            <option value="1">option 1</option>
                            <option value="2">option 2</option>
                            <option value="3">option 3</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-4">
                    <label for="count">Քանակ պահեստում *</label>
                    <input value="{{ $item->count }}" name="count" id="count" type="number" class="form-control" placeholder="0" required>
                </div>
                <div class="col-4">
                    <label for="sale-price">Զեղչված գին *</label>
                    <div class="input-group">
                        <input value="{{ $item->price }}" name="price" id="sale-price" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="col-4">
                    <label for="sale-size">Զեղչված չափ *</label>
                    <div class="input-group">
                        <input value="{{ $item->sale }}" name="sale" id="sale-size" type="text" class="form-control" required>
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
                        <label for="input_status" class="custom_radio">
                            <input @if($item->sale_time_one_status == 0) checked @endif type="radio" name="sale_time_one_status" value="0" id="input_status">
                            <span class="checkmark"></span>
                            Պասիվ
                        </label>
                        <label for="input_status1" class="custom_radio">
                            <input @if($item->sale_time_one_status == 1) checked @endif type="radio" name="sale_time_one_status" value="1" id="input_status1">
                            <span class="checkmark"></span>
                            Ակտիվ
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <label>2. Զեղչի գործման ամսաթվի հետհաշվարկ</label>
                    <div class="show-hide-countdown mb-4 mt-3">
                        <label for="input_status_edit_second" class="custom_radio">
                            <input @if($item->sale_time_two_status == 0) checked @endif type="radio" name="sale_time_two_status" value="0" id="input_status_edit_second">
                            <span class="checkmark"></span>
                            Պասիվ
                        </label>
                        <label for="input_status1_edit_second" class="custom_radio">
                            <input @if($item->sale_time_two_status == 1) checked @endif type="radio" name="sale_time_two_status" value="1" id="input_status1_edit_second">
                            <span class="checkmark"></span>
                            Ակտիվ
                        </label>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <label for="url">Գրեք URL *</label>
                    <input value="{{ $item->url }}" name="url" type="text" class="form-control" id="url" placeholder="URL" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <label>Գնորդի թողած տվյալները</label>
                    <div class="select-wrapper">
                        <select name="phone_type" class="form-control">
                            <option @if ($item->phone_type == 1) selected @endif value="1">Հեռախոս</option>
                            <option @if ($item->phone_type == 2) selected @endif value="2">Հեռ․ և Անուն</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <label>Ինչպե՞ս պատվիրել </label>
                    <div class="select-wrapper">
                        <select name="how_to_order_type" class="form-control">
                            <option @if ($item->how_to_order_type == 1) selected @endif value="1">Տեսակ 1 - Փոքր</option>
                            <option @if ($item->how_to_order_type == 2) selected @endif value="2">Տեսակ 2 - Խաչաձև</option>
                            <option @if ($item->how_to_order_type == 3) selected @endif value="3">Տեսակ 3 - Մեծ</option>
                        </select>
                    </div>
                </div class="col-12">
            </div>
        </div>
        <div class="col-5 tab-pane fade" id="edit_productDescr" role="tabpanel" aria-labelledby="edit_productDescr-tab">
            <div class="row form-group">
                <div class="col-12">
                    <label for="custom">Անվանում trello-ում *</label>
                    <input value="{{ $item->custom }}" name="custom" type="text" class="form-control" id="custom" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <label for="name">Ապրանքի Անուն *</label>
                    <input value="{{ $item->name }}" name="name" type="text" class="form-control" id="name" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <label for="last_name">Ապրանքի Անուն footer</label>
                    <input value="{{ $item->last_name }}" name="last_name" type="text" class="form-control" id="last_name">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <label for="description">Կարճ բնութագիր</label>
                    <input value="{{ $item->description }}" name="description" type="text" class="form-control" id="description">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <label for="info_short_description_important_text">Ինֆորմացիոն տեքստ</label>
                    <textarea name="info_short_description_important_text" type="text" class="form-control" id="info_short_description_important_text" placeholder="Կարճ Բնութագրություներ">{{ $item->info_short_description_important_text }}</textarea>
                </div>
            </div>
        </div>
        <div class="col-5 tab-pane fade" id="edit_productImage" role="tabpanel" aria-labelledby="edit_productImage-tab">
            <div class="row form-group">
                <div class="col-12  ">
                    <label for="photo">Ապրանքի նկար *</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input value="{{ asset('image' . $item->photo) }}" id="photo" name="image" type="file" class="custom-file-input" id="photo">
                            <label class="custom-file-label" for="photo">Ներբեռնել</label>
                        </div>
                    </div>
                    <div class="added-image-product edit-page" id="uploaded-file">
                        <img src="{{asset('images/' . $item->photo)}}" alt="" id="uploaded_image">
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
                    <div class="added-image-product edit-page" id="uploaded-file_footer_product_image">
                        @if ($item->last_photo)
                        <img src="{{asset('images/' . $item->last_photo)}}" id="product_uploaded_file" alt="" />
                        @endif
                        <div class="added-image-product edit-page d-invisble">
                            <button class="delete-image-icon">
                                <img src="{{asset('./images/icons/times-icon.svg')}}" alt="">
                            </button>
                            <img src="#" alt="" id="long_desc_uploaded_file" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <label for="photo">Ներբեռնեք նկարներ սլայդի համար</label>
                    <div class="input-group" id="slider_container">
                        <div class="custom-file">
                            <input multiple name="slider_image[]" type="file" class="custom-file-input" id="slider_image_edit">
                            <label class="custom-file-label" for="slider">Ներբեռնել</label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center flex-wrap" id="there-editing-js-slides">
                        <div class="added-image-product edit-page" id="slider-form-group">
                            @foreach ($sliders as $slider)
                            @if ($slider)
                            <div class="slider-image-content">
                                <button id="{{ $slider->id }}" class="delete-slider-icon">
                                    <img src="{{asset('./images/icons/times-icon.svg')}}" alt="">
                                </button>
                                <img id="{{ $slider->id }}" src="{{asset('images/' . $slider->slider_photo)}}" alt="" />
                            </div>
                            @endif
                            <div class="added-image-product edit-page d-invisble">
                                <button class="delete-image-icon">
                                    <img src="{{asset('./images/icons/times-icon.svg')}}" alt="">
                                </button>
                                <img src="#" alt="" id="long_desc_uploaded_file" />
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <label for="youtube_link">Տեղադրեք հոլովակի հղումը</label>
                    <input value="{{ $item->youtube_link }}" name="youtube_link" type="text" class="form-control" id="youtube_link" placeholder="հղում">
                </div>
            </div>
        </div>
        <div class="row tab-pane fade" id="edit_productCharacteristic" role="tabpanel" aria-labelledby="edit_productCharacteristic-tab">
            <div class="col-12">
                <div class="row">
                    <div class="col-5  border-right-1">
                        <div class="row form-group">
                            <div class="col-12">
                                <label for="short_description">Առաջին բնութագրի վերնագիր</label>
                                <input value="{{ $shortDesc->info_short_description }}" name="info_short_description" type="text" class="form-control" id="short_description" placeholder="Բնութագիր">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12">
                                <label>Ընտրեք բնութագրող կետերը ցույց տալու տեսակը</label>
                                <div class="select-wrapper">
                                    <select name="info_short_description_type" class="form-control">
                                        <option value="0">Ընտրված չէ</option>
                                        <option @if ($shortDesc->info_short_description_type == 1) selected @endif value="1">Տեսակ 1 - Կետ</option>
                                        <option @if ($shortDesc->info_short_description_type == 2) selected @endif value="2">Տեսակ 2 - Թիվ</option>
                                        <option @if ($shortDesc->info_short_description_type == 3) selected @endif value="3">Տեսակ 3 - Չեք</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group mb-0">
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
                                @foreach($shortTexts as $id =>$shortText)
                                <div class="added-items">
                                    <!-- <label for="short_descriptions{{ $id }}">Առաջին բնութագրի կետեր</label> -->
                                    <div class="TextBoxDiv">
                                        <input name="info_short_description_text[]" type="text" class="form-control" id="short_descriptions{{ $id }}" value="{{ $shortText }}">
                                        <button class="removeInput description-dots">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20.851" height="20.85" viewBox="0 0 20.851 20.85">
                                                <path d="M175.673,172.545a2.212,2.212,0,1,1-3.129,3.129l-6.648-6.649-6.648,6.649a2.212,2.212,0,0,1-3.129-3.129l6.648-6.648-6.648-6.648a2.212,2.212,0,1,1,3.129-3.129l6.648,6.648,6.648-6.648a2.212,2.212,0,1,1,3.129,3.129l-6.648,6.648Zm0,0" transform="translate(-155.471 -155.471)" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                @endforeach
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
                                @if ($shortDesc->info_short_description_photo)
                                <div class="added-image-product edit-page" id="uploaded-file_short_descr">
                                    <button id="deleteDescShortPhoto" class="delete-image-icon">
                                        <img src="{{asset('./images/icons/times-icon.svg')}}" alt="">
                                    </button>
                                    <img src="{{asset('images/'. $shortDesc->info_short_description_photo)}}" alt="" id="upload_short_desc_file" />
                                </div>
                                @endif
                                <div id="uploaded-file_short_descr" class="added-image-product edit-page d-invisble">
                                    <button class="delete-image-icon" id="delete_short_desc_img">
                                        <img src="{{asset('./images/icons/times-icon.svg')}}" alt="">
                                    </button>
                                    <img src="#" alt="" id="upload_short_desc_file" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="row form-group">
                            <div class="col-12">
                                <label for="info_long_description">Երկրորդ բնութագրի վերնագիր</label>
                                <input value="{{ $longDesc->info_long_description }}" name="info_long_description" type="text" class="form-control" id="info_long_description">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12">
                                <label>Ընտրեք բնութագրող կետերը ցույց տալու տեսակը</label>
                                <div class="select-wrapper">
                                    <select name="info_long_description_type" class="form-control">
                                        <option value="0">Ընտրված չէ</option>
                                        <option @if ($longDesc->info_long_description_type == 1) selected @endif value="1">Տեսակ 1 - Կետ</option>
                                        <option @if ($longDesc->info_long_description_type == 2) selected @endif value="2">Տեսակ 2 - Թիվ</option>
                                        <option @if ($longDesc->info_long_description_type == 3) selected @endif value="3">Տեսակ 3 - Չեք</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group mb-0">
                            <div class="col-12" id="long_desc_container">
                                <label for="long_descriptions">Երկրորդ բնութագրի կետեր</label>
                                <div class="d-flex">
                                    <input name="info_long_description_text[]" type="text" class="form-control" id="long_descriptions" placeholder="Երկար Բնութագրություներ">
                                    <button id="add_input" onclick="addLongDescInput(event)" class="add_new_btn charackeristicAddBtn"><img src="{{ asset('./images/icons/times-icon.svg') }}" alt=""></button>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12">
                                @foreach($longTexts as $id => $longText)
                                <div class="added-items">
                                    <!-- <label for="long_descriptions{{ $id }}">Երկրորդ բնութագրի կետեր</label> -->
                                    <div class="TextBoxDiv">
                                        <input name="info_long_description_text[]" type="text" class="form-control" id="long_descriptions{{ $id }}" value="{{ $longText }}">
                                        <button class="removeInput description-dots">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20.851" height="20.85" viewBox="0 0 20.851 20.85">
                                                <path d="M175.673,172.545a2.212,2.212,0,1,1-3.129,3.129l-6.648-6.649-6.648,6.649a2.212,2.212,0,0,1-3.129-3.129l6.648-6.648-6.648-6.648a2.212,2.212,0,1,1,3.129-3.129l6.648,6.648,6.648-6.648a2.212,2.212,0,1,1,3.129,3.129l-6.648,6.648Zm0,0" transform="translate(-155.471 -155.471)" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                @endforeach
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
                                @if ($longDesc->info_long_description_photo)
                                <div class="added-image-product edit-page" id="uploaded-file_long_descr">
                                    <button id="delete_long_desc_image" class="delete-image-icon">
                                        <img src="{{asset('images/icons/times-icon.svg')}}" alt="">
                                    </button>
                                    <img src="{{asset('images/' . $longDesc->info_long_description_photo)}}" id="long_desc_uploaded_file" class="longDescrImageJS" alt="" />
                                </div>
                                @endif
                                <div id="uploaded-file_long_descr" class="added-image-product edit-page d-invisble longDescrImageJS">
                                    <button class="delete-image-icon">
                                        <img src="{{asset('images/icons/times-icon.svg')}}" alt="">
                                    </button>
                                    <img src="#" alt="" id="long_desc_uploaded_filesss" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row tab-pane fade" id="edit_productReview" role="tabpanel" aria-labelledby="edit_productReview-tab">
            <div class="accordion CommentsAccordeon" id="commentAccordeon">
                <div class="row form-group">
                    @foreach ($comments as $comment)
                    <div class="col-5 commentCollapsedItem">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <p class="mb-0">{{ $comment->comment_text }}</p>
                            </div>
                            <div class="col-2">
                                <div class="innerEdit">
                                    <button type="button" class="edit-comment-btn" data-toggle="collapse" data-target="#collapse{{ $comment->id }}" aria-expanded="false" aria-controls="collapse{{ $comment->id }}">
                                        <img src="{{asset('./images/icons/edit-icon.svg')}}" alt="">
                                    </button>

                                </div>
                            </div>
                            <div class="col-2">
                                <div class="innerDelete">
                                    <button class="deteleCommentBtn" data-delete="collapse{{ $comment->id }}" id="{{ $comment->id }}">
                                        <img src="{{asset('./images/icons/trash-icon.svg')}}" alt="">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-5 p-0">
                                <div class="collapse" id="collapse{{ $comment->id }}" data-parent="#commentAccordeon">
                                    <div class="collapsedInner">
                                        <div class="row form-group">
                                            <div class="col-12">
                                                <label for="comment_text">Գրել Մեկնաբանություն</label>
                                                <textarea name="comment_text[]" type="text" class="form-control" id="comment_text">{{ $comment->comment_text }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <label for="user_name">Օգտատիրոջ Անուն</label>
                                                        <input name="user_name[]" value="{{ $comment->user_name }}" type="text" class="form-control" id="user_name">
                                                    </div>
                                                    <div class="col-5">
                                                        <label for="comment_time">Ամսաթիվ</label>
                                                        <input name="comment_time[]" value="{{ $comment->comment_time }}" type="text" class="form-control" id="comment_time" placeholder="Օր / Ամիս / Տարի">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-12">
                                                <label for="user_photo">Օգտատիրոջ նկար</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input name="user_image[]" type="file" class="custom-file-input review" id="uploaded_user_file">
                                                        <label class="custom-file-label" for="user_photo">Ներբեռնել</label>
                                                    </div>
                                                </div>
                                                @if ($comment->user_photo)
                                                <div class="added-image-product edit-page" id="uploaded-file_user_image">
                                                    <button id="{{ $comment->id }}" class="delete-image-icon review">
                                                        <img src="{{asset('./images/icons/times-icon.svg')}}" alt="">
                                                    </button>
                                                    <img src="{{asset('images/' . $comment->user_photo)}}" alt="" />
                                                </div>
                                                @endif
                                                <div id="uploaded-file_user_image" class="added-image-product edit-page d-invisble">
                                                    <button class="delete-image-icon" id="remove_user_uploaded_file">
                                                        <img src="{{asset('./images/icons/times-icon.svg')}}" alt="">
                                                    </button>
                                                    <img src="#" alt="" id="user_uploaded_file" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-12">
                                                <label for="comment_photo">Օգտատիրոջ կողմից ավելացված տեսահոլովակի հղում</label>
                                                <input name="comment_video[]" type="text" class="form-control" id="slider" value="{{ $comment->comment_video }}">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-6">
                                                <label for="like">Հավանումների քանակը</label>
                                                <input value="{{ $comment->like }}" name="like[]" id="like" type="number" min="0" value="0" class="form-control w-50">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input value="{{ $comment->id }}" name="comment_id[]" type="hidden">
                    @endforeach
                    @forelse($comments as $comment)
                    @if ($loop->index == 0)
                    <div class="row w-100">
                        <div class="col-5">
                            <label>Ընտրեք մեկնաբանությունները ցույց տալու տեսակը</label>
                            <div class="select-wrapper">
                                <select name="comment_type[]" class="form-control">
                                    <option value="0">Ընտրված չէ</option>
                                    <option @if ($comment->comment_type == 1) selected @endif value="1">Սլայդ</option>
                                    <option @if ($comment->comment_type == 2) selected @endif value="2">Ֆեյսբուք</option>
                                    <option @if ($comment->comment_type == 3) selected @endif value="3">Ստանդարտ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    @endIf
                    @empty
                    <div class="row w-100">
                        <div class="col-5">
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
                    @endforelse
                </div>
                <div class="row">
                    <div id="commentsHere" class="col-5 p-0"></div>
                    <div class="col-12">
                        <button id="comment_add_btn" class="add_new_btn form-group">Ավելացնել</button></div>
                </div>
            </div>
        </div>
        <div class="col-5 tab-pane fade" id="edit_productBuyers" role="tabpanel" aria-labelledby="edit_productBuyers-tab">
            <div class="row form-group">
                <div class="col-12">
                    <label for="alert_1">1-ին Հաղորդագրություն 7վ․</label>
                    <textarea data-container="body" data-toggle="popover" data-placement="top" data-html="true" data-trigger="focus" name="alert_1" type="text" class="form-control withPopover" id="alert_1">{{ $item->alert_1 }}</textarea>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <label for="alert_2">2-րդ Հաղորդագրություն 2ր․</label>
                    <textarea data-container="body" data-toggle="popover" data-placement="top" data-html="true" data-trigger="focus" name="alert_2" type="text" class="form-control withPopover" id="alert_2">{{ $item->alert_2 }}</textarea>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <label for="alert_3">3-րդ Հաղորդագրություն 7ր․</label>
                    <textarea data-container="body" data-toggle="popover" data-placement="top" data-html="true" data-trigger="focus" name="alert_3" type="text" class="form-control withPopover" id="alert_3">{{ $item->alert_3 }}</textarea>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <label for="alert_4">4-րդ Հաղորդագրություն 15ր․</label>
                    <textarea data-container="body" data-toggle="popover" data-placement="top" data-html="true" data-trigger="focus" name="alert_4" type="text" class="form-control withPopover" id="alert_4">{{ $item->alert_4 }}</textarea>
                </div>
            </div>
        </div>
        <div class="row tab-pane fade" id="edit_productColors" role="tabpanel" aria-labelledby="edit_productColors-tab">
            <div class="row form-group edit-page-color-group">
                <div class="col-12">
                    <label for="description_color">Կարճ բնութագրի ետնամասի գույն</label>
                    <div class="color-picker-parent">
                        <input value="{{ $item->description_color }}" class="form-control product-color-picker" name="description_color" type="color" id="description_color">
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <label>Հիմնական գույն</label>
                <div class="col-12">
                    @if (count($colors))
                    @foreach ($colors as $color)
                    <div class="custom-control custom-radio">
                        <input @if ($item->color == $color->color) checked @endif value="{{ $color->color }}" class="custom-control-input"
                        type="radio" id="color{{ $color->id }}" name="color">
                        <label style="background: {{ $color->color }};" for="color{{ $color->id }}" class="custom-control-label page-color-label"></label>
                    </div>
                    @endforeach
                </div>
                <div class="col-12 mt-3">
                    <label>Երկրորդական գույն</label>
                    @foreach ($colors as $color)
                    <div class="custom-control custom-radio">
                        <input @if ($item->color_two == $color->color) checked @endif value="{{ $color->color }}" class="custom-control-input"
                        type="radio" id="colorTwo{{ $color->id }}" name="color_two">
                        <label style="background: {{ $color->color }};" for="colorTwo{{ $color->id }}" class="custom-control-label page-color-label"></label>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
</form>
@endsection
