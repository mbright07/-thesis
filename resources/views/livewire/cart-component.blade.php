<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">{{ __('bookmark.home') }}</a></li>
                <li class="item-link"><span>{{ __('bookmark.book_mark') }}</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            @if (Cart::instance('bookmark')->count() > 0)
                <div class="wrap-iten-in-cart">
                    @if (Session::has('success_message'))
                        <div class="alert alert-success">
                            <strong>{{ __('bookmark.success') }}</strong> {{ Session::get('success_message') }}
                        </div>
                    @endif
                    @if (Cart::instance('bookmark')->count() > 0)
                        <h3 class="box-title">{{ __('bookmark.job_bookmark') }}</h3>
                        <ul class="products-cart">
                            @foreach (Cart::instance('bookmark')->content() as $item)
                                <li class="pr-cart-item">
                                    <div class="product-image">
                                        <figure><img
                                                src="{{ asset('assets/images/products') }}/{{ $item->model->image }}"
                                                alt="{{ $item->model->image }}"></figure>
                                    </div>
                                    <div class="product-name">
                                        <a class="link-to-product"
                                            href="{{ route('job.details', ['slug' => $item->model->slug]) }}">{{ $item->model->name }}</a>
                                    </div>
                                    <div class="price-field product-price">
                                        <p class="price">
                                            {{ __('bookmark.salary') }}{{ $item->model->regular_salary }}</p>
                                    </div>
                                    <div class="quantity">
                                        <a class="btn btn-primary" href="#"
                                            wire:click.prevent="switchToSaveForLater('{{ $item->rowId }}')">{{ __('bookmark.save') }}</a>
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
                        <a class="link-to-shop" href="/jobs"
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
                    <a href="{{ route('jobs') }}" class="btn btn-success">{{ __('bookmark.list_job') }}</a>
                </div>
            @endif
            <div class="wrap-iten-in-cart">
                <h3 class="title-box" style="border-bottom:1px solid; padding-bottom:15px;">
                    {{ Cart::instance('saveForLater')->count() }} {{ __('bookmark.job_save') }}</h3>
                @if (Session::has('s_success_message'))
                    <div class="alert alert-success">
                        <strong>{{ __('bookmark.success') }}</strong> {{ Session::get('s_success_message') }}
                    </div>
                @endif
                @if (Cart::instance('saveForLater')->count() > 0)

                    <ul class="products-cart">
                        @foreach (Cart::instance('saveForLater')->content() as $item)
                            <li class="pr-cart-item">
                                <div class="product-image">
                                    <figure><img
                                            src="{{ asset('assets/images/products') }}/{{ $item->model->image }}"
                                            alt="{{ $item->model->image }}"></figure>
                                </div>
                                <div class="product-name">
                                    <a class="link-to-product"
                                        href="{{ route('job.details', ['slug' => $item->model->slug]) }}">{{ $item->model->name }}</a>
                                </div>
                                <div class="price-field produtc-price">
                                    <p class="price">
                                        {{ __('bookmark.salary') }}{{ $item->model->regular_salary }}</p>
                                </div>
                                <div class="quantity">
                                    <a class="btn btn-primary" href="#"
                                        wire:click.prevent="moveToBookmark('{{ $item->rowId }}')">{{ __('bookmark.move') }}</a>
                                </div>
                                <div class="delete">
                                    <a href="#"
                                        onclick="confirm('{{ __('bookmark.delete_job') }}') || event.stopImmediatePropagation()"
                                        wire:click.prevent="deleteFromSaveForLater('{{ $item->rowId }}')"
                                        class="btn btn-delete" title="">
                                        <span>{{ __('bookmark.delete_save') }}</span>
                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>{{ __('bookmark.no_job_save') }}</p>
                @endif
            </div>

            <div class="wrap-show-advance-info-box style-1 box-in-site">
                <h3 class="title-box">{{ __('bookmark.most_view') }}</h3>
                <div class="wrap-products">
                    <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5"
                        data-loop="false" data-nav="true" data-dots="false"
                        data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>
                        @foreach ($top_views as $top_view)
                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="{{ route('job.details', ['slug' => $top_view->slug]) }}"
                                        title="{{ $top_view->name }}">
                                        <figure><img
                                                src="{{ asset('assets/images/products') }}/{{ $top_view->image }}"
                                                width="800" height="800" alt="{{ $top_view->name }}"></figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item bestseller-label">Hot</span>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="{{ route('job.details', ['slug' => $top_view->slug]) }}"
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


@push('scripts')
    <script>

        window.addEventListener('jobApplied', (e) => {
            alert(e.detail.message);
        });

    </script>
@endpush
