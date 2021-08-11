@php $codes = \App\Models\CodeScript::all() @endphp
@extends('layouts.trend', ['codes' => $codes, 'trend' => 'Thank You'])
@section('content')
    <div class="mobile-container px-20 thank-you-container">
        @if (Session::get('pageColor'))
            <span id="spanBlue" style="color:{{ Session::get('pageColor') }}"></span>
            <span id="spanRed" style="color:{{ Session::get('pageColor') }}"></span>
            <span id="spanGradient" style="background: {{ Session::get('pageColor') }}"></span>
        @endif
        @if($thankYou = Session::get('thankYou')) @endif

        <section class="thank-you-text-section">
            <div class="row">
                <div class="col-12">
                    <h1 class="thank-u-title text-center">Շնորհակալություն</h1>
                    <div class="thank-u-descr text-center">Մեր օպերատորը կզանգահարի Ձեզ 10 րոպեի ընթացքում</div>
                </div>
            </div>
        </section>
        <section class="maybe-interesed-section">
            <div class="container">
                <div class="row">
                    @if(isset($thankYou) && count($thankYou))
                    <div class="col-12">
                        <h2 class="maybe-interested-title text-center">Ձեզ տրամադրվեց հավելյալ զեղչ այս ապրանքների համար</h2>
                    </div>
                    @endif
                    <div class="col-12">
                        @if(isset($thankYou) && count($thankYou))
                            @foreach($thankYou as $thank)
                                <div class="product-item">
                                    <form id="shop-form" action="{{ route('order.create') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12 custom-col-padding">
                                                <div class="product-image" data-sale="{{ $thank->sale }}">
                                                    <img src="{{ asset('images/'.$thank->photo) }}" alt=""
                                                         class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-12 custom-col-padding">
                                                <div class="product-list">
                                                    <h3 class="product-name">{{ $thank->name }}</h3>
                                                    <input name="product_name" type="hidden" value="{{ $thank->name }}">
                                                    <input name="url" type="hidden" value="Thank you Page">
                                                    <input name="thankYouUrl" type="hidden" value="{{ Session::get('thankYouUrl') }}">
                                                    <input name="user_name" type="hidden" value="{{ Session::get('user_name') ?? 'no name' }}">
                                                    <input name="phone" type="hidden" value="{{ Session::get('phone') }}">
                                                    <input name="thankYouId" type="hidden" value="{{ $thank->id }}">
                                                    <input name="pageColor" type="hidden" value="{{ Session::get('pageColor') }}">
                                                    <input name="custom" type="hidden" value="{{ Session::get('custom') }} - {{ $thank->trello }}">
                                                    <ul class="list-unstyled">
                                                        @if(isset($thank->description) && count($thank->description))
                                                            @foreach($thank->description as $desc)
                                                                <li>{{ $desc }}</li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="product-price">
                                                <div class="row align-items-center justify-content-center">
                                                    <div class="price-cols">
                                                        <p class="text-right">{{ $thank->price }}Դ</p>
                                                    </div>
                                                    <div class="price-cols">
                                                        <s>{{ $thank->old_price }}Դ</s>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 p-0">
                                            <div class="thank-u-order-btn">

                                                <button id="submit-btn" @if(Session::get('thankYouId') && count(Session::get('thankYouId')) && in_array($thank->id, Session::get('thankYouId'))) class="ordered-btn" @endif type="submit">
                                                    @if(Session::get('thankYouId') && count(Session::get('thankYouId')) && in_array($thank->id, Session::get('thankYouId'))) Պատվիրված @else Պատվիրել զեղչով @endif
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

