<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">{{ __('admin/admin-recruitment.re_job_detail') }}</div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.recruitments') }}" class="btn btn-success pull-right">{{ __('admin/admin-recruitment.all_recruitments') }} </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>{{ __('admin/admin-recruitment.id') }}</th>
                                <td>{{ $recruitment->id }}</td>
                                <th>{{ __('admin/admin-recruitment.re_date') }}</th>
                                <td>{{ $recruitment->created_at }}</td>
                                <th>{{ __('admin/admin-recruitment.status') }}</th>
                                <td>{{ $recruitment->status }}</td>
                                @if ($recruitment->status == "processing")
                                    <th>{{ __('admin/admin-recruitment.process') }}</th>
                                    <td>{{ $recruitment->processed_date }}</td>
                                @elseif ($recruitment->status == "canceled")
                                    <th>{{ __('admin/admin-recruitment.cancel') }}</th>
                                    <td>{{ $recruitment->canceled_date }}</td>
                                @endif

                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">{{ __('admin/admin-recruitment.re_job') }}</div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="wrap-iten-in-cart">
                            <h3 class="box-title">{{ __('admin/admin-recruitment.job_name') }}</h3>
                            <ul class="products-cart">
                                @foreach ($recruitment->recruitmentJob as $item )
                                    <li class="pr-cart-item">
                                        <div class="product-image">
                                            <figure><img src="{{ asset('/assets/images/products') }}/{{ $item->job->image }}" alt="{{ $item->job->image }}"></figure>
                                        </div>
                                        <div class="product-name">
                                            <a class="link-to-product" href="{{ route('job.details',['slug'=>$item->job->slug]) }}">{{ $item->job->name }}</a>
                                        </div>
                                        <div class="price-field product-price"><p class="price">{{ __('admin/admin-recruitment.salary') }}{{ $item->job->regular_salary }}</p></div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="wrap-iten-in-cart">

                            <h3 class="box-title">{{ __('admin/admin-recruitment.cv_detail') }}</h3>
                            <table class="table table-striped table-bordered" style="width:90%; margin-left:5%;">
                                <tr>
                                    <th>{{ __('admin/admin-recruitment.full_name') }}</th>
                                    <td>{{ $recruitment->firstname }} {{ $recruitment->lastname }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('admin/admin-recruitment.email') }}</th>
                                    <td>{{ $recruitment->email }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('admin/admin-recruitment.mobile') }}</th>
                                    <td>{{ $recruitment->mobile }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('admin/admin-recruitment.mobile') }}</th>
                                    <td>{{ $recruitment->city }} - {{ $recruitment->province }} - {{ $recruitment->country }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('admin/admin-recruitment.cv') }}</th>
                                    <td><a href="{{ URL::asset('/assets/images/recruitments')}}/{{ $recruitment->file }}">{{ $recruitment->file }}</a></td>
                                    {{-- <iframe src="{{ URL::asset('/assets/images/recruitments')}}/{{ $recruitment->file }}"></iframe> --}}
                                </tr>
                                <tr>
                                    <th>{{ __('admin/admin-recruitment.intro') }}</th>
                                    <td>{{ $recruitment->intro }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
