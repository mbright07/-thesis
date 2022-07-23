<main id="main">
    <div class="container">
        <div class="wrap-main-slide">
            <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true"
                data-dots="false">
                @foreach ($sliders as $slider)
                    <div class="item-slide">
                        <img src="{{ asset('assets/images/sliders') }}/{{ $slider->image }}" alt=""
                            class="img-slide" >
                        <div class="slide-info slide-1">
                            <h2 class="f-title"><b>{{ $slider->title }}</b></h2>
                            <span class="subtitle" style="color: rgb(252, 96, 96)">{{ $slider->subtitle }}</span>
                            <p class="sale-info" style="color: black">{{ __('home.salary') }}<span
                                    class="price">{{ $slider->salary }}</span></p>
                            <br />
                            <a href="{{ $slider->link }}" class="btn-link">{{ __('home.apply_now') }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- <div class="wrap-banner style-twin-default">
            <div class="banner-item">
                <a href="#" class="link-banner banner-effect-1">
                    <figure><img src="{{ asset('assets/images/home-1-banner-1.jpg') }}" alt="" width="580"
                            height="190"></figure>
                </a>
            </div>
            <div class="banner-item">
                <a href="#" class="link-banner banner-effect-1">
                    <figure><img src="{{ asset('assets/images/home-1-banner-2.jpg') }}" alt="" width="580"
                            height="190"></figure>
                </a>
            </div>
        </div> --}}

        <!--On Sale-->
        <div class="wrap-show-advance-info-box style-1 has-countdown">
            <h3 class="title-box">{{ __('home.top_view') }}</h3>
            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5"
                data-loop="false" data-nav="true" data-dots="false"
                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                @foreach ($top_views as $top_view)
                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail" style="height: 50%">
                            <a href="{{ route('job.details', ['slug' => $top_view->slug]) }}"
                                title="{{ $top_view->name }}">
                                <figure><img src="{{ asset('assets/images/products') }}/{{ $top_view->image }}"
                                        width="800" height="800" alt="{{ $top_view->name }}"></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item bestseller-label">Hot</span>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="{{ route('job.details', ['slug' => $top_view->slug]) }}"
                                class="product-name"><span style="height: 50%;">{{ $top_view->name }}</span></a>
                            <div class="wrap-price"><ins>
                                    <p class="product-price">{{ __('home.salary') }}
                                        ${{ $top_view->regular_salary }}</p>
                                </ins></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


        <!--Product Categories-->
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box">{{ __('home.featured_jobs') }}</h3>
            <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img src="{{ asset('assets/images/fashion-accesories-banner.jpg') }}" width="1170"
                            height="240" alt=""></figure>
                </a>
            </div>
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-control">
                        @foreach ($categories as $key => $category)
                            <a href="#category_{{ $category->id }}"
                                class="tab-control-item {{ $key == 0 ? 'active' : '' }}">{{ $category->name }}</a>
                        @endforeach
                    </div>
                    <div class="tab-contents">
                        @foreach ($categories as $key => $category)
                            <div class="tab-content-item {{ $key == 0 ? 'active' : '' }}"
                                id="category_{{ $category->id }}">
                                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                    data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                    data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                    @php
                                        $c_jobs = DB::table('jobs')
                                            ->where('user_id', $category->id)
                                            ->get()
                                            ->take($no_of_jobs);
                                    @endphp
                                    @foreach ($c_jobs as $c_job)
                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail" style="height: 60%">
                                                <a href="{{ route('job.details', ['slug' => $c_job->slug]) }}"
                                                    title="{{ $c_job->name }}">
                                                    <figure><img
                                                            src="{{ asset('assets/images/products/') }}/{{ $c_job->image }}"
                                                            width="800" height="800" alt="{{ $c_job->name }}">
                                                    </figure>
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <a href="{{ route('job.details', ['slug' => $c_job->slug]) }}"
                                                    class="product-name"><span
                                                        style="height: 50%;">{{ $c_job->name }}</span></a>
                                                <div class="wrap-price"><ins>
                                                        <p class="product-price">
                                                            {{ __('home.salary') }}${{ $c_job->regular_salary }}
                                                        </p>
                                                    </ins></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!--Latest Products-->
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box">{{ __('home.lastest_jobs') }}</h3>
            {{-- <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img src="{{ asset('assets/images/digital-electronic-banner.jpg') }}" width="1170"
                            height="240" alt=""></figure>
                </a>
            </div> --}}
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-contents">
                        <div class="tab-content-item active" id="digital_1a">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                @foreach ($ljobs as $ljob)
                                    <div class="product product-style-2 equal-elem ">
                                        <div class="product-thumnail" style="height: 50%">
                                            <a href="{{ route('job.details', ['slug' => $ljob->slug]) }}"
                                                title="{{ $ljob->name }}">
                                                <figure><img
                                                        src="{{ asset('assets/images/products') }}/{{ $ljob->image }}"
                                                        width="800" height="800" alt="{{ $ljob->name }}">
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="product-info" style="height: 200px">
                                            <a href="{{ route('job.details', ['slug' => $ljob->slug]) }}"
                                                class="product-name"><span
                                                    style="height: 60%;">{{ $ljob->name }}</span></a>
                                            <div class="wrap-price">
                                                <ins>
                                                    <p class="product-price">{{ __('home.salary') }}${{ $ljob->regular_salary }}</p>
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
            {{-- <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img src="{{ asset('assets/images/digital-electronic-banner.jpg') }}" width="1170"
                            height="240" alt=""></figure>
                </a>
            </div> --}}
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
                                            <div class="wrap-price" style="color: gray">
                                                <p class="product-price">
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
