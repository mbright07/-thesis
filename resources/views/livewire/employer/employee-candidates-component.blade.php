<main id="main" class="main-site left-sidebar">
    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">{{ __('search.home') }}</a></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12 main-content-area">

                <div class="banner-shop">
                    <a href="#" class="banner-link">
                        <figure><img src="assets/images/shop-banner.jpg" alt=""></figure>
                    </a>
                </div>

                <!--end wrap shop control-->

                <div class="row">

                    <ul class="product-list grid-products equal-container">
                        @php
                            $witems = Cart::instance('wishlist')
                                ->content()
                                ->pluck('id');
                        @endphp
                        @foreach ($lcandidates as $lcandidate)
                            <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{ route('employer.candidate.details', ['user_id' => $lcandidate->id]) }}"
                                           title="{{ $lcandidate->name }}">
                                            @if($lcandidate->profile && $lcandidate->profile->image)
                                                <figure><img src="{{ asset('/assets/images/profile') }}/{{ $lcandidate->profile->image }}"
                                                             width="800" height="800" alt="{{ $lcandidate->name }}"></figure>
                                            @else
                                                <figure><img src="{{ asset('/assets/images/profile/default-avatar-profile-image.jpg') }}"
                                                             width="800" height="800" alt="{{ $lcandidate->name }}"></figure>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href=""
                                           class="product-name"><span>{{ $lcandidate->name }}</span></a>
                                        <div class="wrap-price"><ins>
                                                <p class="product-price">{{ __('employee/home.expected_location') }}:
                                                    <br/>
                                                    @if($lcandidate->expectedLocationName)
                                                        @foreach($lcandidate->expectedLocationName as $item)
                                                            {{ $item }}
                                                            <br/>
                                                        @endforeach
                                                    @endif
                                                </p>
                                            </ins>
                                        </div>
                                    </div>
                                    <div class="addcart">
                                        <br/>
                                        <div class="bookmark">
                                            <a href="#" class="btn add-to-cart"
                                               wire:click.prevent="company({{ $lcandidate->id }},'{{ $lcandidate->name }}')">{{ __('search.bookmark') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                </div>

                <div class="wrap-pagination-info">
                    {{ $lcandidates->links('pagination::bootstrap-4') }}
                </div>
            </div>
            <!--end main products area-->



        </div>
        <!--end row-->

    </div>
    <!--end container-->

</main>

