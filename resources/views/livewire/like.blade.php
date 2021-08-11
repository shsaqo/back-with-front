<div class="d-flex justify-content-between">
    <input type="hidden" value="{{ $productId }}" name="productId">
    @if(!$liked)
    <button class="like_photo"  style="color: #1877F2"  wire:click="increment" type="button">
        <img src="{{asset('images/user-side-icons/liked-blue.svg')}}">Հավանած
    </button>
    @else
    <button class="like_photo"  wire:click="increment" type="button">
        <img src="{{asset('images/user-side-icons/thumb.svg')}}"> Հավանել
    </button>
    @endif

    <div class="commentors-liked-count">
        <img src="{{asset('images/user-side-icons/liked.svg')}}" alt="">
        <span>{{ $likeCount }}</span>
    </div>
</div>
