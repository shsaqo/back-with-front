@extends('layouts.main')
@section('content')
@if($errors->has('phone'))
<div style="color: red" class="error text-center">{{ $errors->first('phone') }}</div>
@endif
@if(session()->exists('expirationPhone')))
<div style="color: red" class="error text-center">{{ session('expirationPhone') }}</div>
@endif
<div class="order-call-fixed" data-da=".nav, 1199.98, last">
    <div class="relative-content" data-open-pulse>

        <img src="{{asset('images/icons/phone.svg')}}" alt="">
        <form action="{{ route('callBack') }}" method="post" class="d-none">
            @csrf
            <div class="input-group">
                <input type="tel" class="form-control" name="tel" placeholder="Գրեք ձեր հեռախոսահամարը">
                {{-- <input type="hidden" name="callBackUrl" value="{{ $items->url }}"> --}}
                <div class="input-group-append">
                    <button type="submit" class="input-group-text modal-send-btn">Հետ Զանգ</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="page-home">
    @if (session()->exists('ok'))
    <div class="alert alert-success alert-dismissible text-center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ session('ok') }}</strong>
    </div>
    @endif
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="navbar_container d-flex align-items-center">
                        <div class="navbar-logo">
                            <a href="#" aria-label="Logo"><img src="{{ asset('home/img/logo-width-text.svg') }}" alt=""></a>
                        </div>
                        <div class="navlist_container ml-auto d-flex">
                            <nav class="nav">
                                <ul class="navlist d-flex list-unstyled">
                                    <li class="navlist__item"><a href="#products">Տեսականի</a></li>
                                    <li class="navlist__item"><a href="#comments">Մեկնաբանություններ</a></li>
                                    <li class="navlist__item"><a href="#payments-delivery">Առաքում/Վճարում</a></li>
                                    <li class="navlist__item"><a href="#contacts">Կապ մեզ հետ</a></li>
                                    <li class="navlist__item"><a href="#how-to-order">Ինչպես վճարել</a></li>
                                </ul>
                            </nav>
                            <div class="header_number">
                                <a href="tel:+374041055041">+374 041 055 041 </a>
                            </div>
                        </div>

                        <button class="icon-wrapper" aria-label="Mobile menu">
                            <span class="icon-humburger"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="main">
        @if (count($sliders) && $sliders[0]->status)
        <section class="hero-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="slider-parent-container">
                            <div class="swiper-container swiper-container-hero">
                                <div class="swiper-wrapper">
                                    @foreach($sliders[0]->sliderItem as $slider)
                                    <div @if($slider->buy_status) class="swiper-slide modal-opener wihtLinkSliderCursor"
                                        @else class="swiper-slide"
                                        @endif data-path="slider{{$slider->id}}">
                                        <div class="swiper-slide-item">
                                            <img src="{{ asset('images/'.$slider->photo) }}" alt="">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="swiper-hero-slider-buttons-next"><img src="{{ asset('home/img/icons/arrow.svg') }}" alt="">
                            </div>
                            <div class="swiper-hero-slider-buttons-prev"><img src="{{ asset('home/img/icons/arrow.svg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach($sliders[0]->sliderItem as $slider)
            <div data-target="slider{{$slider->id}}" class="modal call-modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title-container">
                        </div>
                        <button class="modal-closer">
                            <img src="{{ asset('home/img/icons/closer-icon.svg') }}" alt="" />
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-form-container">
                            <form action="{{ route('order.create') }}" method="post">
                                @csrf
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <label for="" class="modal-label text-center">Գրեք Ձեր
                                                հեռախոսահամարը</label>
                                            <div class="modal-input-parent">
                                                <input required type="tel" name="phone" id="">
                                                <input type="hidden" name="homePage" value="1">
                                                <input type="hidden" name="productId" value="slider-{{ $slider->id }}">
                                                <input type="hidden" name="product_name" value="{{ $slider->trello }}">
                                                <input type="hidden" name="url" value="{{ request()->getHost() }}">
                                                <input type="hidden" name="trello" value="{{ $slider->trello }}">
                                            </div>
                                        </div>
                                        <div class="col-12 modal-send-btn">
                                            <button type="submit">Պատվիրել</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </section>
        @endif

        <section id="products" class="product-items-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="products_title title text-center">Տեսականի</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col-sm-6 col-12 col-lg-4 col-xxl-3">
                        <div class="product_item">
                            <a href="#" data-path="product{{ $product->id }}" class="modal-opener">
                                <div class="product_image">
                                    <div class="swiper-container product-mobile-slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <img data-src="{{ asset('images/'.$product->photo) }}" alt="" class="swiper-lazy">
                                                <div class="swiper-lazy-preloader"></div>
                                            </div>
                                            @foreach ($product->slider as $slider)
                                            <div class="swiper-slide">
                                                <img data-src="{{ asset('images/'.$slider->photo) }}" alt="" class="swiper-lazy">
                                                <div class="swiper-lazy-preloader"></div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="swiper-products-mobile-buttons-next"><img src="{{ asset('home/img/icons/arrow.svg') }}" alt=""></div>
                                    <div class="swiper-products-mobile-buttons-prev"><img src="{{ asset('home/img/icons/arrow.svg') }}" alt=""></div>
                                </div>
                                <div class="product_name">
                                    <h3 class="prod_title">
                                        {{ $product->name }}
                                    </h3>
                                </div>
                                <div class="product_price">
                                    <div class="price_count">
                                        <p>{{ $product->price }} <span>դր</span></p>
                                        <s>{{ $product->old_price }} <span>դր</span></s>
                                    </div>
                                    <div class="price_percent">
                                        <p>{{ $product->sale }}<span>%</span></p>
                                    </div>
                                </div>
                            </a>
                            <div class="product_order">
                                <button class="product_order_btn modal-opener" data-path="productButton{{$product->id}}">
                                    Պատվիրել
                                </button>
                            </div>
                        </div>
                    </div>
                    @if ($loop->iteration == 8 && count($spec['type_8']))

                    <div class="special-offer-section col-12">
                        <div class="container">
                            <div class="row">
                                @foreach ($spec['type_8'] as $spec_8)
                                <div class="col-lg-6">
                                    <div class="special_offer_item">
                                    @if($spec_8->photo)
                                        <div class="special-offer-image">
                                            <img src="{{ asset('images/'.$spec_8->photo) }}" alt="">
                                        </div>
                                    @else
                                        <div class="special-offer-image__youtube">
                                            <img  class="poster" src="{{ asset('images/'.$spec_8->youtube_photo) }}" alt="">
                                            <iframe
                                                width="100%"
                                                height="516"
                                                src="{{ $spec_8->youtube }}"
                                                title="YouTube video player"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen>
                                            </iframe>
                                        </div>
                                    @endif
                                        <div class="special-offer-price-order product_price">
                                            <div class="d-flex align-items-center">
                                                <div class="special-offer-price price_count">
                                                    <p>{{ $spec_8->price }}<span>դր</span></p>
                                                    <s>{{ $spec_8->old_price }}<span>դր</span></s>
                                                </div>
                                                <div class="price_percent">
                                                    <p>-{{ $spec_8->sale }}%</p>
                                                </div>
                                            </div>
                                            <div class="special-offer-order">
                                                <button class="special-offer-btn modal-opener" data-path="spec{{ $spec_8->id }}">Պատվիրել
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                    @if ($loop->iteration == 16 && count($spec['type_16']))
                    <div class="special-offer-section col-12">
                        <div class="container">
                            <div class="row">
                                @foreach ($spec['type_16'] as $spec_16)
                                <div class="col-lg-6">
                                    <div class="special_offer_item">
                                    @if($spec_16->photo)
                                        <div class="special-offer-image">
                                            <img src="{{ asset('images/'.$spec_16->photo) }}" alt="">
                                        </div>
                                    @else
                                        <div class="special-offer-image__youtube">
                                                <img class="poster" src="{{ asset('images/'.$spec_16->youtube_photo) }}" alt="">
                                                <iframe
                                                    width="100%"
                                                    height="516"
                                                    src="{{ $spec_16->youtube }}"
                                                    title="YouTube video player"
                                                    frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen>
                                                </iframe>
                                        </div>
                                    @endif
                                        <div class="special-offer-price-order product_price">
                                            <div class="d-flex align-items-center">
                                                <div class="special-offer-price price_count">
                                                    <p>{{ $spec_16->price }}<span>դր</span></p>
                                                    <s>{{ $spec_16->old_price }}<span>դր</span></s>
                                                </div>
                                                <div class="price_percent">
                                                    <p>-{{ $spec_16->sale }}</p>
                                                </div>
                                            </div>
                                            <div class="special-offer-order">
                                                <button class="special-offer-btn modal-opener" data-path="spec{{ $spec_16->id }}">Պատվիրել
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                    @if ($loop->iteration == 24 && count($spec['type_24']))

                    <div class="special-offer-section col-12">
                        <div class="container">
                            <div class="row">
                                @foreach ($spec['type_24'] as $spec_24)
                                <div class="col-lg-6">
                                    <div class="special_offer_item">
                                    @if($spec_24->photo)
                                        <div class="special-offer-image">
                                            <img src="{{ asset('images/'.$spec_24->photo) }}" alt="">
                                        </div>
                                    @else
                                        <div class="special-offer-image__youtube">
                                            <img class="poster" src="{{ asset('images/'.$spec_8->youtube_photo) }}" alt="">
                                            <iframe
                                                width="100%"
                                                height="516"
                                                src="{{ $spec_8->youtube }}"
                                                title="YouTube video player"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen>
                                            </iframe>
                                        </div>
                                    @endif
                                        <div class="special-offer-price-order product_price">
                                            <div class="d-flex align-items-center">
                                                <div class="special-offer-price price_count">
                                                    <p>{{ $spec_24->price }}<span>դր</span></p>
                                                    <s>{{ $spec_24->old_price }}<span>դր</span></s>
                                                </div>
                                                <div class="price_percent">
                                                    <p>-{{ $spec_24->sale }}</p>
                                                </div>
                                            </div>
                                            <div class="special-offer-order">
                                                <button class="special-offer-btn modal-opener" data-path="spec{{ $spec_24->id }}">Պատվիրել
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif

                    <div data-target="productButton{{$product->id}}" class="modal call-modal">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="modal-title-container">
                                </div>
                                <button class="modal-closer">
                                    <img src="{{ asset('home/img/icons/closer-icon.svg') }}" alt="" />
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="modal-form-container">
                                    <form action="{{ route('order.create') }}" method="post">
                                        @csrf
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <label for="" class="modal-label text-center">Գրեք Ձեր
                                                        հեռախոսահամարը</label>
                                                    <div class="modal-input-parent">
                                                        <input required type="tel" name="phone">
                                                        <input type="hidden" name="homePage" value="1">
                                                        <input type="hidden" name="productId" value="product-{{ $product->id }}">
                                                        <input type="hidden" name="product_name" value="{{ $product->name }}">
                                                        <input type="hidden" name="url" value="{{ request()->getHost() }}">
                                                        <input type="hidden" name="trello" value="{{ $product->trello }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 modal-send-btn">
                                                    <button type="submit">Պատվիրել</button>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </section>

        <section id="comments" class="comment-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="comments_title title text-center">
                            Մեկնաբանություններ
                        </h2>
                    </div>
                </div>
                <div class="row">
                    @foreach ($reviews as $review)
                    <div class="col-lg-4 mb-5">
                        <div class="comment-item">
                            <div class="commentor-info">
                                <div class="commentor">
                                    <div class="commentor-image">
                                        <img src="{{ asset('images/'.$review->user_photo) }}" alt="">
                                    </div>
                                    <div class="commentor-name-and-star">
                                        <h4 class="commentor-name">{{ $review->name }}</h4>
                                        <div class="commentor-stars">
                                            <div class="rateYo" data-readonly="true" data-rate={{ $review->star }}></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="commentor-comment commentorsSmallSliderContent">
                                <p>{{ $review->message }}</p>
                                @if(count($review->file) >= 3)
                                <div class="col-12">
                                    <div class="swiper-container commentorsSmallSlider">
                                        <div class="swiper-wrapper">

                                            @foreach ($review->file as $file)
                                            <div class="swiper-slide">
                                                <img class="commentor-attached-file" src="{{ asset('images/'.$file->file) }} " alt="">
                                            </div>
                                            @endforeach

                                            @if($review->youtube)
                                            <div class="swiper-slide">
                                                <iframe width="100%" height="130" src="{{ $review->youtube }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </div>
                                            @endif

                                        </div>
                                    </div>
                                    {{-- <div class="swiper-commentNext">
                                        <img src="{{ asset('home/img/icons/arrow.svg') }}" alt="">
                                </div>
                                <div class="swiper-commentPrev">
                                    <img src="{{ asset('home/img/icons/arrow.svg') }}" alt="">
                                </div> --}}
                            </div>
                            @else
                            <div class="row">
                                @forelse($review->file as $file)
                                <div class="col-md-4 col-6">
                                    <img class="commentor-attached-file" src="{{ asset('images/'.$file->file) }} " alt="">
                                </div>
                                @empty

                                @endforelse
                                @isset($review->youtube)
                                <div class="col-md-4 col-6">
                                    <iframe width="100%" height="130" src="https://www.youtube.com/embed/sVPYIRF9RCQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                @endisset
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-12 text-center">
                <a href="#" class='more-comments'>Տեսնել ավելին</a>
            </div>
</div>
</section>

<section id="payments-delivery" class="payment-delivery-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="pay-del-title title text-center">Առաքում և վճարում</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-4 col-xxl-3">
                <div class="pay-del-item d-flex">
                    <div class="pay-del-item-image">
                        <img src="{{ asset('home/img/icons/del-to-city.svg') }}" alt="">
                    </div>
                    <div class="pay-del-item-content">
                        <p class="text-center">Առաքում Երևանում <br> 24 ժամ</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xxl-3">
                <div class="pay-del-item d-flex">
                    <div class="pay-del-item-image">
                        <img src="{{ asset('home/img/icons/del-to-city.svg') }}" alt="">
                    </div>
                    <div class="pay-del-item-content">
                        <p class="text-center">Առաքում մարզերում <br> 3-5 օր</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xxl-3">
                <div class="pay-del-item d-flex">
                    <div class="pay-del-item-image">
                        <img src="{{ asset('home/img/icons/del-to-city.svg') }}" alt="">
                    </div>
                    <div class="pay-del-item-content">
                        <p class="text-center">Վճարումը կանխիկ, <br> ապրանքը ստանալիս</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contacts" class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-12">
                <div class="contact-text-content">
                    <h2 class="contact-title title">Կապ մեզ հետ</h2>
                    <p class="contact-title_descr">Գրեք Ձեր հեռախոսահամարը և մեր օպերատորը 10 րոպեների
                        ընթացքում կզանգահարի Ձեզ</p>
                    <form action="{{ route('callBack') }}" method="post" class="contact-form">
                        @csrf
                        <div class="contact-number">
                            <input name="tel" type="tel" placeholder="+374__-__-__-__">
                            <input type="hidden" name="callBackUrl" value="">
                            <button type="submit">Ուղարկել</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 offset-2 after-desktop-invisible">
                <img src="{{ asset('home/img/contact-image.png') }}" alt="">
            </div>
        </div>
    </div>
</section>

<section id="how-to-order" class="how-to-order-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title how-to-title text-center">Ինչպես պատվիրել</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="order-steps">
                    <p class="order_step_item" data-number="1">
                        Թողեք հայտ
                    </p>
                    <p class="order_step_item" data-number="2">
                        Սպասեք ադմինիստրատորի զանգին
                    </p>
                    <p class="order_step_item" data-number="3">
                        Առաքում
                    </p>
                    <p class="order_step_item" data-number="4">
                        Վճարում պատվերը ստանալիս
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="special-offer-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="special-offer-title title text-center">Հատուկ առաջարկ</h2>
            </div>
        </div>
        <div class="row">
            @forelse($spec['type_1'] as $spec_1)
            <div class="col-lg-6">
               <div class="special_offer_item">
                   @if($spec_1->photo)
                        <div class="special-offer-image">
                            <img src="{{ asset('images/'.$spec_1->photo) }}" alt="">
                        </div>
                    @else
                        <div class="special-offer-image__youtube">
                            <img class="poster"  src="{{ asset('images/'.$spec_1->youtube_photo) }}" alt="">
                            <iframe
                                class="iframeItem"
                                id="video{{ $loop->iteration }}"
                                width="100%"
                                height="516"
                                src="{{ $spec_1->youtube }}"
                                title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                        </div>
                    @endif
                    <div class="special-offer-price-order product_price">
                        <div class="d-flex align-items-center">
                            <div class="special-offer-price price_count">
                                <p>{{ $spec_1->price }}<span>դր</span></p>
                                <s>{{ $spec_1->old_price }}<span>դր</span></s>
                            </div>
                            <div class="price_percent">
                                <p>-{{ $spec_1->sale }}%</p>
                            </div>
                        </div>
                        <div class="special-offer-order">
                            <button class="special-offer-btn modal-opener" data-path="spec{{ $spec_1->id }}">
                                Պատվիրել
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </div>
</div>
</main>
</div>

<!-- modals call start -->
@forelse ($spec['type_1'] as $spec_1)
<div data-target="spec{{ $spec_1->id }}" class="modal call-modal">
    <div class="modal-content">
        <div class="modal-header">
            <div class="modal-title-container">
            </div>
            <button class="modal-closer">
                <img src="{{ asset('home/img/icons/closer-icon.svg') }}" alt="" />
            </button>
        </div>
        <div class="modal-body">
            <div class="modal-form-container">
                <form action="{{ route('order.create') }}" method="post">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center">
                                <label for="" class="modal-label text-center">Գրեք Ձեր
                                    հեռախոսահամարը</label>
                                <div class="modal-input-parent">
                                    <input required type="tel" name="phone">
                                    <input type="hidden" name="homePage" value="1">
                                    <input type="hidden" name="productId" value="spec-{{ $spec_1->id }}">
                                    <input type="hidden" name="product_name" value="{{ $spec_1->trello }}">
                                    <input type="hidden" name="url" value="{{ request()->getHost() }}">
                                    <input type="hidden" name="trello" value="{{ $spec_1->trello }}">
                                </div>
                            </div>
                            <div class="col-12 modal-send-btn">
                                <button type="submit">Պատվիրել</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@empty
@endforelse

@forelse ($spec['type_8'] as $spec_8)
<div data-target="spec{{ $spec_8->id }}" class="modal call-modal">
    <div class="modal-content">
        <div class="modal-header">
            <div class="modal-title-container">
            </div>
            <button class="modal-closer">
                <img src="{{ asset('home/img/icons/closer-icon.svg') }}" alt="" />
            </button>
        </div>
        <div class="modal-body">
            <div class="modal-form-container">
                <form action="{{ route('order.create') }}" method="post">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center">
                                <label for="" class="modal-label text-center">Գրեք Ձեր
                                    հեռախոսահամարը</label>
                                <div class="modal-input-parent">
                                    <input required type="tel" name="phone">
                                    <input type="hidden" name="homePage" value="1">
                                    <input type="hidden" name="productId" value="spec-{{ $spec_8->id }}">
                                    <input type="hidden" name="product_name" value="{{ $spec_8->trello }}">
                                    <input type="hidden" name="url" value="{{ request()->getHost() }}">
                                    <input type="hidden" name="trello" value="{{ $spec_8->trello }}">
                                </div>
                            </div>
                            <div class="col-12 modal-send-btn">
                                <button type="submit">Պատվիրել</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@empty
@endforelse

@forelse ($spec['type_16'] as $spec_16)
<div data-target="spec{{ $spec_16->id }}" class="modal call-modal">
    <div class="modal-content">
        <div class="modal-header">
            <div class="modal-title-container">
            </div>
            <button class="modal-closer">
                <img src="{{ asset('home/img/icons/closer-icon.svg') }}" alt="" />
            </button>
        </div>
        <div class="modal-body">
            <div class="modal-form-container">
                <form action="{{ route('order.create') }}" method="post">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center">
                                <label for="" class="modal-label text-center">Գրեք Ձեր
                                    հեռախոսահամարը</label>
                                <div class="modal-input-parent">
                                    <input required type="tel" name="phone">
                                    <input type="hidden" name="homePage" value="1">
                                    <input type="hidden" name="productId" value="spec-{{ $spec_16->id }}">
                                    <input type="hidden" name="product_name" value="{{ $spec_16->trello }}">
                                    <input type="hidden" name="url" value="{{ request()->getHost() }}">
                                    <input type="hidden" name="trello" value="{{ $spec_16->trello }}">
                                </div>
                            </div>
                            <div class="col-12 modal-send-btn">
                                <button type="submit">Պատվիրել</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@empty
@endforelse

@forelse ($spec['type_24'] as $spec_24)
<div data-target="spec{{ $spec_24->id }}" class="modal call-modal">
    <div class="modal-content">
        <div class="modal-header">
            <div class="modal-title-container">
            </div>
            <button class="modal-closer">
                <img src="{{ asset('home/img/icons/closer-icon.svg') }}" alt="" />
            </button>
        </div>
        <div class="modal-body">
            <div class="modal-form-container">
                <form action="{{ route('order.create') }}" method="post">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center">
                                <label for="" class="modal-label text-center">Գրեք Ձեր
                                    հեռախոսահամարը</label>
                                <div class="modal-input-parent">
                                    <input required type="tel" name="phone">
                                    <input type="hidden" name="homePage" value="1">
                                    <input type="hidden" name="productId" value="spec-{{ $spec_24->id }}">
                                    <input type="hidden" name="product_name" value="{{ $spec_24->trello }}">
                                    <input type="hidden" name="url" value="{{ request()->getHost() }}">
                                    <input type="hidden" name="trello" value="{{ $spec_24->trello }}">
                                </div>
                            </div>
                            <div class="col-12 modal-send-btn">
                                <button type="submit">Պատվիրել</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@empty
@endforelse

<!-- modals call end -->

<!-- modals product start -->
@foreach($products as $product)
{{-- @if ($product->slider && count($product->slider))--}}
<div data-target="product{{ $product->id }}" class="modal single-modal">
    <div class="modal-content">
        <div class="modal-header">
            <div class="modal-title-container">
            </div>
            <button class="modal-closer">
                <img src="{{ asset('home/img/icons/closer-icon.svg') }}" alt="" />
            </button>
        </div>
        <div class="modal-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="modal-sliders-parent">
                            <div class="swiper-container gallery-top">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{ asset('images/'.$product->photo) }}" alt="">
                                    </div>
                                    @foreach($product->slider as $slider)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('images/'.$slider->photo) }}" alt="">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="thumbs-arrow-container">
                                <div class="swiper-container gallery-thumb">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="{{ asset('images/'.$product->photo) }}" alt="">
                                        </div>
                                        @foreach($product->slider as $slider)
                                        <div class="swiper-slide">
                                            <img src="{{ asset('images/'.$slider->photo) }}" alt="">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="swiper-thumbs-slider-buttons-prev"><img src="{{ asset('home/img/icons/arrow.svg') }}" alt=""></div>
                                <div class="swiper-thumbs-slider-buttons-next"><img src="{{ asset('home/img/icons/arrow.svg') }}" alt=""></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-1">
                        <div class="slider-modal-text-content d-flex flex-column">
                            <div class="slider-product-title">
                                <h2 class="title slider-item-title">{{ $product->name }}</h2>
                            </div>
                            <div class="slider-modal-product-price-all-info d-flex align-items-center justify-content-between">
                                <div class="modal-price-content">
                                    <p class="slider-modal-siled-price">{{ $product->price }} <span>դր</span>
                                    </p>
                                    <s class="slider-modal-siled-price">{{ $product->old_price }}
                                        <span>դր</span></s>
                                </div>
                                <div class="modal-percent-content">
                                    <p><span>-</span>{{ $product->sale }}<span>%</span></p>
                                </div>
                            </div>
                            <div class="slider-modal-product-descr-dots">
                                <ul class="descr-dots_list">
                                    @foreach ($product->description as $description)
                                    <li class="descr-dots_list__items">{{ $description->description }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="slider-modal-button-content mt-auto">
                                <button class="slider-modal-btn modal-opener" data-path="productButton{{ $product->id }}">
                                    Պատվիրել
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @endif--}}
@endforeach
<!-- modals product end -->
@endsection
