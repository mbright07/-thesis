<main id="main">
    <div class="container">

        <!--On Sale-->
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box">{{ __('employee/home.top_view') }}</h3>
            <div class="wrap-product-tab tab-style-1">
                <div class="tab-contents">
                    <div class="tab-content-item active" id="digital_1a">
                        <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5"
                            data-loop="false" data-nav="true" data-dots="false"
                            data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                            @foreach ($top_views as $top_view)
                                <div class="product product-style-2 equal-elem">
                                    <div class="product-thumnail" style="height: 50%">
                                        <a href="{{ route('employer.candidate.details', ['user_id' => $top_view->id]) }}"
                                            title="{{ $top_view->name }}">
                                            @if ($top_view->profile && $top_view->profile->image)
                                                <figure><img
                                                        src="{{ asset('/assets/images/profile') }}/{{ $top_view->profile->image }}"
                                                        width="800" height="800" alt="{{ $top_view->name }}">
                                                </figure>
                                            @else
                                                <figure><img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
                                                        width="800" height="800" alt="{{ $top_view->name }}">
                                                </figure>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{ route('employer.candidate.details', ['user_id' => $top_view->id]) }}"
                                            class="product-name"><span span
                                                style="height: 50px;">{{ $top_view->name }}</span></a>
                                        <div class="wrap-price">
                                            <ins>
                                                <p class="product-price">
                                                    <i class="fa fa-map-marker" aria-hidden="true"
                                                        style="color: red;"></i>
                                                    @if ($top_view->workPreference)
                                                        @foreach ($top_view->workPreference as $item)
                                                            {{ $item->expected_location_name }}
                                                            <br>
                                                        @endforeach
                                                    @endif
                                                    <br>
                                                    {{-- <i class="fa fa-dollar" aria-hidden="true" style="color: red;"></i>
                                        @if ($top_view->workPreference)
                                            @foreach ($top_view->workPreference as $item)
                                                {{ $item->expected_salary }}
                                            @endforeach
                                        @endif
                                        <br> --}}
                                                </p>
                                            </ins>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Latest Products-->
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box">{{ __('employee/home.lastest_candidates') }}</h3>
            <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img src="{{ asset('assets/images/digital-electronic-banner.jpg') }}" width="1170"
                            height="240" alt=""></figure>
                </a>
            </div>
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-contents">
                        <div class="tab-content-item active" id="digital_1a">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                @foreach ($lcandidates as $lcandidate)
                                    <div class="product product-style-2 equal-elem ">
                                        <div class="product-thumnail" style="height: 45%;">
                                            <a href="{{ route('employer.candidate.details', ['user_id' => $lcandidate->id]) }}"
                                                title="{{ $lcandidate->name }}">
                                                @if ($lcandidate->profile && $lcandidate->profile->image)
                                                    <figure><img
                                                            src="{{ asset('/assets/images/profile') }}/{{ $lcandidate->profile->image }}"
                                                            width="800" height="800"
                                                            alt="{{ $lcandidate->name }}"></figure>
                                                @else
                                                    <figure><img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
                                                            width="800" height="800"
                                                            alt="{{ $lcandidate->name }}"></figure>
                                                @endif
                                            </a>
                                        </div>
                                        <div class="product-info" style="height: 50%;">
                                            <a href="{{ route('employer.candidate.details', ['user_id' => $lcandidate->id]) }}"
                                                class="product-name"><span
                                                    style="height: 50px;">{{ $lcandidate->name }}</span></a>
                                            <div class="wrap-price">
                                                <ins>
                                                    <p class="product-price">
                                                        <i class="fa fa-map-marker" aria-hidden="true"
                                                            style="color: red;"></i>
                                                        @if ($lcandidate->workPreference)
                                                            @foreach ($lcandidate->workPreference as $item)
                                                                {{ $item->expected_location_name }}
                                                            @endforeach
                                                        @endif
                                                    </p>
                                                </ins>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Latest Products-->
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box">{{ __('home.career_advice') }}</h3>
            <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img src="{{ asset('assets/images/digital-electronic-banner.jpg') }}" width="1170"
                            height="240" alt=""></figure>
                </a>
            </div>
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-contents">
                        <div class="tab-content-item active" id="digital_1a">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                                @foreach ($lposts as $lpost)
                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="{{ route('post.details', ['slug' => $lpost->slug]) }}"
                                                title="{{ $lpost->title }}">
                                                <figure><img
                                                        src="{{ asset('assets/images/posts') }}/{{ $lpost->image }}"
                                                        width="800" height="800" alt="{{ $lpost->title }}">
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="product-info" style="height: 200px;">
                                            <a href="{{ route('post.details', ['slug' => $lpost->slug]) }}"
                                                class="product-name"><span
                                                    style="height: 50%;">{{ $lpost->title }}</span></a>
                                            <div class="wrap-price">
                                                <p class="product-price" style="color: gray; margin-bottom: 10px;">
                                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                    {{ $lpost->created_at->format('Y-m-d') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
