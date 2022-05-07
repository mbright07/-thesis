<main id="main" class="main-site left-sidebar">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Wishlist</span></li>
            </ul>
        </div>
        <div class="row">
            @if(Cart::instance('wishlist')->content()->count() > 0)      
                <ul class="product-list grid-products equal-container">
                    @foreach (Cart::instance('wishlist')->content() as $job)
                        <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="{{ route('job.details', ['slug'=>$job->model->slug]) }}" title={{ $job->model->name }}>
                                        <figure><img src="{{ asset ('assets/images/products') }}/{{ $job->model->image }}" width="800" height="800" alt="{{ $job->model->name }}"></figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item bestseller-label">Hot</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="{{ route('job.details', ['slug'=>$job->model->slug]) }}" class="product-name"><span>{{ $job->model->name }}</span></a>
                                    <div class="wrap-price"><ins><p class="product-price">Salary: ${{ $job->model->regular_salary }}</p></ins></div>
                                    <div class="product-wish">
                                        <a href="#" wire:click.prvent="removeFromWishlist({{ $job->model->id}})"><i class="fa fa-heart fill-heart"></i></a>
                                    </div>    
                                </div>
                                <div class="addcart">
                                    <div class="bookmark">
                                        <a href="#" class="btn add-to-cart" wire:click.prevent="moveJobFromWishlistToBookmark('{{ $job->rowId}}')">Bookmark</a>
                                    </div>
                                    <div class="choice">
                                        <a href="#" class="btn add-to-cart">Ứng tuyển ngay</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <h4>No job in wishlist</h4>
            @endif
        </div>
    </div>
</main>
