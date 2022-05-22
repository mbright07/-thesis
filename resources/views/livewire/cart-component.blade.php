<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Bookmark</span></li>
            </ul>
        </div> 
        <div class=" main-content-area">
            @if (Cart::instance('bookmark')->count() > 0)
                <div class="wrap-iten-in-cart">
                    @if(Session::has('success_message'))
                        <div class="alert alert-success">
                            <strong>Success</strong> {{ Session::get('success_message') }}
                        </div>
                    @endif
                    @if(Cart::instance('bookmark')->count() > 0)
                        <h3 class="box-title">Jobs Bookmark</h3>
                        <ul class="products-cart">
                            @foreach (Cart::instance('bookmark')->content() as $item )
                                <li class="pr-cart-item">
                                    <div class="product-image">
                                        <figure><img src="{{ asset('assets/images/products') }}/{{ $item->model->image }}" alt="{{ $item->model->image }}"></figure>
                                    </div>
                                    <div class="product-name">
                                        <a class="link-to-product" href="{{ route('job.details',['slug'=>$item->model->slug]) }}">{{ $item->model->name }}</a>
                                    </div>
                                    <div class="price-field produtc-price"><p class="price">Salary: ${{ $item->model->regular_salary }}</p></div>
                                    <div class="quantity">
                                        <a class="btn btn-primary" href="#" wire:click.prevent="switchToSaveForLater('{{ $item->rowId }}')">Save For Later</a>
                                    </div>
                                    <div class="checkout-info">
                                        <a class="btn btn-checkout"  href="#" wire:click.prevent="Recruitment">Recruitment</a>
                                    </div>
                                    <div class="delete">
                                        <a href="#" onclick=" return confirm('Are you sure, You want to cancel recruitment this job?') || event.stopImmediatePropagation()" wire:click.prevent="destroy('{{ $item->rowId }}')" class="btn btn-delete" title="">
                                            <span>Delete from your bookmark</span>
                                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </li>
                            @endforeach							
                        </ul>
                    @else
                        <p>No Bookmark</p>
                    @endif
                </div>

                <div class="summary">
                    <div class="checkout-info">
                        <a class="link-to-shop" href="/blog" style="font-size: 18px;">Continue Search Job<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div>
                    <div class="update-clear">
                        <a class="btn btn-clear" wire:click.prevent="destroyAll()" href="#">Clear Job Bookmark</a>
                        <a class="btn btn-update" href="#">Update Job Bookmark</a>
                    </div>
                </div>
            @else
                <div class="text-center" style="padding: 30p 0;">
                    <h1>Your Bookmark is empty!</h1>
                    <p>Add Jobs to it now</p>
                    <a href="/blog" class="btn btn-success">List Jobs</a>
                </div>
            @endif
            <div class="wrap-iten-in-cart">
                <h3 class="title-box" style="border-bottom:1px solid; padding-bottom:15px;">{{ Cart::instance('saveForLater')->count() }} job(s) Save For Later</h3>
                @if(Session::has('s_success_message'))
                    <div class="alert alert-success">
                        <strong>Success</strong> {{ Session::get('s_success_message') }}
                    </div>
                @endif
                @if(Cart::instance('saveForLater')->count() > 0)
                    
                    <ul class="products-cart">
                        @foreach (Cart::instance('saveForLater')->content() as $item )
                            <li class="pr-cart-item">
                                <div class="product-image">
                                    <figure><img src="{{ asset('assets/images/products') }}/{{ $item->model->image }}" alt="{{ $item->model->image }}"></figure>
                                </div>
                                <div class="product-name">
                                    <a class="link-to-product" href="{{ route('job.details',['slug'=>$item->model->slug]) }}">{{ $item->model->name }}</a>
                                </div>
                                <div class="price-field produtc-price"><p class="price">Salary: ${{ $item->model->regular_salary }}</p></div>
                                <div class="quantity">
                                    <a class="btn btn-primary" href="#" wire:click.prevent="moveToBookmark('{{ $item->rowId }}')">Move To Bookmark</a>
                                </div>
                                <div class="delete">
                                    <a href="#" onclick="confirm('Are you sure, You want to delete this job?') || event.stopImmediatePropagation()" wire:click.prevent="deleteFromSaveForLater('{{ $item->rowId }}')" class="btn btn-delete" title="">
                                        <span>Delete from save for Later</span>
                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </li>
                        @endforeach							
                    </ul>
                @else
                    <p>No Job save for later</p>
                @endif
            </div>
            <div class="wrap-iten-in-cart">
                <h3 class="title-box" style="border-bottom:1px solid; padding-bottom:15px;">{{ Cart::instance('applied')->count() }} job(s) Applied</h3>
                @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                @endif
                @if(Cart::instance('applied')->count() > 0)
                    <ul class="products-cart">
                        @foreach (Cart::instance('applied')->content() as $item )
                            <li class="pr-cart-item">
                                <div class="product-image">
                                    <figure><img src="{{ asset('assets/images/products') }}/{{ $item->model->image }}" alt="{{ $item->model->image }}"></figure>
                                </div>
                                <div class="product-name">
                                    <a class="link-to-product" href="{{ route('job.details',['slug'=>$item->model->slug]) }}">{{ $item->model->name }}</a>
                                </div>
                                <div class="price-field produtc-price"><p class="price">Salary: ${{ $item->model->regular_salary }}</p></div>
                                <div class="quantity">
                                    <a class="btn btn-primary" href="#" wire:click.prevent="moveToBookmark('{{ $item->rowId }}')">Move To Bookmark</a>
                                </div>
                                <div class="delete">
                                    <a href="#" onclick="confirm('Are you sure, You want to delete this job?') || event.stopImmediatePropagation()" wire:click.prevent="deleteFromSaveForLater('{{ $item->rowId }}')" class="btn btn-delete" title="">
                                        <span>Delete from applied</span>
                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </li>
                        @endforeach							
                    </ul>
                @else
                    <p>No Job Applied</p>
                @endif
            </div>

            
            <div class="wrap-show-advance-info-box style-1 box-in-site">
                <h3 class="title-box">Most Viewed Jobs</h3>
                <div class="wrap-products">
                    <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset ('assets/images/products/digital_3.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Điều dưỡng viên tại bệnh viện Hà Nội </span></a>
                                <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset ('assets/images/products/digital_2.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Điều dưỡng viên tại bệnh viện Hà Nội </span></a>
                                <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset ('assets/images/products/digital_1.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Điều dưỡng viên tại bệnh viện Hà Nội </span></a>
                                <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                            </div>
                        </div><div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset ('assets/images/products/digital_8.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Điều dưỡng viên tại bệnh viện Hà Nội </span></a>
                                <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset ('assets/images/products/digital_7.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Điều dưỡng viên tại bệnh viện Hà Nội </span></a>
                                <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset ('assets/images/products/digital_6.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Điều dưỡng viên tại bệnh viện Hà Nội </span></a>
                                <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset ('assets/images/products/digital_5.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Điều dưỡng viên tại bệnh viện Hà Nội </span></a>
                                <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset ('assets/images/products/digital_4.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Điều dưỡng viên tại bệnh viện Hà Nội </span></a>
                                <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset ('assets/images/products/digital_3.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Điều dưỡng viên tại bệnh viện Hà Nội </span></a>
                                <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset ('assets/images/products/digital_2.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Điều dưỡng viên tại bệnh viện Hà Nội </span></a>
                                <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset ('assets/images/products/digital_1.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Điều dưỡng viên tại bệnh viện Hà Nội </span></a>
                                <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                            </div>
                        </div>
                    </div>
                </div><!--End wrap-products-->
            </div>

        </div><!--end main content area-->
    </div><!--end container-->

</main>
