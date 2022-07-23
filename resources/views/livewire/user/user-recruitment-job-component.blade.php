<div>
    <main id="main" class="main-site">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="/" class="link">{{ __('recruitment.home') }}</a></li>
                    <li class="item-link"><span>{{ __('recruitment.recruitment') }}</span></li>
                </ul>
            </div>
            <div class=" main-content-area">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wrap-address-billing">
                            <h3 class="box-title">{{ __('recruitment.apply_job') }}</h3>
                            <div class="billing-address">
                                <form enctype="multipart/form-data" wire:submit.prevent="placeRecruitment"
                                    onsubmit="$('#processing').show();">
                                    <div class="form-group row-in-form">
                                        <label for="fname"> <strong>{{ __('recruitment.f_name') }}</strong> <span>*</span></label>
                                        <input type="text" name="fname" value=""
                                            placeholder="{{ __('recruitment.f_name') }}" wire:model="firstname">
                                        @error('firstname')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group row-in-form">
                                        <label for="lname"><strong>{{ __('recruitment.l_name') }}</strong> <span>*</span></label>
                                        <input type="text" name="lname" value=""
                                            placeholder="{{ __('recruitment.l_name') }}" wire:model="lastname">
                                        @error('lastname')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group row-in-form">
                                        <label for="email"><strong>{{ __('recruitment.email') }}</strong> <span>*</span></label>
                                        <input type="email" name="email" value=""
                                            placeholder="{{ __('recruitment.email') }}" wire:model="email">
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group row-in-form">
                                        <label for="phone"> <strong>{{ __('recruitment.mobile') }}</strong> <span>*</span></label>
                                        <input type="text" name="phone" value=""
                                            placeholder="{{ __('recruitment.10') }}" wire:model="mobile">
                                        @error('mobile')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group row-in-form">
                                        <label for="intro"><strong>{{ __('recruitment.intro') }}</strong> <span>*</span></label>
                                        <textarea rows="4" type="text" class="form-control" name="intro" id="intro"
                                            placeholder="{{ __('recruitment.intro') }}" wire:model="intro"></textarea>
                                        @error('intro')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group row-in-form">
                                        <label for="country"> <strong>{{ __('recruitment.country') }}</strong> <span>*</span></label>
                                        <input type="text" name="country" value=""
                                            placeholder="{{ __('recruitment.country') }}" wire:model="country">
                                        @error('country')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group row-in-form">
                                        <label for="province"> <strong>{{ __('recruitment.province') }}</strong> <span>*</span></label>
                                        <input type="text" name="province" value=""
                                            placeholder="{{ __('recruitment.province') }}" wire:model="province">
                                        @error('province')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group row-in-form">
                                        <label for="city"><strong>{{ __('recruitment.city') }}</strong> <span>*</span></label>
                                        <input type="text" name="city" value=""
                                            placeholder="{{ __('recruitment.city') }}" wire:model="city">
                                        @error('city')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group row-in-form">
                                        <label for="file"><strong>{{ __('recruitment.file') }}</strong> <span>*</span></label>
                                        <input type="file" name="file" class="form-control" wire:model="file" />
                                        @error('file')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group row-in-form">
                                        @if ($errors->isEmpty())
                                            <div wire:ignore id="processing"
                                                style="font-size: 22px; margin-bottom:20px; padding-left:37px; color: green; display:none; ">
                                                <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                                <span>{{ __('recruitment.process') }}</span>
                                            </div>
                                        @endif
                                        <div class="summary-item payment-method">
                                            <button type="submit"
                                                class="btn btn-medium">{{ __('recruitment.apply_now') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wrap-show-advance-info-box style-1 box-in-site">
                    <h3 class="title-box">{{ __('recruitment.most_viewed') }}</h3>
                    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5"
                        data-loop="false" data-nav="true" data-dots="false"
                        data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                        @foreach ($top_views as $top_view)
                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail" style="height: 45%">
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
            </div>
            <!--end main content area-->
        </div>
        <!--end container-->
    </main>


    @push('scripts')
        <script>
            window.addEventListener('jobApplied', (e) => {
                alert(e.detail.message);
                $('#processing').hide();
            });
        </script>
    @endpush

</div>
