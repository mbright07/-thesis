<main id="main" class="main-site">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('employer.home') }}" class="link">{{ __('detail.home') }}</a>
                </li>
                <li class="item-link"><span>{{ __('detail.detail') }}</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12 main-content-area">
                <div class="wrap-product-detail">
                    <div class="container-details">
                        <div class="detail-media" style="width: 25%; float:left">
                            @if ($user->profile && $user->profile->image)
                                <img src="{{ asset('assets/images/profile') }}/{{ $user->profile->image }}"
                                    alt="{{ $user->name }}" height="300" width="300" />
                            @else
                                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" width="300"
                                    height="300" alt="{{ $user->name }}" />
                            @endif
                        </div>

                        <div class="detail-info" style="width: 40%; ">
                            <div class="product-rating">
                                <style>
                                    .color-gray {
                                        color: #e6e6e6 !important;
                                    }
                                </style>
                                {{-- @php
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
                                @endfor --}}
                                <a href="#" class="count-review">(
                                    {{ __('detail.review') }})</a>
                            </div>

                            <div class="short-desc">
                                <h2 class="product-name">{{ $user->name }}</h2>
                                <h5><i class="fa fa-eye" aria-hidden="true"></i>
                                    {{ $user->totalviews }}</h5>
                                <table class="table table-bordered">
                                    <thead>
                                        <th>{{ __('employee/home.expected_location') }}</th>
                                        <th>{{ __('detail.salary') }}</th>
                                    </thead>
                                    <tbody>
                                        @if ($user->workPreference)
                                            @foreach ($user->workPreference as $item)
                                                <tr>
                                                    <td>
                                                        {{ $item->expected_location_name }}
                                                    </td>
                                                    <td>
                                                        {{ $item->expected_salary }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="stock-info in-stock">
                                <p class="availability">
                                    <i class="fa fa-check" aria-hidden="true"></i>:
                                    <b>{{ $available ? 'Available' : 'Unavailable' }}</b>
                                </p>
                            </div>
                            <div class="wrap-butons" style="margin-top: -30px;">
                                <a href="#" class="btn add-to-cart"
                                    wire:click.prevent="company({{ $user->id }},'{{ $user->name }}',{{ json_encode($user->workPreference) }})">{{ __('detail.bookmark') }}</a>
                            </div>
                        </div>

                        <div class="widget widget-our-services " style="width: 30%; float: right;">
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
                        </div>
                    </div>
                    <div class="advance-info">
                        <div class="tab-control normal">
                            <a href="#description" class="tab-control-item active">{{ __('detail.cv') }}</a>
                            <a href="#add_infomation" class="tab-control-item">{{ __('detail.can_info') }}</a>
                            <a href="#review" class="tab-control-item">{{ __('detail.review') }}</a>
                        </div>
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="description">
                                @include('livewire.employer.employee-candidate-resume-component')
                            </div>

                            <div class="tab-content-item " id="add_infomation">
                                <div class="col-sm-9">
                                    <div class="tab-content">
                                        <ul class="list-in-text">
                                            <li><i class="fa fa-user" aria-hidden="true"></i> {{ $user->name }}</li>
                                            <li><i class="fa fa-envelope" aria-hidden="true"></i> {{ $user->email }}
                                            </li>
                                            <li><i class="fa fa-phone" aria-hidden="true"></i>
                                                {{ $user->profile ? $user->profile->mobile : '' }}</li>
                                            <li><i class="fa fa-map-marker" aria-hidden="true"></i>
                                                {{ $user->profile ? $user->profile->address : '' }}</li>
                                            <li><i class="fa fa-info-circle" aria-hidden="true"></i>
                                                <cite>{{ $user->profile ? $user->profile->intro : '' }}</cite>
                                            </li>
                                        </ul>
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
                                    {{-- <div id="comments">
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
                                    </div> --}}

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
