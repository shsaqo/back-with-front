@extends('layouts.trend', ['codes' => $codes, 'trend' => $items->name])
@section('content')
    @if($errors->has('phone'))
        <div style="color: red" class="error text-center">{{ $errors->first('phone') }}</div>
    @endif
    @if(session()->exists('expirationPhone')))
        <div style="color: red" class="error text-center">{{ session('expirationPhone') }}</div>
    @endif
    <div class="order-call-fixed">
        <div class="relative-content" data-open-pulse>

            <img src="{{asset('images/icons/phone.svg')}}" alt="">
            <form action="{{ route('callBack') }}" method="post" class="d-none">
                @csrf
                <div class="input-group">
                    <input type="tel" class="form-control" name="tel" placeholder="Գրեք ձեր հեռախոսահամարը">
                    <input type="hidden" name="callBackUrl" value="{{ $items->url }}">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text modal-send-btn">Հետ Զանգ</button>
                    </div>
                </div>
            </form>
            @if (Session::has('ok'))
                <div class="alert alert-success alert-dismissible success-mesage-for-order-call">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ Session::get('ok') }}
                </div>

            @endif
        </div>
    </div>
    <div class="page">
        <span id="spanBlue" style="color:{{ $items->color ?? '#1CADF9' }}"></span>
        <span id="spanRed" style="color:{{ $items->color_two ?? '#F80000' }}"></span>
        <span id="spanGradient" style="background: {{ $items->color ?? '#1CADF9' }}"></span>
        <main class="main">
            <section class="product-price-section section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="product-title">
                                <h2 class="text-center">{{ $items->name }}</h2>

                            </div>
                        </div>
                        @if($items->description)
                            <div class="header-item-title-descr" style="background: {{ $items->description_color }}">
                                <p>{{ $items->description }}</p>
                            </div>
                        @endif
                        <div class="product-content" data-sale='{{ $items->sale }}'>
                            <div class="product-image">
                                <img src="{{ asset('images/'.$items->photo) }}" class="img-fluid" alt="product image">
                            </div>
                            <div class="product-prices d-flex">
                                <div class="price-item retail-price col-6">
                                    <p class="price_title">
                                        Հին գին:
                                    </p>
                                    <p class="price-money">
                                        <s>{{ $items->old_price }}<span>Դ</span></s>
                                    </p>
                                </div>
                                <div class="price-item saled-price col-6">
                                    <p class="price_title">
                                        Զեղչված գին:
                                    </p>
                                    <p class="price-money">{{ $items->price }}<span>Դ</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="product-order">
                            <button type='button' data-to='#scroll-area'>Պատվիրել զեղչով</button>
                            <div class="order-count">
                                <p>Մնաց
                                    <span>{{ $items->count }}</span>
                                    հատ</p>
                            </div>
                        </div>
                    </div>
                </div>
                @if($items->sale_time_one_status)
                    <div class="countdown-part">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="countdown-title text-center">
                                        Ակցիայի ավարտին մնաց
                                    </h3>
                                    <div class="coundownCustomContainer">
                                        <div id="day_1" class="countdownItem">
                                        </div>
                                        <div id="hour_1" class="countdownItem">
                                        </div>
                                        <div id="minutes_1" class="countdownItem">
                                        </div>
                                        <div id="seconds_1" class="countdownItem">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </section>
            <section class="product-price-section short-desc-section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="product-title">
                                <h2 class="text-center">{{ $shortDesc->info_short_description }}</h2>
                            </div>
                        </div>

                        @isset($shortDesc->info_short_description_photo)
                            <div class="product-content not-saled-content mb-0">
                                <div class="product-image">
                                    <img src="{{ asset('images/'.$shortDesc->info_short_description_photo) }}"
                                         class="img-fluid" alt="product image">
                                </div>
                            </div>
                        @endisset
                        <div class="list-fieldset-video">
                            <section class="short-desc-section long-descr-section">
                                @if ($shortDesc->info_short_description_type == 1 && count($shortTexts))
                                    <ul class="produt-dotted-list">
                                        @foreach($shortTexts as $shortText)
                                            <li>{{ $shortText }}</li>
                                        @endforeach
                                    </ul>
                            </section>
                            @elseif($shortDesc->info_short_description_type == 2 && count($shortTexts))
                                <section class="product-price-section long-descr-section p-0">
                                    <div class="container">
                                        <div class="row">
                                            <div class="long-list-content">
                                                <ol class="long-descr-list">
                                                    @foreach ($shortTexts as $shortText)
                                                        <li>
                                                            <span class="marker">{{ $loop->iteration }}</span>
                                                            {{ $shortText }}
                                                        </li>
                                                    @endforeach
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            @elseif($shortDesc->info_short_description_type == 3 && count($shortTexts))
                                <div class="product-descr">
                                    <ul class="product-descr-list list-unstyled">
                                        @foreach ($shortTexts as $shortText)
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="17.002"
                                                     height="17.002" viewBox="0 0 17.002 17.002">
                                                    <g transform="translate(-20 -666.737)">
                                                        <path
                                                            d="M8.5,0A8.5,8.5,0,1,0,17,8.5,8.51,8.51,0,0,0,8.5,0Zm0,0"
                                                            transform="translate(20 666.737)"
                                                            fill="{{ $items->color }}" opacity="0.5"/>
                                                        <path
                                                            d="M149.445,166.538l-4.6,4.6a.708.708,0,0,1-1,0l-2.3-2.3a.708.708,0,1,1,1-1l1.8,1.8,4.1-4.1a.708.708,0,0,1,1,1Zm0,0"
                                                            transform="translate(-116.635 506.899)" fill="#fafafa"/>
                                                    </g>
                                                </svg>
                                                <p class="descr-text">{{ $shortText }}</p></li>
                                        @endforeach
                                    </ul>
                                </div>
                            @elseif($shortDesc->info_short_description_type == 4 && count($shortTexts))
                                <div class="product-descr">
{{--                                    <h3 class="product-descr-title">Նկարագրություն</h3>--}}
                                    <ul class="product-descr-list list-unstyled">
                                        @foreach ($shortTexts as $shortText)
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="17.002"
                                                     height="17.002" viewBox="0 0 17.002 17.002">
                                                    <g transform="translate(-20 -666.737)">
                                                        <path
                                                            d="M8.5,0A8.5,8.5,0,1,0,17,8.5,8.51,8.51,0,0,0,8.5,0Zm0,0"
                                                            transform="translate(20 666.737)"
                                                            fill="{{ $items->color }}" opacity="0.5"/>
                                                        <path
                                                            d="M149.445,166.538l-4.6,4.6a.708.708,0,0,1-1,0l-2.3-2.3a.708.708,0,1,1,1-1l1.8,1.8,4.1-4.1a.708.708,0,0,1,1,1Zm0,0"
                                                            transform="translate(-116.635 506.899)" fill="#fafafa"/>
                                                    </g>
                                                </svg>
                                                <p class="descr-text">{{ $shortText }}</p></li>
                                        @endforeach

                                    </ul>
                                </div>
                            @endif
                            @isset($items->info_short_description_important_text)
                                <fieldset class="fieldset">
                                    <legend>
                                            <span class="info-icon-parent">
                                                <i class="icon-info"></i>
                                            </span>
                                    </legend>
                                    <p>
                                        {{ $items->info_short_description_important_text}}
                                    </p>
                                </fieldset>
                            @endisset
                            @if (isset($items->youtube_link))
                                <div class="video-contet">
                                    <iframe title="Youtube Video" height="187"
                                            src="{{ $items->youtube_link }}"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                </div>
                            @endif

                        </div>

                    </div>
                </div>
                @if ($items->sale_time_two_status)
                    <div class="countdown-part after-video-countdown">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="countdown-title text-center">
                                        Ակցիայի ավարտին մնաց
                                    </h3>
                                    <div class="coundownCustomContainer">
                                        <div id="day_2" class="countdownItem">
                                        </div>
                                        <div id="hour_2" class="countdownItem">
                                        </div>
                                        <div id="minutes_2" class="countdownItem">
                                        </div>
                                        <div id="seconds_2" class="countdownItem">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="product-order">
                            <button type='button' data-to='#scroll-area'>Պատվիրել զեղչով</button>
                            <div class="order-count">
                                <p>Մնաց
                                    <span>{{ $items->count }}</span>
                                    հատ</p>
                            </div>
                        </div>
                    </div>
                @endif


            </section>
            <section class="product-price-section long-descr-section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="product-title">
                                <h2 class="text-center">{{ $longDesc->info_long_description }}
                                </h2>
                            </div>
                        </div>
                        @isset($longDesc->info_long_description_photo)
                            <div class="product-content not-saled-content">
                                <div class="product-image">
                                    <img src="{{ asset('images/'.$longDesc->info_long_description_photo) }}"
                                         class="img-fluid"
                                         alt="product image">
                                </div>
                            </div>
                        @endisset
                        @if ($longDesc->info_long_description_type == 1 && count($longTexts))
                            <div class="short-desc-section long-descr-type-1">
                                <div class="container">
                                    <div class="row">
                                        <div class="list-fieldset-video">
                                            <ul class="produt-dotted-list">
                                                @foreach($longTexts as $longText)
                                                    <li>{{ $longText }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($longDesc->info_long_description_type == 2 && count($longTexts))
                            <section class="product-price-section long-descr-section w-100 p-0">
                                <div class="long-list-content w-100">
                                    <ol class="long-descr-list">
                                        @foreach ($longTexts as $longText)
                                            <li>
                                                <span class="marker">{{ $loop->iteration }}</span>
                                                {{ $longText }}
                                            </li>
                                        @endforeach
                                    </ol>
                                </div>
                            </section>
                        @elseif($longDesc->info_long_description_type == 3 && count($longTexts))
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="product-descr">
{{--                                            <h3 class="product-descr-title">Նկարագրություն</h3>--}}
                                            <ul class="product-descr-list list-unstyled">
                                                @foreach ($longTexts as $longText)
                                                    <li>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="17.002"
                                                             height="17.002" viewBox="0 0 17.002 17.002">
                                                            <g transform="translate(-20 -666.737)">
                                                                <path
                                                                    d="M8.5,0A8.5,8.5,0,1,0,17,8.5,8.51,8.51,0,0,0,8.5,0Zm0,0"
                                                                    transform="translate(20 666.737)"
                                                                    fill="{{ $items->color }}" opacity="0.5"/>
                                                                <path
                                                                    d="M149.445,166.538l-4.6,4.6a.708.708,0,0,1-1,0l-2.3-2.3a.708.708,0,1,1,1-1l1.8,1.8,4.1-4.1a.708.708,0,0,1,1,1Zm0,0"
                                                                    transform="translate(-116.635 506.899)"
                                                                    fill="#fafafa"/>
                                                            </g>
                                                        </svg>
                                                        <p class="descr-text">{{ $longText }}</p></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($longDesc->info_long_description_type == 4)
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="product-descr">
{{--                                            <h3 class="product-descr-title">Նկարագրություն</h3>--}}
                                            <ul class="product-descr-list list-unstyled">
                                                @foreach ($longTexts as $longText)
                                                    <li>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="17.002"
                                                             height="17.002" viewBox="0 0 17.002 17.002">
                                                            <g transform="translate(-20 -666.737)">
                                                                <path
                                                                    d="M8.5,0A8.5,8.5,0,1,0,17,8.5,8.51,8.51,0,0,0,8.5,0Zm0,0"
                                                                    transform="translate(20 666.737)"
                                                                    fill="{{ $items->color }}" opacity="0.5"/>
                                                                <path
                                                                    d="M149.445,166.538l-4.6,4.6a.708.708,0,0,1-1,0l-2.3-2.3a.708.708,0,1,1,1-1l1.8,1.8,4.1-4.1a.708.708,0,0,1,1,1Zm0,0"
                                                                    transform="translate(-116.635 506.899)"
                                                                    fill="#fafafa"/>
                                                            </g>
                                                        </svg>
                                                        <p class="descr-text">{{ $longText }}</p></li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
            <section class="sliders-section">
                @if (isset($sliders) && count($sliders))
                    <div class="slider-parent">
                        <div class="slider-for">
                            @foreach ($sliders as $slider)
                                <div><img class="img-fluid" src="{{ asset('images/'.$slider) }}" alt=""></div>
                            @endforeach
                        </div>
                        <div class="slider-nav thumb-slider">
                            @foreach ($sliders as $slider)
                                <div><img class="img-fluid" src="{{ asset('images/'.$slider) }}" alt=""></div>
                            @endforeach
                        </div>
                    </div>
                @endif
                @if(isset($comments) && count($comments))
                    @if ($comments[0]['comment_type'] == 1)
                        <div class="commentors-slider">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="text-center commentors-section-title">
                                            Մեկնաբանություններ
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            <div class="commentor-slider-runner">
                                @foreach ($comments as $comment)
                                    <div class="commentor-slider-item">
                                        <div class="d-flex commentor-name-image">
                                            <img src="{{ asset('images/'.$comment->user_photo) }}" alt=""
                                                 class="commentor-image">
                                            <h4 class="commentor-name">{{ $comment->user_name }}</h4>
                                        </div>
                                        <p class="commentor-text">
                                            {{ $comment->comment_text}}
                                        </p>
                                        @if($comment->comment_video)
                                        <div class="video-contet">
                                            <iframe title="Youtube Video" height="130"
                                                    src="{{ $comment->comment_video }}"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                        </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>

                        </div>

                        <div class="container">
                            <button type="button" class="leave-comment-btn" data-toggle="modal"
                                    data-target="#commentModal">
                                Թողնել մեկնաբանություն
                            </button>
                        </div>
                    @elseif ($comments[0]['comment_type'] == 2)
                        <section class="commentors-white-section">

                            <div class="commentors-white-section-content product-title">
                                <h2 class="commentors-white-title text-center">Մեկնաբանություն</h2>
                                @foreach ($comments as $comment)
                                    <div class="commentors-comment-item">
                                        <div class="commentors-info">
                                            <div class="commentors-name-image">
                                                <div class="commentors-image">
                                                    <img src="{{ asset('images/'.$comment->user_photo) }}" alt="">
                                                </div>
                                                <div class="commentors-name">
                                                    <h4 class="commentor">
                                                        {{ $comment->user_name }}
                                                    </h4>
                                                    <p class="comments-time">
                                                        {{ $comment->comment_time }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="commentors-social-link">
                                                <a href="#" aria-label="facebook">
                                                    <img src="{{asset('images/user-side-icons/facebook.svg')}}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="commentors-comment">
                                            <p>{{$comment->comment_text}}</p>
                                        </div>
                                        @if($comment->comment_video)
                                        <div class="video-contet">
                                            <iframe title="Youtube Video" height="130"
                                                    src="{{ $comment->comment_video }}"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                        </div>
                                        @endif
                                        <div class="commentors-actions">
                                            <div class="commentors-to-like">
                                                @livewire('like', ['productId' => $comment->id])
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                                <div class="container">
                                    <button type="button" class="leave-comment-btn" data-toggle="modal"
                                            data-target="#commentModal">
                                        Թողնել մեկնաբանություն
                                    </button>
                                </div>
                            </div>
                        </section>
                    @elseif ($comments[0]['comment_type'] == 3)
                        <div class="product-comments">
                            <h3 class="comments-title">Մեկնաբանություն</h3>
                            @foreach ($comments as $comment)
                                <div class="comment-container">
                                    <div class="comments-blok">
                                        <div class="single-comment">
                                            <div class="commentator d-flex align-items-center">
                                                <div class="commentor-image">
                                                    <img src="{{ asset('images/'.$comment->user_photo) }}" alt=""/>
                                                </div>
                                                <p class="commentor-name">{{ $comment->user_name }}</p>
                                            </div>
                                            <div class="comment-content">
                                                <p>
                                                    {{ $comment->comment_text }}
                                                </p>
                                            </div>
                                            @if($comment->comment_video)
                                            <div class="video-contet">
                                                <iframe title="Youtube Video" height="130"
                                                        src="{{ $comment->comment_video }}"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                        allowfullscreen></iframe>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endif
            </section>
            @if ($items->how_to_order_type == 1)
                <section class="product-price-section how-to-order-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-title">
                                    <h4 class="text-center how-to-title">Ինչպես պատվիրել</h4>
                                </div>
                            </div>
                            <div class="col-12">
                                <ul class="how-to-list">
                                    <li>
                                        <div class="list-icons"><i class="icon-paper-icon"></i></div>
                                        <p>Թողնում եք ձեր հեռախոսահամարը</p>
                                    </li>
                                    <li>
                                        <div class="list-icons"><i class="icon-phone-icon"></i></div>
                                        <p>Մեր մենեջերները կապվում են ձեզ հետ</p>
                                    </li>
                                    <li>
                                        <div class="list-icons"><i class="icon-hand-icon"></i></div>
                                        <p>Առաքումը կատարվում է 24 ժամում, վճարում եք տեղում</p>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </section>
            @elseif ($items->how_to_order_type == 2)
                <div class="product-descr how-to-order how-to-type-2">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="product-descr-title">Ինչպես պատվիրել</h3>
                            </div>
                            <div class="col-12">
                                <ul class="product-descr-list list-unstyled how-to-list">
                                    <li>
                                        <div class="list-icons"><i class="icon-paper-icon"></i></div>
                                        <p class="descr-text">Թողնում եք հայտ</p>
                                    </li>
                                    <li>
                                        <div class="list-icons"><i class="icon-phone-icon"></i></div>
                                        <p class="descr-text">Մեր մենեջերները կապվում եմ ձեզ հետ</p>
                                    </li>
                                    <li>
                                        <div class="list-icons"><i class="icon-hand-icon"></i></div>
                                        <p class="descr-text">Առաքումը կատարվում է 24 ժամում,
                                            <br>
                                            վճարում եք տեղում</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif ($items->how_to_order_type == 3)
                <div class="product-descr how-to-order how-to-order-type-3">
                    <h3 class="product-descr-title">Ինչպես պատվիրել</h3>
                    <ul class="product-descr-list list-unstyled">
                        <li>
                            <div class="list-icons"><i class="icon-paper-icon"></i></div>
                            <p class="descr-text">Թողնում եք հայտ</p>
                        </li>
                        <li>
                            <div class="list-icons"><i class="icon-phone-icon"></i></div>
                            <p class="descr-text">Մեր մենեջերները կապվում եմ ձեզ հետ</p>
                        </li>
                        <li>
                            <div class="list-icons"><i class="icon-hand-icon"></i></div>
                            <p class="descr-text">Առաքումը կատարվում է 24 ժամում,
                                <br>
                                վճարում եք տեղում</p>
                        </li>
                    </ul>
                </div>
            @endif

            <section class="product-price-section section not-saled-content">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="product-title">
                                <h2 class="text-center">{{ $items->last_name }}</h2>
                            </div>
                        </div>
                        <div class="product-content" data-sale='{{ $items->sale }}'>
                            <div class="product-image">
                                <img src="{{ asset('images/'.$items->last_photo) }}" class="img-fluid"
                                     alt="product image">
                            </div>
                            <div class="product-prices d-flex">
                                <div class="price-item retail-price col-6">
                                    <p class="price_title">
                                        Հին գին:
                                    </p>
                                    <p class="price-money">
                                        <s>{{ $items->old_price }}<span>Դ</span></s>
                                    </p>
                                </div>
                                <div class="price-item saled-price col-6">
                                    <p class="price_title">
                                        Զեղչված գին:
                                    </p>
                                    <p class="price-money">{{ $items->price }}<span>Դ</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="countdown-part">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="countdown-title text-center">
                                    Ակցիայի ավարտին մնաց
                                </h3>
                                <div class="coundownCustomContainer">
                                    <div id="day_3" class="countdownItem">
                                    </div>
                                    <div id="hour_3" class="countdownItem">
                                    </div>
                                    <div id="minutes_3" class="countdownItem">
                                    </div>
                                    <div id="seconds_3" class="countdownItem">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form id="shop-form" action="{{ route('order.create') }}" method="post">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="number-content" id="scroll-area">
                                    <h4 class="text-center">
                                        Պատվիրեք հիմա, ստացեք պատվերը 24 ժամում
                                    </h4>

                                    @csrf
                                    <input type="hidden" name="product_name" value="{{ $items->name }}">
                                    <input type="hidden" name="url" value="{{ $items->url }}">
                                    <input type="hidden" name="pageColor" value="{{ $items->color }}">
                                    <input type="hidden" name="custom" value="{{ $items->custom }}">
                                    @if ($items->phone_type == 1)
                                        <div class="call-label-input">
                                            <label for="callInput">Գրեք ձեր հեռախոսահամարը</label>
                                            <div class="inputparent">
                                                <input required name="phone" type="tel" id='callInput'>
                                            </div>
                                        </div>
                                    @elseif($items->phone_type == 2)
                                        <div class="call-label-input name-label-input">
                                            <label for="callInput">Գրեք ձեր Հեռախոսահամարը և Անունը</label>
                                            <div class="inputparent">
                                                <input required name="phone" type="tel" id='callInput'>
                                            </div>
                                            <div class="inputparent inputparent-for-name">
                                                <input required name="user_name" type="text"
                                                       class='form-control'>
                                            </div>
                                        </div>
                                    @endif


                                </div>
                            </div>
                            <div class="col-12">
                                <div class="product-order">
                                    <button type='submit' id="submit-btn">Պատվիրել զեղչով</button>
                                    <div class="order-count">
                                        <p>Մնաց
                                            <span>{{ $items->count }}</span>
                                            հատ</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </main>
        <footer class="footer">
            <a href="/legal-info" class="text-center">Իրավաբանական ինֆորմացիա</a>
        </footer>
    </div>

    <!-- Modal -->
    <div class="modal fade comment-modal" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="commentModalLabel">Թողնել մեկնաբանություն</h5>
                </div>
                <div class="modal-body">
                    <div class="modal-form-content">
                        <form action="{{route('sendCommentEmail')}}" method="post" class="modal-form"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="d-flex align-items-center">
                                    <label for="img-upload" class="upload-image">Ներբեռնել նկար</label>
                                    <input name="photo" type="file" id="img-upload" class="d-none">
                                    <input name="name" type="text" placeholder="Անուն" class="modal-input form-control">
                                </div>
                            </div>
                            <label for="text-or-video">Տեքստ կամ վիդեո </label>
                            <textarea name="text" id="text-or-video" class="form-control" rows="3"></textarea>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary modal-send-btn">Ուղարկել</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="message_content" id="message_content_first" style="display: none">
        <div class="message_and_image">
            <p>{!! $items->alert_1 !!}</p>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50" height="55"
                 viewBox="0 0 50 55">
                <defs>
                    <filter id="a" x="0" y="4" width="50" height="51" filterUnits="userSpaceOnUse">
                        <feOffset dy="3" input="SourceAlpha"/>
                        <feGaussianBlur stdDeviation="3" result="b"/>
                        <feFlood flood-opacity="0.161"/>
                        <feComposite operator="in" in2="b"/>
                        <feComposite in="SourceGraphic"/>
                    </filter>
                </defs>
                <g transform="translate(-474 -155)">
                    <g transform="translate(483.063 155)">
                        <g transform="matrix(1, 0, 0, 1, -9.06, 0)" filter="url(#a)">
                            <rect width="32" height="33" rx="3" transform="translate(9 10)" fill="#fff"/>
                        </g>
                        <path
                            d="M9.5,19A9.5,9.5,0,1,1,19,9.5,9.511,9.511,0,0,1,9.5,19Zm0-17.1a7.6,7.6,0,1,0,7.6,7.6A7.609,7.609,0,0,0,9.5,1.9Z"
                            transform="translate(5.937)" fill="#fff"/>
                        <path
                            d="M20.228,16.962a1.234,1.234,0,0,0-1.7.379,5.433,5.433,0,0,1-4.143,2.391,5.433,5.433,0,0,1-4.143-2.391,1.234,1.234,0,0,0-2.083,1.325A7.936,7.936,0,0,0,14.381,22.2a7.936,7.936,0,0,0,6.226-3.534,1.234,1.234,0,0,0-.379-1.7ZM9.012,8.618a1.543,1.543,0,1,1-1.543,1.543A1.543,1.543,0,0,1,9.012,8.618Zm9.258,1.543a1.543,1.543,0,1,0,1.543-1.543A1.543,1.543,0,0,0,18.27,10.161Z"
                            transform="translate(1.524 11.091)" fill="#f9601c"/>
                    </g>
                </g>
            </svg>
        </div>
    </div>
    <div class="message_content" id="message_content_second" style="display: none">
        <div class="message_and_image">
            <p>{!! $items->alert_2 !!}</p>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50" height="55"
                 viewBox="0 0 50 55">
                <defs>
                    <filter id="a" x="0" y="4" width="50" height="51" filterUnits="userSpaceOnUse">
                        <feOffset dy="3" input="SourceAlpha"/>
                        <feGaussianBlur stdDeviation="3" result="b"/>
                        <feFlood flood-opacity="0.161"/>
                        <feComposite operator="in" in2="b"/>
                        <feComposite in="SourceGraphic"/>
                    </filter>
                </defs>
                <g transform="translate(-474 -155)">
                    <g transform="translate(483.063 155)">
                        <g transform="matrix(1, 0, 0, 1, -9.06, 0)" filter="url(#a)">
                            <rect width="32" height="33" rx="3" transform="translate(9 10)" fill="#fff"/>
                        </g>
                        <path
                            d="M9.5,19A9.5,9.5,0,1,1,19,9.5,9.511,9.511,0,0,1,9.5,19Zm0-17.1a7.6,7.6,0,1,0,7.6,7.6A7.609,7.609,0,0,0,9.5,1.9Z"
                            transform="translate(5.937)" fill="#fff"/>
                        <path
                            d="M20.228,16.962a1.234,1.234,0,0,0-1.7.379,5.433,5.433,0,0,1-4.143,2.391,5.433,5.433,0,0,1-4.143-2.391,1.234,1.234,0,0,0-2.083,1.325A7.936,7.936,0,0,0,14.381,22.2a7.936,7.936,0,0,0,6.226-3.534,1.234,1.234,0,0,0-.379-1.7ZM9.012,8.618a1.543,1.543,0,1,1-1.543,1.543A1.543,1.543,0,0,1,9.012,8.618Zm9.258,1.543a1.543,1.543,0,1,0,1.543-1.543A1.543,1.543,0,0,0,18.27,10.161Z"
                            transform="translate(1.524 11.091)" fill="#f9601c"/>
                    </g>
                </g>
            </svg>
        </div>
    </div>
    <div class="message_content" id="message_content_thirth" style="display: none">
        <div class="message_and_image">
            <p>{!! $items->alert_3 !!}</p>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50" height="55"
                 viewBox="0 0 50 55">
                <defs>
                    <filter id="a" x="0" y="4" width="50" height="51" filterUnits="userSpaceOnUse">
                        <feOffset dy="3" input="SourceAlpha"/>
                        <feGaussianBlur stdDeviation="3" result="b"/>
                        <feFlood flood-opacity="0.161"/>
                        <feComposite operator="in" in2="b"/>
                        <feComposite in="SourceGraphic"/>
                    </filter>
                </defs>
                <g transform="translate(-474 -155)">
                    <g transform="translate(483.063 155)">
                        <g transform="matrix(1, 0, 0, 1, -9.06, 0)" filter="url(#a)">
                            <rect width="32" height="33" rx="3" transform="translate(9 10)" fill="#fff"/>
                        </g>
                        <path
                            d="M9.5,19A9.5,9.5,0,1,1,19,9.5,9.511,9.511,0,0,1,9.5,19Zm0-17.1a7.6,7.6,0,1,0,7.6,7.6A7.609,7.609,0,0,0,9.5,1.9Z"
                            transform="translate(5.937)" fill="#fff"/>
                        <path
                            d="M20.228,16.962a1.234,1.234,0,0,0-1.7.379,5.433,5.433,0,0,1-4.143,2.391,5.433,5.433,0,0,1-4.143-2.391,1.234,1.234,0,0,0-2.083,1.325A7.936,7.936,0,0,0,14.381,22.2a7.936,7.936,0,0,0,6.226-3.534,1.234,1.234,0,0,0-.379-1.7ZM9.012,8.618a1.543,1.543,0,1,1-1.543,1.543A1.543,1.543,0,0,1,9.012,8.618Zm9.258,1.543a1.543,1.543,0,1,0,1.543-1.543A1.543,1.543,0,0,0,18.27,10.161Z"
                            transform="translate(1.524 11.091)" fill="#f9601c"/>
                    </g>
                </g>
            </svg>
        </div>
    </div>
    <div class="message_content" id="message_content_fourth" style="display: none">
        <div class="message_and_image">
            <p>{!! $items->alert_4 !!}</p>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50" height="55"
                 viewBox="0 0 50 55">
                <defs>
                    <filter id="a" x="0" y="4" width="50" height="51" filterUnits="userSpaceOnUse">
                        <feOffset dy="3" input="SourceAlpha"/>
                        <feGaussianBlur stdDeviation="3" result="b"/>
                        <feFlood flood-opacity="0.161"/>
                        <feComposite operator="in" in2="b"/>
                        <feComposite in="SourceGraphic"/>
                    </filter>
                </defs>
                <g transform="translate(-474 -155)">
                    <g transform="translate(483.063 155)">
                        <g transform="matrix(1, 0, 0, 1, -9.06, 0)" filter="url(#a)">
                            <rect width="32" height="33" rx="3" transform="translate(9 10)" fill="#fff"/>
                        </g>
                        <path
                            d="M9.5,19A9.5,9.5,0,1,1,19,9.5,9.511,9.511,0,0,1,9.5,19Zm0-17.1a7.6,7.6,0,1,0,7.6,7.6A7.609,7.609,0,0,0,9.5,1.9Z"
                            transform="translate(5.937)" fill="#fff"/>
                        <path
                            d="M20.228,16.962a1.234,1.234,0,0,0-1.7.379,5.433,5.433,0,0,1-4.143,2.391,5.433,5.433,0,0,1-4.143-2.391,1.234,1.234,0,0,0-2.083,1.325A7.936,7.936,0,0,0,14.381,22.2a7.936,7.936,0,0,0,6.226-3.534,1.234,1.234,0,0,0-.379-1.7ZM9.012,8.618a1.543,1.543,0,1,1-1.543,1.543A1.543,1.543,0,0,1,9.012,8.618Zm9.258,1.543a1.543,1.543,0,1,0,1.543-1.543A1.543,1.543,0,0,0,18.27,10.161Z"
                            transform="translate(1.524 11.091)" fill="#f9601c"/>
                    </g>
                </g>
            </svg>
        </div>
    </div>
    <input type="hidden" id="serverDate" data-created="{{ $items->created_at->timestamp }}" data-currentTime="{{ now()->timestamp }}">
    <script>
    var currentTimeServer = serverDate.getAttribute('data-currentTime') * 1000;
    console.log(currentTimeServer)


    function getDiff(){

        const serverDate =  document.getElementById('serverDate');

        const currentDay = currentTimeServer.getDate()

        const productCreateTime = serverDate.getAttribute('data-created') * 1000;

        const diff = currentTimeServer - productCreateTime;


        const hours = 24 - Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)) ;
        const minutes = 60 - Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = 60 - Math.floor((diff % (1000 * 60)) / 1000);

        return {
            hours,
            minutes,
            seconds,
        }
    }

        let item = @json($items);

        const dataTime = item.created_at.split("-");
        var year = dataTime[0];
        var time =  dataTime[2];
        var month =  dataTime[1];

        var minute = time.split(":")[1]
        var second = parseFloat(time.split(":")[2]);
        var hour = time.split(":")[0].split("T")[1];
        var day = time.split(":")[0].split("T")[0];
        var countDownDate;
        var timeData;
        var timeleft;
        var days;
        var hours;
        var nows;
        var seconds;

        countDownDate = new Date(item.created_at);

        setInterval(() => {
            currentTimeServer  = new Date( +currentTimeServer + 1000)
            const days = '00';

            const {minutes,hours,seconds} = getDiff()
            document.getElementById("day_1").innerHTML = `<div class="coundownItemCustomNumber">${days}</div><p class="countdownItemCustomText">օր</p>`;
            document.getElementById("hour_1").innerHTML = `<div class="coundownItemCustomNumber">${hours}</div><p class="countdownItemCustomText">ժամ</p>`;
            document.getElementById("minutes_1").innerHTML = `<div class="coundownItemCustomNumber">${minutes}</div><p class="countdownItemCustomText">րոպե</p>`;
            document.getElementById("seconds_1").innerHTML = `<div class="coundownItemCustomNumber">${seconds}</div><p class="countdownItemCustomText">վրկ․</p>`;
            document.getElementById("day_2").innerHTML = `<div class="coundownItemCustomNumber">${days}</div><p class="countdownItemCustomText">օր</p>`;
            document.getElementById("hour_2").innerHTML = `<div class="coundownItemCustomNumber">${hours}</div><p class="countdownItemCustomText">ժամ</p>`;
            document.getElementById("minutes_2").innerHTML = `<div class="coundownItemCustomNumber">${minutes}</div><p class="countdownItemCustomText">րոպե</p>`;
            document.getElementById("seconds_2").innerHTML = `<div class="coundownItemCustomNumber">${seconds}</div><p class="countdownItemCustomText">վրկ․</p>`;
            document.getElementById("day_3").innerHTML = `<div class="coundownItemCustomNumber">${days}</div><p class="countdownItemCustomText">օր</p>`;
            document.getElementById("hour_3").innerHTML = `<div class="coundownItemCustomNumber">${hours}</div><p class="countdownItemCustomText">ժամ</p>`;
            document.getElementById("minutes_3").innerHTML = `<div class="coundownItemCustomNumber">${minutes}</div><p class="countdownItemCustomText">րոպե</p>`;
            document.getElementById("seconds_3").innerHTML = `<div class="coundownItemCustomNumber">${seconds}</div><p class="countdownItemCustomText">վրկ․</p>`;
        }, 1000)

        let localStorageTime = sessionStorage.getItem('currentTime1');
        let start = undefined;

        if (localStorageTime) {
            start = sessionStorage.getItem('currentTime1')
        } else {
            start = +(new Date());
            sessionStorage.setItem('currentTime1', start)
        }

        const now = +(new Date());
        let pastTime = now - start;
        let goal = 7000;
        let goal2 = 120000;
        let goal3 = 420000;
        let goal4 = 900000;

        if (pastTime <= goal && item.alert_1 !== null) {
            setTimeout(() => {
                $("#message_content_first").css('display', 'block');
                setTimeout(() => {
                    $("#message_content_first").css('display', 'none');
                }, 3000);
            }, goal - pastTime);
        }

        if (pastTime <= goal2 && item.alert_2 !== null) {
            setTimeout(() => {
                $("#message_content_second").css('display', 'block');
                setTimeout(() => {
                    $("#message_content_second").css('display', 'none');
                }, 3000);
            }, goal2 - pastTime);
        }

        if (pastTime <= goal3 && item.alert_3 !== null) {
            setTimeout(() => {
                $("#message_content_thirth").css('display', 'block');
                setTimeout(() => {
                    $("#message_content_thirth").css('display', 'none');
                }, 3000);
            }, goal3 - pastTime);
        }

        if (pastTime <= goal4 && item.alert_4 !== null) {
            setTimeout(() => {
                $("#message_content_fourth").css('display', 'block');
                setTimeout(() => {
                    $("#message_content_fourth").css('display', 'none');
                }, 3000);
            }, goal4 - pastTime);
        }
    </script>
@endsection
