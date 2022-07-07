<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">{{ __('detail.home') }}</a></li>
                <li class="item-link"><span>{{ __('detail.detail') }}</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12 main-content-area">
                <div class="wrap-product-detail">
                    <div class="detail-media">
                        <img src="{{ asset('assets/images/products') }}/{{ $job->image }}" alt="{{ $job->name }}"
                            height="300" width="300" />
                    </div>
                    <div class="detail-info">
                        <div class="product-rating">
                            <style>
                                .color-gray {
                                    color: #e6e6e6 !important;
                                }
                            </style>
                            @php
                                $avgrating = 0;
                            @endphp
                            @foreach ($job->recruitmentJobs->where('rstatus', 1) as $recruitmentJob)
                                @php
                                    $avgrating = $avgrating + $recruitmentJob->review->rating;
                                @endphp
                            @endforeach
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $avgrating)
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                @else
                                    <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                @endif
                            @endfor
                            <a href="#"
                                class="count-review">({{ $job->recruitmentJobs->where('rstatus', 1)->count() }}
                                {{ __('detail.review') }})</a>
                        </div>
                        <h2 class="product-name">{{ $job->name }}</h2>
                        <h5>View: {{ $job->totalviews }}</h5>
                        <div class="short-desc">
                            {!! $job->short_description !!}
                        </div>

                        <div class="wrap-price"><span
                                class="product-price">{{ __('detail.salary') }}{{ $job->regular_salary }}</span>
                        </div>
                        <div class="stock-info in-stock">
                            <p class="availability">
                                {{ __('detail.availability') }}<b>{{ $job->stock_status }}</b></p>
                            <p class="availability">{{ __('detail.quantily') }}<b>{{ $job->quantity }}</b></p>
                        </div>
                        <div class="wrap-butons">
                            <a href="#" class="btn add-to-cart"
                                wire:click.prevent="recruitment({{ $job->id }})">{{ __('detail.apply_now') }}</a>
                            <a href="#" class="btn add-to-cart"
                                wire:click.prevent="company({{ $job->id }},'{{ $job->name }}',{{ $job->regular_salary }})">{{ __('detail.bookmark') }}</a>
                        </div>
                    </div>
                    <div class="advance-info">
                        <div class="tab-control normal">
                            <a href="#description" class="tab-control-item active">{{ __('detail.description') }}</a>
                            <a href="#add_infomation" class="tab-control-item">{{ __('detail.add_info') }}</a>
                            <a href="#review" class="tab-control-item">{{ __('detail.review') }}</a>
                        </div>
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="description">
                                {!! $job->description !!}
                            </div>

                            <div class="tab-content-item " id="add_infomation">
                                <div class="col-sm-3">
                                    <div class="text-center">
                                        @if($user->profile && $user->profile->image)
                                            <img src="{{ asset('/assets/images/profile') }}/{{ $user->profile->image }}"
                                                class="avatar img-circle img-thumbnail" alt="avatar">
                                        @endif
                                    </div>
                                    <div class="row text-center">
                                        <div class="col-sm-12" class="text-center">
                                            <h2>{{ $user->name }}</h2>
                                        </div>
                                    </div>
                                    <hr>
                                </div>

                                <div class="col-sm-9">
                                    <div class="tab-content">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="name">
                                                    <h4>Name</h4>
                                                </label>
                                                <br/>
                                                {{ $user->name }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="email">
                                                    <h4>Email</h4>
                                                </label>
                                                <br/>
                                                {{ $user->email }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="mobile">
                                                    <h4>Mobile</h4>
                                                </label>
                                                <br/>
                                                {{ $user->profile ? $user->profile->mobile : '' }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="city">
                                                    <h4>City</h4>
                                                </label>
                                                <br/>
                                                {{ $user->profile ? $user->profile->city : '' }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="province">
                                                    <h4>Province</h4>
                                                </label>
                                                <br/>
                                                {{ $user->profile ? $user->profile->province : '' }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="country">
                                                    <h4>Country</h4>
                                                </label>
                                                <br/>
                                                {{ $user->profile ? $user->profile->country : '' }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="address">
                                                    <h4>Address</h4>
                                                </label>
                                                <br/>
                                                {{ $user->profile ? $user->profile->address : '' }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="intro">
                                                    <h4>Intro</h4>
                                                </label>
                                                <br/>
                                                {{ $user->profile ? $user->profile->intro : '' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-content-item " id="review">

                                <div class="wrap-review-form">
                                    <style>
                                        .width-0-percent {
                                            width: 0%;
                                        }

                                        .width-20-percent {
                                            width: 20%;
                                        }

                                        .width-40-percent {
                                            width: 40%;
                                        }

                                        .width-60-percent {
                                            width: 60%;
                                        }

                                        .width-80-percent {
                                            width: 80%;
                                        }

                                        .width-100-percent {
                                            width: 100%;
                                        }
                                    </style>
                                    <div id="comments">
                                        <h2 class="woocommerce-Reviews-title">
                                            {{ $job->recruitmentJobs->where('rstatus', 1)->count() }}
                                            {{ __('detail.review_for') }} <span>{{ $job->name }}</span></h2>
                                        <ol class="commentlist">
                                            @foreach ($job->recruitmentJobs->where('rstatus', 1) as $recruitmentJob)
                                                <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1"
                                                    id="li-comment-20">
                                                    <div id="comment-20" class="comment_container">
                                                        <img alt=""
                                                            src="{{ asset('assets/images/author-avata.jpg') }}"
                                                            height="80" width="80">
                                                        <div class="comment-text">
                                                            <div class="star-rating">
                                                                <span
                                                                    class="width-{{ $recruitmentJob->review->rating * 20 }}-percent">{{ __('detail.rate') }}
                                                                    <strong
                                                                        class="rating">{{ $recruitmentJob->review->rating }}</strong>
                                                                    {{ __('detail.out_of_5') }} </span>
                                                            </div>
                                                            <p class="meta">
                                                                <strong
                                                                    class="woocommerce-review__author">{{ $recruitmentJob->recruitment->user->name }}</strong>
                                                                <span class="woocommerce-review__dash">–</span>
                                                                <time class="woocommerce-review__published-date"
                                                                    datetime="2008-02-14 20:00">{{ Carbon\Carbon::parse($recruitmentJob->review->created_at)->format('d F Y g:i A') }}</time>
                                                            </p>
                                                            <div class="description">
                                                                <p>{{ $recruitmentJob->review->comment }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ol>
                                    </div>

                                    {{-- <div id="review_form_wrapper">
                                        <div id="review_form">
                                            <div id="respond" class="comment-respond">

                                                <form action="#" method="post" id="commentform" class="comment-form"
                                                    novalidate="">
                                                    <p class="comment-notes">
                                                        <span id="email-notes">{{ __('detail.your_email') }}</span>
                                                        {{ __('detail.required') }} <span
                                                            class="required">*</span>
                                                    </p>
                                                    <div class="comment-form-rating">
                                                        <span>{{ __('detail.your_rating') }}</span>
                                                        <p class="stars">

                                                            <label for="rated-1"></label>
                                                            <input type="radio" id="rated-1" name="rating" value="1">
                                                            <label for="rated-2"></label>
                                                            <input type="radio" id="rated-2" name="rating" value="2">
                                                            <label for="rated-3"></label>
                                                            <input type="radio" id="rated-3" name="rating" value="3">
                                                            <label for="rated-4"></label>
                                                            <input type="radio" id="rated-4" name="rating" value="4">
                                                            <label for="rated-5"></label>
                                                            <input type="radio" id="rated-5" name="rating" value="5"
                                                                checked="checked">
                                                        </p>
                                                    </div>
                                                    <p class="comment-form-author">
                                                        <label for="author">{{ __('detail.name') }} <span
                                                                class="required">*</span></label>
                                                        <input id="author" name="author" type="text" value="">
                                                    </p>
                                                    <p class="comment-form-email">
                                                        <label for="email">{{ __('detail.email') }} <span
                                                                class="required">*</span></label>
                                                        <input id="email" name="email" type="email" value="">
                                                    </p>
                                                    <p class="comment-form-comment">
                                                        <label for="comment">{{ __('detail.your_review') }} <span
                                                                class="required">*</span>
                                                        </label>
                                                        <textarea id="comment" name="comment" cols="45" rows="8"></textarea>
                                                    </p>
                                                    <p class="form-submit">
                                                        <input name="submit" type="submit" id="submit"
                                                            class="submit" value="{{ __('detail.submit') }}">
                                                    </p>
                                                </form>

                                            </div><!-- .comment-respond-->
                                        </div><!-- #review_form -->
                                    </div><!-- #review_form_wrapper --> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget widget-our-services ">
                    <div class="widget-content">
                        <ul class="our-services">

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-truck" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">{{ __('detail.career') }}</b>
                                        <span class="subtitle"></span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...
                                        </p>
                                    </div>
                                </a>
                            </li>

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-gift" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">{{ __('detail.skill') }}</b>
                                        <span class="subtitle"></span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...
                                        </p>
                                    </div>
                                </a>
                            </li>

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-reply" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">{{ __('detail.area') }}</b>
                                        <span class="subtitle"></span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...
                                        </p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div><!-- Categories widget-->

                <div class="widget mercado-widget widget-product">
                    <h2 class="widget-title">{{ __('detail.popular_job') }}</h2>
                    <div class="widget-content">
                        <ul class="products">
                            @foreach ($popular_jobs as $popular_job)
                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="{{ route('job.details', ['slug' => $popular_job->slug]) }}"
                                                title="{{ $popular_job->name }}">
                                                <figure><img
                                                        src="{{ asset('assets/images/products/') }}/{{ $popular_job->image }}"
                                                        alt="{{ $popular_job->name }}"></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{ route('job.details', ['slug' => $popular_job->slug]) }}"
                                                title="{{ $popular_job->name }}"
                                                class="product-name"><span>{{ $popular_job->name }}</span></a>
                                            <div class="wrap-price"><span
                                                    class="product-price">{{ __('detail.salary') }}{{ $popular_job->regular_salary }}</span>
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

            <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wrap-show-advance-info-box style-1 box-in-site">
                    <h3 class="title-box">{{ __('detail.related') }}</h3>
                    <div class="wrap-products">
                        <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5"
                            data-loop="false" data-nav="true" data-dots="false"
                            data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>

                            @foreach ($related_jobs as $related_job)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{ route('job.details', ['slug' => $related_job->slug]) }}"
                                            title="{{ $related_job->name }}">
                                            <figure><img
                                                    src="{{ asset('assets/images/products') }}/{{ $related_job->image }}"
                                                    width="214" height="214" alt="{{ $related_job->name }}"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label"
                                                style="height: 20px; padding-top: 5px;">{{ __('detail.new') }}</span>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{ route('job.details', ['slug' => $related_job->slug]) }}"
                                            title="{{ $related_job->name }}"
                                            class="product-name"><span>{{ $related_job->name }}</span></a>
                                        <div class="wrap-price"><span
                                                class="product-price">{{ __('detail.salary') }}{{ $related_job->regular_salary }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!--End wrap-products-->
                </div>
            </div>

        </div>
        <!--end row-->

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
