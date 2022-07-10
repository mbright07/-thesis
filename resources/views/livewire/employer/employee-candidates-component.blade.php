<main id="main" class="main-site left-sidebar">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('employer.home') }}" class="link">{{ __('search.home') }}</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12 main-content-area">
                <div class="banner-shop">
                    <a href="#" class="banner-link">
                        <figure><img src="{{ asset('assets/images/shop-banner.jpg') }}" alt=""></figure>
                    </a>
                </div>
                <div class="row" style="margin-top:15px ">
                    @php
                        $witems = Cart::instance('wishlist')
                            ->content()
                            ->pluck('id');
                    @endphp
                    @foreach ($lcandidates as $lcandidate)
                        <div class="col-md-6" style="width: 49%; margin-left: 10px">
                            <div class="job-offers">
                                <div class="row pt-5">
                                    <div class="offert-wrapper">
                                        <div class="offert">
                                            <div>
                                                <div class="offert-description">
                                                    <div class="company-logo">
                                                        <a href="{{ route('employer.candidate.details', ['user_id' => $lcandidate->id]) }}"
                                                            title="{{ $lcandidate->name }}">
                                                            @if ($lcandidate->profile && $lcandidate->profile->image)
                                                                <figure><img
                                                                        src="{{ asset('/assets/images/profile') }}/{{ $lcandidate->profile->image }}"
                                                                        alt="{{ $lcandidate->name }}">
                                                                </figure>
                                                            @else
                                                                <figure><img
                                                                        src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
                                                                        alt="{{ $lcandidate->name }}">
                                                                </figure>
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="description">
                                                        <p class="company-name">
                                                            <a href="{{ route('employer.candidate.details', ['user_id' => $lcandidate->id]) }}"
                                                                class="product-name"><span>{{ $lcandidate->name }}</span></a>
                                                        </p>
                                                        <p class="description">{{ $lcandidate->profile ? $lcandidate->profile->intro : '' }}</p>
                                                    </div>
                                                </div>
                                                <div class="offert-meta">
                                                    <p class="location">
                                                        <i class="fa fa-map-marker" aria-hidden="true"
                                                            style="color: #ff2832"></i>
                                                        @if ($lcandidate->workPreference)
                                                            @foreach ($lcandidate->workPreference as $item)
                                                               <strong>{{ $item->expected_location_name }}</strong> 
                                                            @endforeach
                                                        @endif
                                                    </p>
                                                    <a href="#"
                                                        wire:click.prevent="company({{ $lcandidate->id }},'{{ $lcandidate->name }}',{{ json_encode($lcandidate->workPreference) }})"
                                                        class="main-btn">{{ __('search.bookmark') }}</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- <ul class="product-list grid-products equal-container">
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
                                            @if ($lcandidate->profile && $lcandidate->profile->image)
                                                <figure><img
                                                        src="{{ asset('/assets/images/profile') }}/{{ $lcandidate->profile->image }}"
                                                        width="800" height="800" alt="{{ $lcandidate->name }}">
                                                </figure>
                                            @else
                                                <figure><img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
                                                        width="800" height="800" alt="{{ $lcandidate->name }}">
                                                </figure>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{ route('employer.candidate.details', ['user_id' => $lcandidate->id]) }}"
                                            class="product-name"><span>{{ $lcandidate->name }}</span></a>
                                        <div class="wrap-price"><ins>
                                                <p class="product-price">{{ __('employee/home.expected_location') }}:
                                                    <br />
                                                    @if ($lcandidate->workPreference)
                                                        @foreach ($lcandidate->workPreference as $item)
                                                            {{ $item->expected_location_name }}
                                                            <br />
                                                        @endforeach
                                                    @endif
                                                </p>
                                            </ins>
                                        </div>
                                    </div>
                                    <div class="addcart">
                                        <br />
                                        <div class="bookmark">
                                            <a href="#" class="btn add-to-cart"
                                                wire:click.prevent="company({{ $lcandidate->id }},'{{ $lcandidate->name }}',{{ json_encode($lcandidate->workPreference) }})">{{ __('search.bookmark') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul> --}}
                </div>
                <div class="wrap-pagination-info">
                    {{ $lcandidates->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</main>
