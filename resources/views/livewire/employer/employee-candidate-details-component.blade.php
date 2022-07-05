<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">{{ __('detail.home') }}</a></li>
                <li class="item-link"><span>{{ __('detail.detail') }}</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                <div class="wrap-product-detail">
                    <div class="detail-media">
                        <img src="{{ asset('assets/images/products') }}/{{ $user->profile->image }}" alt="{{ $user->name }}"
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
                               wire:click.prevent="Recruitment">{{ __('detail.apply_now') }}</a>
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
                                @if($user->role_id == 3)
                                    <div class="col-sm-3">
                                        <div class="text-center">
                                            <img src="{{ asset('/assets/images/profile') }}/{{ $user->profile->image }}"
                                                 class="avatar img-circle img-thumbnail" alt="avatar">
                                        </div>
                                        <div class="row text-center">
                                            <div class="col-sm-12" class="text-center">
                                                <h2>{{ $user->name }}</h2>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="panel panel-default">
                                            <div class="panel-heading">Social Media</div>
                                            <div class="panel-body">
                                                <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i
                                                    class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i
                                                    class="fa fa-google-plus fa-2x"></i>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row text-center">
                                            <div class="col-sm-12" class="text-center">
                                                <h2>{{ $user->profile->email }}</h2>
                                            </div>
                                            <div class="col-sm-12" class="text-center">
                                                <h2>{{ $user->profile->mobile }}</h2>
                                            </div>
                                            <div class="col-sm-12" class="text-center">
                                                <h2>{{ $user->profile->address }}</h2>
                                            </div>
                                            <div class="col-sm-12" class="text-center">
                                                <h2>{{ $user->profile->intro }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                @endif
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

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--end row-->

    </div>
    <!--end container-->

</main>
