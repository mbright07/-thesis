<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('recruitment_message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('recruitment_message') }}</div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">{{ __('user/user-recruitment.re_job_detail') }}</div>
                            <div class="col-md-6">
                                <a href="{{ route('user.recruitments') }}" class="btn btn-success pull-right">{{ __('user/user-recruitment.my_recruitments') }} </a>
                                @if ($recruitment->status == 'pending' || $recruitment->status == 'processing')
                                    <a href="#" onclick="confirm('{{ __('user/user-recruitment.sure') }}') || event.stopImmediatePropagation()" wire:click.prevent="updateRecruitmentStatus({{ $recruitment->id }},'canceled')" class="btn btn-warning pull-right" style="margin-right: 20px;">{{ __('user/user-recruitment.cancel_recruitment') }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <th>{{ __('user/user-recruitment.id') }}</th>
                            <td>{{ $recruitment->id }}</td>
                            <th>{{ __('user/user-recruitment.re_date') }}</th>
                            <td>{{ $recruitment->created_at }}</td>
                            <th>{{ __('user/user-recruitment.status') }}</th>
                            <td>{{ $recruitment->status }}</td>
                            @if ($recruitment->status == "processing")
                                <th>{{ __('user/user-recruitment.process') }}</th>
                                <td>{{ $recruitment->processed_date }}</td>
                            @elseif ($recruitment->status == "canceled")
                                <th>{{ __('user/user-recruitment.cancel') }}</th>
                                <td>{{ $recruitment->canceled_date }}</td>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body">
                        <div class="wrap-iten-in-cart">
                            <h3 class="box-title">{{ __('user/user-recruitment.re_job') }}</h3>
                            <ul class="products-cart">
                                @foreach ($recruitment->recruitmentJob as $item )
                                    <li class="pr-cart-item">
                                        <div class="product-image">
                                            <figure><img src="{{ asset('/assets/images/products') }}/{{ $item->job->image }}" alt="{{ $item->job->image }}"></figure>
                                        </div>
                                        <div class="product-name">
                                            <a class="link-to-product" href="{{ route('job.details',['slug'=>$item->job->slug]) }}">{{ $item->job->name }}</a>
                                        </div>
                                        <div class="price-field product-price"><p class="price">{{ __('user/user-recruitment.salary') }}{{ $item->job->regular_salary }}</p></div>
                                            <div class="price-field sub-total"><p class="price"><a href="{{ route('user.review',['recruitment_job_id'=>$item->id]) }}">{{ __('user/user-recruitment.write_review') }}</a></p></div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="wrap-iten-in-cart">

                            <h3 class="box-title">{{ __('user/user-recruitment.cv_detail') }}</h3>
                            <table class="table table-striped table-bordered" style="width:90%; margin-left:5%;">
                                <tr>
                                    <th>{{ __('user/user-recruitment.full_name') }}</th>
                                    <td>{{ $recruitment->firstname }} {{ $recruitment->lastname }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('user/user-recruitment.email') }}</th>
                                    <td>{{ $recruitment->email }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('user/user-recruitment.mobile') }}</th>
                                    <td>{{ $recruitment->mobile }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('user/user-recruitment.address') }}</th>
                                    <td>{{ $recruitment->city }} - {{ $recruitment->province }} - {{ $recruitment->country }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('user/user-recruitment.cv') }}</th>
                                    <td><a href="{{ URL::asset('/assets/images/recruitments')}}/{{ $recruitment->file }}">{{ $recruitment->file }}</a></td>
                                </tr>
                                <tr>
                                    <th>{{ __('user/user-recruitment.intro') }}</th>
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
