<div class="container">
    <div class="wrap-main-slide">
        <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true"
            data-dots="false">
            @foreach ($sliders as $slider)
                <div class="item-slide">
                    <img src="{{ asset('assets/images/sliders') }}/{{ $slider->image }}" alt=""
                        class="img-slide">
                    <div class="slide-info slide-1">
                        <h2 class="f-title"><b>{{ $slider->title }}</b></h2>
                        <span class="subtitle">{{ $slider->subtitle }}</span>
                        <p class="sale-info">{{ __('home.salary') }}<span
                                class="price">{{ $slider->salary }}</span></p>
                        <br />
                        <a href="{{ $slider->link }}" class="btn-link">{{ __('home.apply_now') }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="wrap-banner style-twin-default">
        <div class="banner-item">
            <a href="#" class="link-banner banner-effect-1">
                <figure><img src="{{ asset('assets/images/home-1-banner-1.jpg') }}" alt="" width="580" height="190">
                </figure>
            </a>
        </div>
        <div class="banner-item">
            <a href="#" class="link-banner banner-effect-1">
                <figure><img src="{{ asset('assets/images/home-1-banner-2.jpg') }}" alt="" width="580" height="190">
                </figure>
            </a>
        </div>
    </div>

    <!--On Sale-->
    <div class="wrap-show-advance-info-box style-1 has-countdown">
        <h3 class="title-box">Top View</h3>
        <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5"
            data-loop="false" data-nav="true" data-dots="false"
            data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
            @foreach ($top_views_posts as $top_view_post)
                <div class="product product-style-2 equal-elem">
                    <div class="product-thumnail">
                        <a href="{{ route('post.details', ['slug' => $top_view_post->slug]) }}"
                            title="{{ $top_view_post->title }}">
                            <figure><img src="{{ asset('assets/images/posts') }}/{{ $top_view_post->image }}"
                                    width="800" height="800" alt="{{ $top_view_post->title }}"></figure>
                        </a>
                        <div class="group-flash">
                            <span class="flash-item bestseller-label">Hot</span>
                        </div>
                    </div>
                    <div class="product-info" style="height: 200px;">
                        <a href="{{ route('post.details', ['slug' => $top_view_post->slug]) }}"
                            class="product-name"><span>{{ $top_view_post->title }}</span></a>
                        <div class="wrap-price" style="margin-left: -30px;">
                            <p class="product-price" style="color: gray; margin-bottom: 10px;">
                                Post at:
                                {{ $top_view_post->created_at->format('Y-m-d') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="wrap-show-advance-info-box style-1">
        <h3 class="title-box">Lastest Post</h3>
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
                                                    width="800" height="800" alt="{{ $lpost->title }}"></figure>
                                        </a>
                                    </div>
                                    <div class="product-info" style="height: 200px;">
                                        <a href="{{ route('post.details', ['slug' => $lpost->slug]) }}"
                                            class="product-name"><span>{{ $lpost->title }}</span></a>
                                        <div class="wrap-price" style="margin-left: -28px;">
                                            <p class="product-price">
                                                Post at {{ $lpost->created_at->format('Y-m-d') }}
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

    <!--Latest Products-->
    <div class="wrap-show-advance-info-box style-1">
        <h3 class="title-box">Other Post</h3>
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
                            @foreach ($popular_posts as $popular_post)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{ route('post.details', ['slug' => $popular_post->slug]) }}"
                                            title="{{ $popular_post->title }}">
                                            <figure><img
                                                    src="{{ asset('assets/images/posts') }}/{{ $popular_post->image }}"
                                                    width="800" height="800" alt="{{ $popular_post->title }}">
                                            </figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label">new</span>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{ route('post.details', ['slug' => $popular_post->slug]) }}"
                                            class="product-name"><span>{{ $popular_post->title }}</span></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box">All Posts</h3>
        </div>
        <br>
        <br>
        <div class="all-posts">
            @foreach ($posts as $post)
                <div class="post-item">
                    <div class="post-img-left">
                        <img src="{{ asset('assets/images/posts') }}/{{ $post->image }}"
                            alt="{{ $post->title }}">
                    </div>
                    <div class="post-main-info-right">
                        <h4>{{ $post->title }}</h4>
                        <div class="post-meta">
                            <span>
                                <i class="fa fa-calendar"></i> {{ $post->created_at }}
                            </span>
                        </div>
                        <p class="description">{!! $post->short_description !!}</p>
                        <a href="{{ route('post.details', ['slug' => $post->slug]) }}" class="main-btn">Read
                            More</a>
                    </div>
                </div>
            @endforeach
            <div class="wrap-pagination-info">
                {{ $posts->links() }}
            </div>
        </div>
    </div>

</div>
