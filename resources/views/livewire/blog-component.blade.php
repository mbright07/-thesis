<main id="main" class="main-site left-sidebar">
    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">{{ __('search.home') }}</a></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area" style="margin-top: -50px">

                {{-- <div class="banner-shop">
                    <a href="#" class="banner-link">
                        <figure><img src="assets/images/shop-banner.jpg" alt=""></figure>
                    </a>
                </div> --}}

                <div class="wrap-shop-control" style="height: 50px;">

                    <div class="wrap-right">
                        <div class="sort-item orderby">
                            <select name="orderby" class="form-control" wire:model="sorting">
                                <option value="" selected="selected">{{ __('search.default') }}</option>
                                <option value="created_at">{{ __('search.sort_newness') }}</option>
                                <option value="regular_salary">{{ __('search.low_to_high') }}</option>
                                <option value="regular_salary-desc">{{ __('search.high_to_low') }}</option>
                            </select>
                        </div>

                        <div class="sort-item product-per-page">
                            <select name="post-per-page" class="form-control" wire:model="pagesize">
                                <option value="12" selected="selected">{{ __('search.12') }}</option>
                                <option value="16">{{ __('search.16') }}</option>
                                <option value="18">{{ __('search.18') }}</option>
                                <option value="21">{{ __('search.21') }}</option>
                                <option value="24">{{ __('search.24') }}</option>
                                <option value="30">{{ __('search.30') }}</option>
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
                                    <div class="product-thumnail" style="height: 60%">
                                        <a href="{{ route('job.details', ['slug' => $job->slug]) }}"
                                            title="{{ $job->name }}">
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
                                                    wire:click.prevent="removeFromWishlist({{ $job->id }})"><i
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
                                            <a href="#" class="btn add-to-cart"
                                                wire:click.prevent="recruitment({{ $job->id }})">{{ __('search.apply_now') }}</a>
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
                <div class="widget mercado-widget filter-widget brand-widget">
                    <h2 class="widget-title">{{ __('search.job_type') }}</h2>
                    <select name="job-type" class="form-control" wire:model="type">
                        <option value="" selected="selected">{{ __('admin/admin-add-job.all_type') }}</option>
                        <option value="1">{{ __('admin/admin-add-job.fulltime') }}</option>
                        <option value="2">{{ __('admin/admin-add-job.parttime') }}</option>
                    </select>
                </div><!-- brand widget-->

                <br /><br />

                <div class="widget mercado-widget filter-widget price-filter">
                    <h2 class="widget-title">{{ __('search.salary_2') }}</h2>
                    <div class="widget-content">
                        <div id="slider-range" wire:ignore></div>
                        <p>
                            <label for="amount">{{ __('search.salary_2') }}:</label>
                            <input type="text" id="amount" readonly style="width: 100%">
                            <input type="hidden" id="salary_max" name="salary_max" value="{{ $max_salary }}"
                                wire:model="max_salary">
                        </p>
                    </div>
                </div><!-- Price-->

                <br /><br />

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
                                                <figure><img
                                                        src="{{ asset('assets/images/products') }}/{{ $job->image }}"
                                                        alt="{{ $job->name }}"></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{ route('job.details', ['slug' => $job->slug]) }}"
                                                class="product-name">
                                                <span style="font-size: 16px;">{{ $job->name }}</span></a>
                                            <div class="wrap-price"><ins>
                                                    <p class="product-price" style="margin-left: 18px;">
                                                        {{ __('search.salary') }}{{ $job->regular_salary }}</p>
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
        $(function() {
            if ($("#slider-range").length > 0) {
                $("#slider-range").slider({
                    range: true,
                    min: 1,
                    max: $("#salary_max").val(),
                    values: [1, $("#salary_max").val()],
                    slide: function(event, ui) {
                        $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                        @this.set('selected_salary_min', ui.values[0])
                        @this.set('selected_salary_max', ui.values[1])
                    }
                });
                $("#amount").val("$" + $("#slider-range").slider("values", 0) +
                    " - $" + $("#slider-range").slider("values", 1));

            }

        });

        window.addEventListener('jobApplied', (e) => {
            alert(e.detail.message);
        });
    </script>
@endpush
