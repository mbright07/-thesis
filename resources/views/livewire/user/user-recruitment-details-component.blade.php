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
                            <div class="col-md-6">Recruitment Job Details</div>
                            <div class="col-md-6">
                                <a href="{{ route('user.recruitments') }}" class="btn btn-success pull-right">My recruitments </a>
                                @if ($recruitment->status == 'pending' || $recruitment->status == 'processing')
                                    <a href="#" onclick="confirm('Are you sure, You want to delete this job?') || event.stopImmediatePropagation()" wire:click.prevent="cancelRecruitment" class="btn btn-warning pull-right" style="margin-right: 20px;">Cancel Recruitment</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <th>Recruitment ID</th>
                            <td>{{ $recruitment->id }}</td>
                            <th>Recruitment Date</th>
                            <td>{{ $recruitment->created_at }}</td>
                            <th>Status</th>
                            <td>{{ $recruitment->status }}</td>
                            @if ($recruitment->status == "processing")
                                <th>Processing</th>
                                <td>{{ $recruitment->processed_date }}</td>
                            @elseif ($recruitment->status == "canceled")
                                <th>Caneled</th>                                    
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
                            <h3 class="box-title">Jobs Name</h3>
                            <ul class="products-cart">    
                                @foreach ($recruitment->recruitmentJob as $item )
                                    <li class="pr-cart-item">
                                        <div class="product-image">
                                            <figure><img src="{{ asset('/assets/images/products') }}/{{ $item->job->image }}" alt="{{ $item->job->image }}"></figure>
                                        </div>
                                        <div class="product-name">
                                            <a class="link-to-product" href="{{ route('job.details',['slug'=>$item->job->slug]) }}">{{ $item->job->name }}</a>
                                        </div>
                                        <div class="price-field produtc-price"><p class="price">Salary: ${{ $item->job->regular_salary }}</p></div>
                                        @if ($item->rstatus == false)
                                            <div class="price-field sub-total"><p class="price"><a href="{{ route('user.review',['recruitment_job_id'=>$item->id]) }}">Write Review</a></p></div>
                                        @endif 
                                    </li>
                                @endforeach							
                            </ul>
                        </div>
                        <div class="wrap-iten-in-cart">
                            
                            <h3 class="box-title">CV Detail</h3>
                            <table class="table table-striped table-bordered" style="width:90%; margin-left:5%;">
                                <tr>
                                    <th>Họ Và Tên</th>
                                    <td>{{ $recruitment->firstname }} {{ $recruitment->lastname }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $recruitment->email }}</td>
                                </tr>
                                <tr>
                                    <th>Mobile</th>
                                    <td>{{ $recruitment->mobile }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $recruitment->city }} - {{ $recruitment->province }} - {{ $recruitment->country }}</td>
                                </tr>
                                <tr>
                                    <th>CV</th>
                                    <td><a href="{{ URL::asset('/assets/images/recruitments')}}/{{ $recruitment->file }}">{{ $recruitment->file }}</a></td>
                                </tr>
                                <tr>
                                    <th>Intro</th>
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
