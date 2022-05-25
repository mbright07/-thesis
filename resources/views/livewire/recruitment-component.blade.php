<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Recruitment</span></li>
            </ul>
        </div>
        <div class=" main-content-area">            
                <div class="row">
                    <div class="col-md-12">
                        <div class="wrap-address-billing">
                            <h3 class="box-title">Apply Job</h3>                     
                            <div class="billing-address">
                                <form enctype="multipart/form-data" wire:submit.prevent="placeRecruitment" onsubmit="$('#processing').show();"> 
                                    <div class="form-group row-in-form">
                                        <label for="fname">first name<span>*</span></label>
                                        <input type="text" name="fname" value="" placeholder="Your name" wire:model="firstname">
                                        @error('firstname') <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                    <div class="form-group row-in-form">
                                        <label for="lname">last name<span>*</span></label>
                                        <input  type="text" name="lname" value="" placeholder="Your last name" wire:model="lastname">
                                        @error('lastname') <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                    <div class="form-group row-in-form">
                                        <label for="email">Email Address<span>*</span></label>
                                        <input type="email" name="email" value="" placeholder="Type your email" wire:model="email">
                                        @error('email') <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                    <div class="form-group row-in-form">
                                        <label for="phone">Phone number<span>*</span></label>
                                        <input type="number" name="phone" value="" placeholder="10 digits format" wire:model="mobile">
                                        @error('mobile') <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                    <div class="form-group row-in-form">
                                        <label for="add">Intro<span>*</span></label>
                                        {{-- <textarea id="comment" name="add" cols="78" rows="8" wire:model="intro"></textarea> --}}
                                        <input type="text" name="add" value="" placeholder="Mo ta ban than" wire:model="intro">
                                        @error('intro') <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                    <div class="form-group row-in-form">
                                        <label for="country">Country<span>*</span></label>
                                        <input type="text" name="country" value="" placeholder="United States" wire:model="country">
                                        @error('country') <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                    <div class="form-group row-in-form">
                                        <label for="province">Province<span>*</span></label>
                                        <input type="text" name="province" value="" placeholder="Province name" wire:model="province">
                                        @error('province') <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                    <div class="form-group row-in-form">
                                        <label for="city">Town / City<span>*</span></label>
                                        <input type="text" name="city" value="" placeholder="City name" wire:model="city">
                                        @error('city') <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                    <div class="form-group row-in-form">
                                        <label for="file">File<span>*</span></label>
                                        <input type="file" name="file" class="form-control" wire:model="file"/>
                                        @error('file') <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                    @if ($errors->isEmpty())
                                        <div wire:ignore id="processing" style="font-size: 22px; margin-bottom:20px; padding-left:37px; color: green; display:none; ">
                                            <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                            <span>Processing...</span>
                                        </div>
                                    @endif
                                    <div class="summary-item payment-method">
                                        <button type="submit" class="btn btn-medium">Recruiment now</button>
                                    </div> 
                                </form>   
                            </div>                        
                        </div>
                    </div>
                </div>

            <div class="wrap-show-advance-info-box style-1 box-in-site">
                <h3 class="title-box">Most Viewed Jobs</h3>
                <div class="wrap-products">
                    <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset ('assets/images/products/digital_3.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Điều dưỡng viên tại bệnh viện Hà Nội </span></a>
                                <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset ('assets/images/products/digital_2.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Điều dưỡng viên tại bệnh viện Hà Nội </span></a>
                                <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset ('assets/images/products/digital_1.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Điều dưỡng viên tại bệnh viện Hà Nội </span></a>
                                <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                            </div>
                        </div><div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset ('assets/images/products/digital_8.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Điều dưỡng viên tại bệnh viện Hà Nội </span></a>
                                <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset ('assets/images/products/digital_7.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Điều dưỡng viên tại bệnh viện Hà Nội </span></a>
                                <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset ('assets/images/products/digital_6.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Điều dưỡng viên tại bệnh viện Hà Nội </span></a>
                                <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset ('assets/images/products/digital_5.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Điều dưỡng viên tại bệnh viện Hà Nội </span></a>
                                <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset ('assets/images/products/digital_4.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Điều dưỡng viên tại bệnh viện Hà Nội </span></a>
                                <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset ('assets/images/products/digital_3.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Điều dưỡng viên tại bệnh viện Hà Nội </span></a>
                                <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset ('assets/images/products/digital_2.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Điều dưỡng viên tại bệnh viện Hà Nội </span></a>
                                <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset ('assets/images/products/digital_1.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Điều dưỡng viên tại bệnh viện Hà Nội </span></a>
                                <div class="wrap-price"><ins><p class="product-price">Lương: $168.00</p></ins></div>
                            </div>
                        </div>
                    </div>
                </div><!--End wrap-products-->
            </div>
        </div><!--end main content area-->
    </div><!--end container-->
</main>
