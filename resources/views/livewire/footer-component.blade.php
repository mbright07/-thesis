<div>
    <footer id="footer">
        <div class="wrap-footer-content footer-style-1">

            <div class="wrap-function-info">
                <div class="container">
                    <ul>
                        <li class="fc-info-item">
                            <i class="fa fa-truck" aria-hidden="true"></i>
                            <div class="wrap-left-info">
                                <h4 class="fc-name">{{ __('footer.job_search_support') }}</h4>
                                <p class="fc-desc">{{ __('footer.fast') }}</p>
                            </div>

                        </li>
                        <li class="fc-info-item">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            <div class="wrap-left-info">
                                <h4 class="fc-name">{{ __('footer.quality') }}</h4>
                                <p class="fc-desc">{{ __('footer.high-quality') }}</p>
                            </div>

                        </li>
                        <li class="fc-info-item">
                            <i class="fa fa-shield" aria-hidden="true"></i>
                            <div class="wrap-left-info">
                                <h4 class="fc-name">{{ __('footer.security') }}</h4>
                                <p class="fc-desc">{{ __('footer.secure') }}</p>
                            </div>

                        </li>
                        <li class="fc-info-item">
                            <i class="fa fa-life-ring" aria-hidden="true"></i>
                            <div class="wrap-left-info">
                                <h4 class="fc-name">{{ __('footer.online_support') }}</h4>
                                <p class="fc-desc">{{ __('footer.we') }}</p>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>
            <!--End function info-->

            <div class="main-footer-content">

                <div class="container">

                    <div class="row">

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
							<div class="wrap-footer-item">
								<h3 class="item-header">{{ __('footer.contact_details') }}</h3>
								<div class="item-content">
									<div class="wrap-contact-detail">
										<ul>
											<li>
												<i class="fa fa-map-marker" aria-hidden="true"></i>
												<p class="contact-txt">{{ $setting ? $setting->address : '' }}</p>
											</li>
											<li>
												<i class="fa fa-phone" aria-hidden="true"></i>
												<p class="contact-txt">{{ $setting ? $setting->phone : '' }}</p>
											</li>
											<li>
												<i class="fa fa-envelope" aria-hidden="true"></i>
												<p class="contact-txt">{{ $setting ? $setting->email : '' }}</p>
											</li>											
										</ul>
									</div>
								</div>
							</div>
						</div>

                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">


							<div class="wrap-footer-item">
								<h3 class="item-header">{{ __('footer.hot_line') }}</h3>
								<div class="item-content">
									<div class="wrap-hotline-footer">
										<span class="desc">{{ __('footer.call') }}</span>
										<b class="phone-number">{{ $setting ? $setting->phone2 : '' }}</b>
									</div>
								</div>
							</div>

                            <div class="wrap-footer-item footer-item-second">
                                <h3 class="item-header">{{ __('footer.sign_up') }}</h3>
                                <div class="item-content">
                                    <div class="wrap-newletter-footer">
                                        <form action="#" class="frm-newletter" id="frm-newletter">
                                            <input type="email" class="input-email" name="email" value=""
                                                placeholder="Enter your email address">
                                            <button class="btn-submit">{{ __('footer.subscribe') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12 box-twin-content ">
                            <div class="row">
                                {{-- <div class="wrap-footer-item twin-item">
                                    <h3 class="item-header">My Account</h3>
                                    <div class="item-content">
                                        <div class="wrap-vertical-nav">
                                            <ul>
                                                <li class="menu-item"><a href="#" class="link-term">My Account</a></li>
                                                <li class="menu-item"><a href="#" class="link-term">My CV</a>
                                                </li>
                                                <li class="menu-item"><a href="#" class="link-term">Noti</a>
                                                </li>
                                                <li class="menu-item"><a href="#"
                                                        class="link-term">Message</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="wrap-footer-item twin-item">
                                    <h3 class="item-header">{{ __('footer.info') }}</h3>
                                    <div class="item-content">
                                        <div class="wrap-vertical-nav">
                                            <ul>
                                                <li class="menu-item"><a href="{{ route('contact-us') }}"
                                                        class="link-term">{{ __('footer.contact_us') }}</a></li>
                                                <li class="menu-item"><a href="#" class="link-term">{{ __('footer.return') }}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                            <div class="wrap-footer-item">
                                <h3 class="item-header">{{ __('footer.we_use') }}</h3>
                                <div class="item-content">
                                    <div class="wrap-list-item wrap-gallery">
                                        <img src="/assets/images/payment.png" style="max-width: 260px;">
                                    </div>
                                </div>
                            </div>
                        </div>

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
							<div class="wrap-footer-item">
								<h3 class="item-header">{{ __('footer.social') }}</h3>
								<div class="item-content">
									<div class="wrap-list-item social-network">
										<ul>
											<li><a href="{{ $setting ? $setting->twitter : '' }}" class="link-to-item" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
											<li><a href="{{ $setting ? $setting->facebook : '' }}" class="link-to-item" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
											<li><a href="{{ $setting ? $setting->pinterest : '' }}" class="link-to-item" title="pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
											<li><a href="{{ $setting ? $setting->instagram : '' }}" class="link-to-item" title="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>

                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                            <div class="wrap-footer-item">
                                <h3 class="item-header">{{ __('footer.download') }}</h3>
                                <div class="item-content">
                                    <div class="wrap-list-item apps-list">
                                        <ul>
                                            <li>
                                                <a href="#" class="link-to-item"
                                                    title="our application on apple store">
                                                    <figure><img src="/assets/images/brands/apple-store.png"
                                                            alt="apple store" width="128" height="36"></figure>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="link-to-item"
                                                    title="our application on google play store">
                                                    <figure><img src="/assets/images/brands/google-play-store.png"
                                                            alt="google play store" width="128" height="36"></figure>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="coppy-right-box">
                <div class="container">
                    <div class="coppy-right-item item-left">
                        <p class="coppy-right-text">{{ __('footer.copyright') }}</p>
                    </div>
                    {{-- <div class="coppy-right-item item-right">
                        <div class="wrap-nav horizontal-nav">
                            <ul>
                                <li class="menu-item"><a href="about-us.html" class="link-term">About us</a>
                                </li>
                                <li class="menu-item"><a href="privacy-policy.html"
                                        class="link-term">Privacy Policy</a></li>
                                <li class="menu-item"><a href="terms-conditions.html"
                                        class="link-term">Terms & Conditions</a></li>
                                <li class="menu-item"><a href="return-policy.html" class="link-term">Return
                                        Policy</a></li>
                            </ul>
                        </div>
                    </div> --}}
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </footer>
</div>
