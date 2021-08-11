@extends('layouts.adminLayouts.admin-layout')

@section('admin-content')

            <form action="{{ route('thankYou.updateElement', $item->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7 bg-white col-custom-padding">
                            <div class="form-group">
                                <label for="name">Ապրանքի Անուն*</label>
                                <input value="{{ $item->name }}" name="name" type="text" class="form-control" id="name"
                                       placeholder="Ապրանքի Անուն*" required>
                            </div>

                            <div class="form-group">
                                <label for="trello">Тrello անուն*</label>
                                <input value="{{ $item->trello }}" name="trello" type="text" class="form-control" id="trello"
                                       placeholder="Тrello անուն*" required>
                            </div>

                            <div class="form-group">
                                <label for="photo">Ապրանքի նկար*</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="image" type="file" class="custom-file-input" id="photo_thank_you">
                                        <label class="custom-file-label" for="photo">Ընտրել Նկար</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="added-image-product edit-page">
                                    <img src="{{asset('images/' . $item->photo)}}" id="thank_you_uploaded_file" alt=""/>
                                </div>
                            </div>
                            <div class="form-group mb-0" id="thanks_desc_container">
                                <label for="description">Բնութագրություներ</label>
                                @foreach($item->description as $desc)
                                    <div class="TextBoxDiv">
                                        <input value="{{ $desc }}" name="description[]" type="text" class="form-control"
                                               id="description" placeholder="Բնութագրություներ">
                                        <button class="removeInput thank-you-desc">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20.851" height="20.85"
                                                 viewBox="0 0 20.851 20.85">
                                                <path
                                                    d="M175.673,172.545a2.212,2.212,0,1,1-3.129,3.129l-6.648-6.649-6.648,6.649a2.212,2.212,0,0,1-3.129-3.129l6.648-6.648-6.648-6.648a2.212,2.212,0,1,1,3.129-3.129l6.648,6.648,6.648-6.648a2.212,2.212,0,1,1,3.129,3.129l-6.648,6.648Zm0,0"
                                                    transform="translate(-155.471 -155.471)"/>
                                            </svg>
                                        </button>
                                    </div>
                                @endforeach

                            </div>
                            <div class="form-group mt-0">
                                <button onclick="addThanksDescription(event)" class="add_new_btn">ավելացնել</button>
                            </div>
                            <div class="row">
                                <div class="col-3 form-group">
                                    <label for="sale-price">Զեղչված գին *</label>
                                    <div class="input-group">
                                        <input value="{{ $item->price }}" name="price" id="sale-price" type="text"
                                               class="form-control"
                                               required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">$</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 form-group">
                                    <label for="sale-price">Զեղչված գին *</label>
                                    <div class="input-group">
                                        <input value="{{ $item->sale }}" name="sale" id="sale-size" type="text"
                                               class="form-control"
                                               required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn large-blue-btn ml-auto">Խմբագրել</button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>


@endsection
