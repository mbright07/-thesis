<div class="wrap-icon-section wishlist">
    <a href="{{ route('job.wishlist') }}" class="link-direction">
        <i class="fa fa-heart" aria-hidden="true"></i>
        <div class="left-info">
            @if(Cart::instance('wishlist')->count() > 0)
                <span class="index">{{Cart::instance('wishlist')->count()  }}</span>
            @endif
            <span class="title">{{ __('wishlist.wishlist') }}</span>
        </div>
    </a>
</div>
