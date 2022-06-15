<div>
    <div class="container">
        <br>
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                <article>
                    <header>
                        <h1>{{ $post->title }}</h1>
                        <span>{{ $post->created_at }}</span>
                    </header>
                    <hr>
                    <div class="main">
                        <figure><img src="{{ asset('assets/images/posts/') }}/{{ $post->image }}"
                                alt="{{ $post->title }}"></figure>
                        <br>
                        {!! $post->description !!}
                    </div>
                </article>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar" style="margin-top: 50px;">
                <div class="widget mercado-widget widget-product">
                    <h2 class="widget-title">Popular Post</h2>
                    <div class="widget-content">
                        <ul class="products">
                            @foreach ($popular_posts as $popular_post)
                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="{{ route('post.details', ['slug' => $popular_post->slug]) }}"
                                                title="{{ $popular_post->title }}">
                                                <figure><img
                                                        src="{{ asset('assets/images/posts/') }}/{{ $popular_post->image }}"
                                                        alt="{{ $popular_post->title }}"></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{ route('post.details', ['slug' => $popular_post->slug]) }}"
                                                title="{{ $popular_post->title }}"
                                                class="product-name"><span>{{ $popular_post->title }}</span></a>
                                            <div class="wrap-price" style="margin-left: -40px; width: 200px;"><span
                                                    class="product-price">Post at:
                                                    {{ $popular_post->created_at->format('Y-m-d') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
            <!--end sitebar-->

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
                                                            width="800" height="800" alt="{{ $lpost->title }}">
                                                    </figure>
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

        </div>
    </div>
</div>
