<main id="main" class="main-site left-sidebar">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('employer.home') }}" class="link">{{ __('search.home') }}</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                <div class="row" style="margin-top:15px ">
                    @php
                        $witems = Cart::instance('wishlist')
                            ->content()
                            ->pluck('id');
                    @endphp
                    @foreach ($lcandidates as $lcandidate)
                        <div class="col-md-6" style="width: 49%; margin-left: 10px">
                            <div class="job-offers">
                                <div class="row pt-5">
                                    <div class="offert-wrapper">
                                        <div class="offert">
                                            <div>
                                                <div class="offert-description">
                                                    <div class="company-logo">
                                                        <a href="{{ route('employer.candidate.details', ['user_id' => $lcandidate->id]) }}"
                                                            title="{{ $lcandidate->name }}">
                                                            @if ($lcandidate->profile && $lcandidate->profile->image)
                                                                <figure><img
                                                                        src="{{ asset('/assets/images/profile') }}/{{ $lcandidate->profile->image }}"
                                                                        alt="{{ $lcandidate->name }}">
                                                                </figure>
                                                            @else
                                                                <figure><img
                                                                        src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
                                                                        alt="{{ $lcandidate->name }}">
                                                                </figure>
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="description">
                                                        <p class="company-name">
                                                            <a href="{{ route('employer.candidate.details', ['user_id' => $lcandidate->id]) }}"
                                                                class="product-name"><span>{{ $lcandidate->name }}</span></a>
                                                        </p>
                                                        <p class="description">{{ $lcandidate->profile ? $lcandidate->profile->intro : '' }}</p>
                                                    </div>
                                                </div>
                                                <div class="offert-meta">
                                                    <p class="location">
                                                        <i class="fa fa-map-marker" aria-hidden="true"
                                                            style="color: #ff2832"></i>
                                                        @if ($lcandidate->workPreference)
                                                            @foreach ($lcandidate->workPreference as $item)
                                                               <strong>{{ $item->expected_location_name }}</strong>
                                                            @endforeach
                                                        @endif
                                                    </p>
                                                    <a href="#"
                                                        wire:click.prevent="company({{ $lcandidate->id }},'{{ $lcandidate->name }}',{{ json_encode($lcandidate->workPreference) }})"
                                                        class="main-btn">{{ __('search.bookmark') }}</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="wrap-pagination-info">
                    {{ $lcandidates->links('pagination::bootstrap-4') }}
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget mercado-widget filter-widget price-filter">
                    <h2 class="widget-title">Expected Salary</h2>
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
            </div>

        </div>
    </div>
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
