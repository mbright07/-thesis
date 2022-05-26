<!--main area-->
<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Job Categories</span></li>
                <li class="item-link"><span>{{ $category_name }}</span></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

                <div class="banner-shop">
                    <a href="#" class="banner-link">
                        <figure><img src="assets/images/shop-banner.jpg" alt=""></figure>
                    </a>
                </div>

                <div class="wrap-shop-control">

                    <h1 class="shop-title">{{ $category_name }}</h1>

                    <div class="wrap-right">

                        <div class="sort-item orderby ">
                            <select name="orderby" class="use-chosen" wire:model="sorting" >
                                <option value="default" selected="selected">Default sorting</option>
                                <option value="created_at">Sort by newness</option>
                                <option value="regular_salary">Sort by salary: low to high</option>
                                <option value="price-desc">Sort by saraly: high to low</option>
                            </select>
                        </div>

                        <div class="sort-item product-per-page">
                            <select name="post-per-page" class="use-chosen" wire:model="pagesize" >
                                <option value="12" selected="selected">12 per page</option>
                                <option value="16">16 per page</option>
                                <option value="18">18 per page</option>
                                <option value="21">21 per page</option>
                                <option value="24">24 per page</option>
                                <option value="30">30 per page</option>
                                <option value="32">32 per page</option>
                            </select>
                        </div>

                        <div class="change-display-mode">
                            <a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
                            <a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
                        </div>

                    </div>

                </div><!--end wrap shop control-->

                <div class="row">

                    <ul class="product-list grid-products equal-container">
                        @foreach ($jobs as $job)
                            <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{ route('job.details', ['slug'=>$job->slug]) }}" title={{ $job->name }}>
                                            <figure><img src="{{ asset ('assets/images/products') }}/{{ $job->image }}" width="800" height="800" alt="{{ $job->name }}"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item bestseller-label">Hot</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="#" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{ route('job.details', ['slug'=>$job->slug]) }}" class="product-name"><span>{{ $job->name }}</span></a>
                                        <div class="wrap-price"><ins><p class="product-price">Salary: ${{ $job->regular_salary }}</p></ins></div>    
                                    </div>
                                    <div class="addcart">
                                        <div class="bookmark">
                                            <a href="#" class="btn add-to-cart" wire:click.prevent="company({{ $job->id}},'{{ $job->name }}',{{ $job->regular_salary }})">Bookmark</a>
                                        </div>
                                        <div class="choice">
                                            <a href="#" class="btn add-to-cart">Ứng tuyển ngay</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                </div>

                <div class="wrap-pagination-info">
                    {{ $jobs->links() }}
                </div>
            </div><!--end main products area-->

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget mercado-widget categories-widget">
                    <h2 class="widget-title">All locations</h2>
                    <div class="widget-content">
                        <ul class="list-category">
                            @foreach ($categories as $category )
                            <li class="category-item {{ count($category->subCategory) > 0 ? 'has-child-cate':'' }}">
                                <a href="{{ route('job.category',['category_slug'=>$category->slug]) }}" class="cate-link">{{ $category->name }}</a>
                                @if(count($category->subCategory) > 0)
                                    <span class="toggle-control">+</span>
                                    <ul class="sub-cate">
                                        @foreach ($category->subCategory as $sub_category)
                                            <li class="category-item">
                                                <a href="{{ route('job.category',['category_slug'=>$category->slug,'sub_category_slug'=>$sub_category->slug]) }}" class="cat-link">
                                                    <i class="fa fa-caret-right"></i> {{ $sub_category->name }}
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
                    <h2 class="widget-title">Work location</h2>
                    <div class="widget-content">
                        <ul class="list-style vertical-list list-limited" data-show="6">
                            <li class="list-item"><a class="filter-link active" href="#">Hospital</a></li>
                            <li class="list-item"><a class="filter-link " href="#">Nursing home</a></li>
                            <li class="list-item"><a class="filter-link " href="#">Aged care center</a></li>
                            <li class="list-item"><a class="filter-link " href="#">Clinic</a></li>
                            <li class="list-item"><a class="filter-link " href="#">Community health facility</a></li>
                            <li class="list-item default-hiden"><a class="filter-link " href="#">Rehabilitation center</a></li>
                            <li class="list-item default-hiden"><a class="filter-link " href="#">School</a></li>
                            <li class="list-item"><a data-label='Show less<i class="fa fa-angle-up" aria-hidden="true"></i>' class="btn-control control-show-more" href="#">Show more<i class="fa fa-angle-down" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div><!-- brand widget-->

                <div class="widget mercado-widget filter-widget price-filter">
                    <h2 class="widget-title">Salary</h2>
                    <div class="widget-content">
                        <div id="slider-range"></div>
                        <p>
                            <label for="amount">Salary:</label>
                            <input type="text" id="amount" readonly>
                            <button class="filter-submit">Filter</button>
                        </p>
                    </div>
                </div><!-- Price-->

                <div class="widget mercado-widget widget-product">
                    <h2 class="widget-title">Popular Jobs</h2>
                    <div class="widget-content">
                        <ul class="products">
                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ asset('assets/images/products/congty_9.jpg') }}" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span style="font-size: 16px;">Điều dưỡng viên tại bệnh viện...</span></a>
                                        <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ asset('assets/images/products/congty_5.jpg') }}" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span style="font-size: 16px;">Điều dưỡng viên tại bệnh viện...</span></a>
                                        <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ asset('assets/images/products/congty_3.jpg') }}" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span style="font-size: 16px;">Điều dưỡng viên tại bệnh viện...</span></a>
                                        <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ asset('assets/images/products/congty_6.jpg') }}" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span style="font-size: 16px;">Điều dưỡng viên tại bệnh viện...</span></a>
                                        <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ asset('assets/images/products/congty_8.jpg') }}" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span style="font-size: 16px;">Điều dưỡng viên tại bệnh viện...</span></a>
                                        <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ asset('assets/images/products/congty_7.jpg') }}" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span style="font-size: 16px;">Điều dưỡng viên tại bệnh viện...</span></a>
                                        <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ asset('assets/images/products/congty_10.jpg') }}" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span style="font-size: 16px;">Điều dưỡng viên tại bệnh viện...</span></a>
                                        <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ asset('assets/images/products/congty_11.jpg') }}" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span style="font-size: 16px;">Điều dưỡng viên tại bệnh viện...</span></a>
                                        <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ asset('assets/images/products/congty_12.jpg') }}" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span style="font-size: 16px;">Điều dưỡng viên tại bệnh viện...</span></a>
                                        <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ asset('assets/images/products/congty_1.jpg') }}" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span style="font-size: 16px;">Điều dưỡng viên tại bệnh viện...</span></a>
                                        <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ asset('assets/images/products/congty_11.jpg') }}" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span style="font-size: 16px;">Điều dưỡng viên tại bệnh viện...</span></a>
                                        <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ asset('assets/images/products/congty_9.jpg') }}" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span style="font-size: 16px;">Điều dưỡng viên tại bệnh viện...</span></a>
                                        <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div><!-- brand widget-->

            </div><!--end sitebar-->

        </div><!--end row-->

    </div><!--end container-->

</main>
<!--main area-->
