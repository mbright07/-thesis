<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>	
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chosen.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/color-01.css')}}">
    @livewireStyles
</head>
<body class="home-page home-01 ">

	<!-- mobile menu -->
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>

	<!--header-->
	<header id="header" class="header header-style-1">
		<div class="container-fluid">
			<div class="row">
				<div class="topbar-menu-area">
					<div class="container">
						<div class="topbar-menu left-menu">
							<ul>
							</ul>
						</div>
						<div class="topbar-menu right-menu">
							<ul>
								@if (Route::has('login'))
									@auth
										@if(Auth::user()->utype === 'ADM')
											<li class="menu-item menu-item-has-children parent" >
												<a title="My account" href="#">{{ __('guest.my_account') }}({{ Auth::user()->name }})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
												<ul class="submenu curency" >
													<li class="menu-item" >
														<a title="Dashboard" href="{{ route('admin.dashboard') }}">{{ __('guest.dashboard') }}</a>
													</li>
													<li class="menu-item" >
														<a title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('guest.logout') }}</a>
													</li>
													<form id="logout-form" method="POST" action="{{ route('logout') }}">
														@csrf
														
													</form>
												</ul>
											</li>
										@else
											<li class="menu-item menu-item-has-children parent" >
												<a title="My account" href="#">{{ __('guest.my_account') }} ({{ Auth::user()->name }})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
												<ul class="submenu curency" >
													<li class="menu-item" >
														<a title="Dashboard" href="{{ route('user.dashboard') }}">{{ __('guest.dashboard') }}</a>
													</li>
													<li class="menu-item" >
														<a title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('guest.logout') }}</a>
													</li>
													<form id="logout-form" method="POST" action="{{ route('logout') }}">
														@csrf
														
													</form>
												</ul>
											</li>
										@endif
										
									@else
										<li class="menu-item" ><a title="Register or Login" href="{{ route('login') }}">{{ __('guest.login') }}</a></li>
										<li class="menu-item" ><a title="Register or Login" href="{{ route('register') }}">{{ __('guest.register') }}</a></li>
									@endif
								@endif
								<li class="menu-item lang-menu menu-item-has-children parent">
									<a title="Vietnamese" href="{!! route('change-language', ['vi']) !!}"><span class="img label-before"><img src="/assets/images/lang-vi.jpg" alt="lang-en"></span>{{ __('guest.vietnam') }}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
									<ul class="submenu lang" >
										<li class="menu-item" ><a title="vietnam" href="{!! route('change-language', ['en']) !!}"><span class="img label-before"><img src="/assets/images/lang-en.jpg" alt="lang-hun"></span>{{ __('guest.english') }}</a></li>
										<li class="menu-item" ><a title="japan" href="{!! route('change-language', ['ja']) !!}"><span class="img label-before"><img src="/assets/images/lang-jp.jpg" alt="lang-ger" ></span>{{ __('guest.japan') }}</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="container">
					<div class="mid-section main-info-area">

						<div class="wrap-logo-top left-section">
							<a href="/" class="link-to-home"><img src="{{ asset('assets/images/logo-top-1.png') }}" alt="mercado"></a>
						</div>

						@livewire('header-search-component')

						{{-- <div class="wrap-search center-section">
							<div class="wrap-search-form">
								<form action="#" id="form-search-top" name="form-search-top">
									<input type="text" name="search" value="" placeholder="Search here...">
									<button form="form-search-top" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
									<div class="wrap-list-cate">
										<input type="hidden" name="product-cate" value="0" id="product-cate">
										<a href="#" class="link-control">All locations</a>
										<ul class="list-cate">
											<li class="level-0">All locations</li>
											<li class="level-1">Viet Nam</li>
											<li class="level-2">Ha Noi</li>
											<li class="level-2">Ho Chi Minh</li>
											<li class="level-2">Da Nang</li>
											<li class="level-2">Bac Kan</li>
											<li class="level-2">Bac Giang</li>
											<li class="level-2">Ba Ria Vung Tau</li>
											<li class="level-2">An Giang</li>
											<li class="level-2">Ninh Binh</li>
											<li class="level-1">Japan</li>
											<li class="level-2">Tokyo</li>
											<li class="level-2">Kyoto</li>
											<li class="level-2">Okinawa</li>
											<li class="level-2">Shizuoka</li>
											<li class="level-2">Hokkaido</li>
											<li class="level-2">Osaka</li>
											<li class="level-2">Chiba</li>
										</ul>
									</div>
								</form>
							</div>
						</div> --}}

						<div class="wrap-icon right-section">
							<div class="wrap-icon-section wishlist">
								<a href="#" class="link-direction">
									<i class="fa fa-bell" aria-hidden="true"></i>
									<div class="left-info">
										<span class="index">0</span>
										<span class="title">">{{ __('guest.noti') }}</span>
									</div>
								</a>
							</div>
							<div class="wrap-icon-section minicart">
								<a href="#" class="link-direction">
									<i class="fa fa-comments" aria-hidden="true"></i>
									<div class="left-info">
										<span class="index">4</span>
										<span class="title">{{ __('guest.message') }}</span>
									</div>
								</a>
							</div>
							<div class="wrap-icon-section show-up-after-1024">
								<a href="#" class="mobile-navigation">
									<span></span>
									<span></span>
									<span></span>
								</a>
							</div>
						</div>

					</div>
				</div>

				<div class="nav-section header-sticky">
					<div class="primary-nav-section">
						<div class="container">
							<ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu" >
								<li class="menu-item home-icon">
									<a href="/" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>
								</li>
								<li class="menu-item">
									<a href="/blog" class="link-term mercado-item-title">{{ __('guest.jobs') }}</a>
								</li>
								<li class="menu-item">
									<a href="/cart" class="link-term mercado-item-title">{{ __('guest.bookmark') }}</a>
								</li>
								<li class="menu-item">
									<a href="#" class="link-term mercado-item-title">{{ __('guest.recruitment') }}</a>
								</li>
								<li class="menu-item">
									<a href="#" class="link-term mercado-item-title">{{ __('guest.references') }}</a>
								</li>
								<li class="menu-item">
									<a href="#" class="link-term mercado-item-title">{{ __('guest.about_us') }}/a>
								</li>																	
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	{{$slot}}

	<footer id="footer">
		<div class="wrap-footer-content footer-style-1">

			<div class="wrap-function-info">
				<div class="container">
					<ul>
						<li class="fc-info-item">
							<i class="fa fa-truck" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Job search support</h4>
								<p class="fc-desc">proactive, fast, convenient</p>
							</div>

						</li>
						<li class="fc-info-item">
							<i class="fa fa-check" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">quality jobs</h4>
								<p class="fc-desc">Thousands of high-quality job postings</p>
							</div>

						</li>
						<li class="fc-info-item">
							<i class="fa fa-shield" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Absolute Security & Safety</h4>
								<p class="fc-desc">keep your information secure</p>
							</div>

						</li>
						<li class="fc-info-item">
							<i class="fa fa-life-ring" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Online Suport</h4>
								<p class="fc-desc">We Have Support 24/7</p>
							</div>

						</li>
					</ul>
				</div>
			</div>
			<!--End function info-->

			@livewire('footer-component')

			<div class="coppy-right-box">
				<div class="container">
					<div class="coppy-right-item item-left">
						<p class="coppy-right-text">Copyright © 2020 Trang Hoang. All rights reserved</p>
					</div>
					<div class="coppy-right-item item-right">
						<div class="wrap-nav horizontal-nav">
							<ul>
								<li class="menu-item"><a href="about-us.html" class="link-term">About us</a></li>								
								<li class="menu-item"><a href="privacy-policy.html" class="link-term">Privacy Policy</a></li>
								<li class="menu-item"><a href="terms-conditions.html" class="link-term">Terms & Conditions</a></li>
								<li class="menu-item"><a href="return-policy.html" class="link-term">Return Policy</a></li>								
							</ul>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</footer>
	
	<script src="{{ asset('assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
	<script src="{{ asset('assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.flexslider.js') }}"></script>
	<script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
	<script src="{{ asset('assets/js/functions.js') }}"></script>
    @livewireScripts
</body>
</html>