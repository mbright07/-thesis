<main id="main" class="main-site left-sidebar">
    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">{{ __('search.home') }}</a></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

                <div class="banner-shop">
                    <a href="#" class="banner-link">
                        <figure><img src="assets/images/shop-banner.jpg" alt=""></figure>
                    </a>
                </div>

                <div class="wrap-shop-control" style="height: 40px;">

                    <div class="wrap-right">
                        <div class="sort-item orderby ">
                            <select name="category" class="use-chosen" wire:model="category">
                                <option value="default" selected="selected">{{ __('search.all_location') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="sort-item orderby ">
                            <select name="orderby" class="use-chosen" wire:model="sorting">
                                <option value="default" selected="selected">{{ __('search.default') }}</option>
                                <option value="created_at">{{ __('search.sort_newness') }}</option>
                                <option value="regular_salary">{{ __('search.low_to_high') }}</option>
                                <option value="regular_salary-desc">{{ __('search.high_to_low') }}</option>
                            </select>
                        </div>

                        <div class="sort-item product-per-page">
                            <select name="post-per-page" class="use-chosen" wire:model="pagesize">
                                <option value="12" selected="selected">{{ __('search.12') }}</option>
                                <option value="16">{{ __('search.16') }}</option>
                                <option value="18">{{ __('search.18') }}</option>
                                <option value="21">{{ __('search.21') }}</option>
                                <option value="24">{{ __('search.24') }}</option>
                                <option value="30">{{ __('search.30') }}e</option>
                                <option value="32">{{ __('search.32') }}</option>
                            </select>
                        </div>

                    </div>

                </div>
                <!--end wrap shop control-->

                <div class="row">

                    <ul class="product-list grid-products equal-container">
                        @php
                            $witems = Cart::instance('wishlist')
                                ->content()
                                ->pluck('id');
                        @endphp
                        @foreach ($jobs as $job)
                            <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{ route('job.details', ['slug' => $job->slug]) }}"
                                            title={{ $job->name }}>
                                            <figure><img
                                                    src="{{ asset('assets/images/products') }}/{{ $job->image }}"
                                                    width="800" height="800" alt="{{ $job->name }}"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item bestseller-label">Hot</span>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{ route('job.details', ['slug' => $job->slug]) }}"
                                            class="product-name"><span>{{ $job->name }}</span></a>
                                        <div class="wrap-price"><ins>
                                                <p class="product-price">
                                                    {{ __('search.salary') }}{{ $job->regular_salary }}</p>
                                            </ins></div>
                                        <div class="product-wish">
                                            @if ($witems->contains($job->id))
                                                <a href="#"
                                                    wire:click.prvent="removeFromWishlist({{ $job->id }})"><i
                                                        class="fa fa-heart fill-heart"></i></a>
                                            @else
                                                <a href="#"
                                                    wire:click.prevent="addToWishList({{ $job->id }},'{{ $job->name }}',{{ $job->regular_salary }})"><i
                                                        class="fa fa-heart"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="addcart">
                                        <div class="bookmark">
                                            <a href="#" class="btn add-to-cart"
                                                wire:click.prevent="company({{ $job->id }},'{{ $job->name }}',{{ $job->regular_salary }})">{{ __('search.bookmark') }}</a>
                                        </div>
                                        <div class="choice">
                                            <a href="#" class="btn add-to-cart">{{ __('search.apply_now') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                </div>

                <div class="wrap-pagination-info">
                    {{ $jobs->links('pagination::bootstrap-4') }}
                </div>
            </div>
            <!--end main products area-->

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget mercado-widget categories-widget">
                    <h2 class="widget-title">{{ __('search.all_location') }}</h2>
                    <div class="widget-content">
                        <ul class="list-category">
                            @foreach ($categories as $category)
                                <li
                                    class="category-item {{ count($category->subCategory) > 0 ? 'has-child-cate' : '' }}">
                                    <a href="{{ route('job.category', ['category_slug' => $category->slug]) }}"
                                        class="cate-link">{{ $category->name }}</a>
                                    @if (count($category->subCategory) > 0)
                                        <span class="toggle-control">+</span>
                                        <ul class="sub-cate">
                                            @foreach ($category->subCategory as $sub_category)
                                                <li class="category-item">
                                                    <a href="{{ route('job.category', ['category_slug' => $category->slug, 'sub_category_slug' => $sub_category->slug]) }}"
                                                        class="cat-link">
                                                        <i class="fa fa-caret-right"></i>
                                                        {{ $sub_category->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- Categories widget-->

                <div class="widget mercado-widget filter-widget brand-widget">
                    <h2 class="widget-title">Job Type</h2>
                    <div class="widget-content">
                        <ul class="list-style vertical-list list-limited" data-show="6">
                            <li class="list-item"><a class="filter-link" href="#">Full time</a></li>
                            <li class="list-item"><a class="filter-link" href="#">Part time</a></li>
                        </ul>
                    </div>
                </div><!-- brand widget-->

                <div class="widget mercado-widget filter-widget price-filter">
                    <h2 class="widget-title">{{ __('search.salary_2') }} <span
                            class="text-info">${{ $min_salary }} - ${{ $max_salary }}</span></h2>
                    <div class="widget-content" style="padding: 10px 5px 40px 5px;">
                        <div id="slider" wire:ignore></div>
                    </div>
                </div><!-- Price-->

                <div class="widget mercado-widget widget-product">
                    <h2 class="widget-title">{{ __('search.popular') }}</h2>
                    <div class="widget-content">
                        <ul class="products">
                            @foreach ($popular_jobs as $job)
                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="{{ route('job.details', ['slug' => $job->slug]) }}"
                                            title="{{ $job->name }}">
                                            <figure><img src="{{ asset('assets/images/products') }}/{{ $job->image }}"
                                                    alt="{{ $job->name }}"></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{ route('job.details', ['slug' => $job->slug]) }}" class="product-name">
                                            <span style="font-size: 16px;">{{ $job->name }}</span></a>
                                        <div class="wrap-price"><ins>
                                                <p class="product-price">{{ __('search.salary') }}{{ $job->regular_salary }}</p>
                                            </ins></div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- brand widget-->

            </div>
            <!--end sitebar-->

        </div>
        <!--end row-->

    </div>
    <!--end container-->

</main>


@push('scripts')
    <script>
        var slider = document.getElementById('slider');
        noUiSlider.create(slider, {
            start: [1, 1000],
            connect: true,
            range: {
                'min': 1,
                'max': 1000
            },
            pips: {
                mode: 'steps',
                stepped: true,
                density: 4
            }
        });

        slider.noUiSlider.on('change', function(value) {
            @this.set('min_salary', value[0]);
            @this.set('max_salary', value[1]);
        });
    </script>
@endpush
