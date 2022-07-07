<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">{{ __('bookmark.home') }}</a></li>
                <li class="item-link"><span>{{ __('bookmark.book_mark') }}</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            @if (Cart::instance('bookmark_candidate')->count() > 0)
                <div class="wrap-iten-in-cart">
                    @if (Session::has('success_message'))
                        <div class="alert alert-success">
                            <strong>{{ __('bookmark.success') }}</strong> {{ Session::get('success_message') }}
                        </div>
                    @endif
                    @if (Cart::instance('bookmark_candidate')->count() > 0)
                        <h3 class="box-title">{{ __('bookmark.job_bookmark') }}</h3>
                        <ul class="products-cart">
                            @foreach (Cart::instance('bookmark_candidate')->content() as $item)
                                <li class="pr-cart-item">
                                    <div class="product-image">
                                        @if($item->model->profile && $item->model->profile->image)
                                            <figure><img
                                                    src="{{ asset('assets/images/profile') }}/{{ $item->model->profile->image }}"
                                                    alt="{{ $item->model->name }}"></figure>
                                        @else
                                            <figure><img
                                                    src="{{ asset('assets/images/profile/default-avatar-profile-image.jpg') }}"
                                                    alt="{{ $item->model->name }}"></figure>
                                        @endif
                                    </div>
                                    <div class="product-name">
                                        <a class="link-to-product"
                                           href="{{ route('employer.candidate.details', ['user_id' => $item->model->id]) }}">{{ $item->model->name }}</a>
                                    </div>
                                    <div class="price-field produtc-price">
                                        <p class="price">
                                            {{ __('bookmark.salary') }}{{ $item->model->regular_salary }}</p>
                                    </div>
                                    <div class="quantity checkout-info">
                                        <a class="btn btn-success" href="#"
                                           wire:click.prevent="recruitment({{ $item->model->id }})">{{ __('bookmark.apply') }}</a>
                                    </div>
                                    <div class="delete">
                                        <a href="#"
                                           onclick=" return confirm('{{ __('bookmark.sure') }}') || event.stopImmediatePropagation()"
                                           wire:click.prevent="destroy('{{ $item->rowId }}')" class="btn btn-delete"
                                           title="">
                                            <span>{{ __('bookmark.delete') }}</span>
                                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <h3>{{ __('bookmark.no_bookmark') }}</h3>
                    @endif
                </div>

                <div class="summary">
                    <div class="checkout-info">
                        <a class="link-to-shop" href="{{ route('employer.candidates') }}"
                           style="font-size: 18px;">{{ __('bookmark.continue') }}<i class="fa fa-arrow-circle-right"
                                                                                    aria-hidden="true"></i></a>
                    </div>
                    <div class="update-clear">
                        <a class="btn btn-clear" wire:click.prevent="destroyAll()"
                           href="#">{{ __('bookmark.clear') }}</a>
                        <a class="btn btn-update" href="#">{{ __('bookmark.update') }}</a>
                    </div>
                </div>
            @else
                <div class="text-center" style="padding: 30p 0;">
                    <h1>{{ __('bookmark.empty') }}</h1>
                    <p>{{ __('bookmark.add_job_now') }}</p>
                    <a href="{{ route('employer.candidates') }}" class="btn btn-success">{{ __('bookmark.list_job') }}</a>
                </div>
            @endif

            <div class="wrap-show-advance-info-box style-1 box-in-site">
                <h3 class="title-box">{{ __('bookmark.most_view') }}</h3>
                <div class="wrap-products">
                    <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5"
                         data-loop="false" data-nav="true" data-dots="false"
                         data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>
                        @foreach ($top_views as $top_view)
                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="{{ route('employer.candidate.details', ['user_id' => $top_view->id]) }}"
                                       title="{{ $top_view->name }}">
                                        @if($top_view->profile && $top_view->profile->image)
                                            <figure><img
                                                    src="{{ asset('assets/images/profile') }}/{{ $top_view->profile->image }}"
                                                    width="800" height="800" alt="{{ $top_view->name }}"></figure>
                                        @else
                                            <figure><img
                                                    src="{{ asset('assets/images/profile/default-avatar-profile-image.jpg') }}"
                                                    width="800" height="800" alt="{{ $top_view->name }}"></figure>
                                        @endif
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="{{ route('employer.candidate.details', ['user_id' => $top_view->id]) }}"
                                       class="product-name"><span>{{ $top_view->name }}</span></a>
                                    <div class="wrap-price"><ins>
                                            <p class="product-price">{{ __('home.salary') }}
                                                ${{ $top_view->regular_salary }}</p>
                                        </ins></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!--End wrap-products-->
            </div>

        </div>
        <!--end main content area-->
    </div>
    <!--end container-->

</main>

