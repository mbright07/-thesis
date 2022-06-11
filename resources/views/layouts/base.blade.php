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
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flexslider.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chosen.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/color-01.css')}}">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.0/nouislider.min.css" integrity="sha512-qveKnGrvOChbSzAdtSs8p69eoLegyh+1hwOMbmpCViIwj7rn4oJjdmMvWOuyQlTOZgTlZA0N2PXA7iA8/2TUYA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	{{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
	{{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
	{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}

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
												<a title="My account" href="#">{{ __('base.my_account') }} ({{ Auth::user()->name }})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
												<ul class="submenu curency" >
													<li class="menu-item" >
														<a title="Dashboard" href="{{ route('admin.dashboard') }}">{{ __('base.dashboard') }}</a>
													</li>
													<li class="menu-item">
														<a title="Categories" href="{{ route('admin.categories') }}">{{ __('base.categories') }}</a>
													</li>
													<li class="menu-item" >
														<a title="Jobs" href="{{ route('admin.jobs') }}">{{ __('base.all_jobs') }}</a>
													</li>
													<li class="menu-item" >
														<a title="Manage Home Slider" href="{{ route('admin.homeslider') }}">{{ __('base.manage_home_slider') }}</a>
													</li>
													<li class="menu-item" >
														<a title="Manage Home Categories" href="{{ route('admin.homecategories') }}">{{ __('base.manage_home_categories') }}</a>
													</li>
													<li class="menu-item" >
														<a title="All Recruitments" href="{{ route('admin.recruitments') }}">{{ __('base.all_recruitments') }}</a>
													</li>
													<li class="menu-item" >
														<a title="Contact Messages" href="{{ route('admin.contact') }}">{{ __('base.contact_messages') }}</a>
													</li>
													<li class="menu-item" >
														<a title="Settings" href="{{ route('admin.settings') }}">{{ __('base.settings') }}</a>
													</li>
													<li class="menu-item" >
														<a title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('base.logout') }}</a>
													</li>
													<form id="logout-form" method="POST" action="{{ route('logout') }}">
														@csrf
														
													</form>
												</ul>
											</li>
										@else
											<li class="menu-item menu-item-has-children parent" >
												<a title="My account" href="#">{{ __('base.my_account') }} ({{ Auth::user()->name }})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
												<ul class="submenu curency" >
													<li class="menu-item" >
														<a title="Dashboard" href="{{ route('user.dashboard') }}">{{ __('base.dashboard') }}</a>
													</li>
													<li class="menu-item" >
														<a title="My Profile" href="{{ route('user.profile') }}">{{ __('base.my_profile') }}</a>
													</li>
													<li class="menu-item" >
														<a title="My Recruitments" href="{{ route('user.recruitments') }}">{{ __('base.my_recruitments') }}</a>
													</li>
													<li class="menu-item" >
														<a title="Change Password" href="{{ route('user.changepassword') }}">{{ __('base.change_password') }}</a>
													</li>
													<li class="menu-item" >
														<a title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('base.logout') }}</a>
													</li>
													<form id="logout-form" method="POST" action="{{ route('logout') }}">
														@csrf
														
													</form>
												</ul>
											</li>
										@endif
										
									@else
										<li class="menu-item" ><a title="Register or Login" href="{{ route('login') }}">{{ __('base.login') }}</a></li>
										<li class="menu-item" ><a title="Register or Login" href="{{ route('register') }}">{{ __('base.register') }}</a></li>
									@endif
								@endif

								<li class="menu-item lang-menu menu-item-has-children parent">
									<a title="Language" href="#"><i class="fa fa-angle-down" aria-hidden="true"></i> {{ __('base.language') }}</a>
									<ul class="submenu lang" >
										<li class="menu-item" ><a title="Vietnamese" href="{!! route('change-language', ['vi']) !!}"><span class="img label-before"><img src="/assets/images/lang-vi.jpg" alt="lang-vi"></span>{{ __('base.vietnam') }}</a></li>
										<li class="menu-item" ><a title="English" href="{!! route('change-language', ['en']) !!}"><span class="img label-before"><img src="/assets/images/lang-en.jpg" alt="lang-en"></span>{{ __('base.english') }}</a></li>
										<li class="menu-item" ><a title="Japanese" href="{!! route('change-language', ['ja']) !!}"><span class="img label-before"><img src="/assets/images/lang-jp.jpg" alt="lang-ja" ></span>{{ __('base.japan') }}</a></li>
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

						<div class="wrap-icon right-section">
							@livewire('wishlist-count-component')
							<div class="wrap-icon-section wishlist">
								<a href="#" class="link-direction">
									<i class="fa fa-bell" aria-hidden="true"></i>
									<div class="left-info">
										<span class="index">0</span>
										<span class="title">{{ __('base.noti') }}</span>
									</div>
								</a>
							</div>
							<div class="wrap-icon-section minicart">
								<a href="#" class="link-direction">
									<i class="fa fa-comments" aria-hidden="true"></i>
									<div class="left-info">
										<span class="index">4</span>
										<span class="title">{{ __('base.message') }}</span>
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
									<a href="/blog" class="link-term mercado-item-title">{{ __('base.jobs') }}</a>
								</li>
								<li class="menu-item">
									<a href="/bookmark" class="link-term mercado-item-title">{{ __('base.bookmark') }}</a>
								</li>
								<li class="menu-item">
									<a href="/recruitment" class="link-term mercado-item-title">{{ __('base.recruitment') }}</a>
								</li>
								<li class="menu-item">
									<a href="#" class="link-term mercado-item-title">{{ __('base.references') }}</a>
								</li>
								<li class="menu-item">
									<a href="#" class="link-term mercado-item-title">{{ __('base.about_us') }}</a>
								</li>
								<li class="menu-item">
									<a href="/contact-us" class="link-term mercado-item-title">{{ __('base.contact_us') }}</a>
								</li>																	
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	{{$slot}}

	@livewire('footer-component')
	
	<script src="{{ asset('assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
	<script src="{{ asset('assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.flexslider.js') }}"></script>
	<script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
	<script src="{{ asset('assets/js/functions.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.0/nouislider.min.js" integrity="sha512-1mDhG//LAjM3pLXCJyaA+4c+h5qmMoTc7IuJyuNNPaakrWT9rVTxICK4tIizf7YwJsXgDC2JP74PGCc7qxLAHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.tiny.cloud/1/00di8v0f0v7k10qxofzw3djgapgkxw88x6p0e8yuhk9prsjm/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
	{{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
	<!------ Include the above in your HEAD tag ---------->
	{{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> --}}
	{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
	<!------ Include the above in your HEAD tag ---------->
	{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}

	@livewireScripts

	@stack('scripts')
</body>
</html>