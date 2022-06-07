<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ __('user/user-recruitment.all_recruitment') }}
                    </div>
                
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('user/user-recruitment.stt') }}</th>
                                    <th>{{ __('user/user-recruitment.f_name') }}</th>
                                    <th>{{ __('user/user-recruitment.l_name') }}</th>
                                    <th>{{ __('user/user-recruitment.email') }}</th>
                                    <th>{{ __('user/user-recruitment.mobile') }}</th>
                                    <th>{{ __('user/user-recruitment.intro') }}</th>
                                    <th>{{ __('user/user-recruitment.city') }}</th>
                                    <th>{{ __('user/user-recruitment.province') }}</th>
                                    <th>{{ __('user/user-recruitment.country') }}</th>
                                    <th>{{ __('user/user-recruitment.cv') }}</th>
                                    <th>{{ __('user/user-recruitment.status') }}</th>
                                    <th>{{ __('user/user-recruitment.re_date') }}</th>
                                    <th>{{ __('user/user-recruitment.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recruitments as $recruitment)
                                    <tr>
                                        <td>{{ $recruitment->id }}</td>
                                        <td>{{ $recruitment->firstname }}</td>
                                        <td>{{ $recruitment->lastname }}</td>
                                        <td>{{ $recruitment->email }}</td>
                                        <td>{{ $recruitment->mobile }}</td>
                                        <td>{{substr($recruitment->intro, 0, 35)}}</td>
                                        <td>{{ $recruitment->country }}</td>
                                        <td>{{ $recruitment->province }}</td>
                                        <td>{{ $recruitment->city }}</td>
                                        <td><a href="{{ URL::asset('/assets/images/recruitments')}}/{{ $recruitment->file }}">{{ $recruitment->file }}</a></td>
                                        <td><strong>{{ $recruitment->status }}</strong></td>
                                        <td>{{ $recruitment->created_at }}</td>
                                        <td><a href="{{ route('user.recruitmentdetails',['recruitment_id'=>$recruitment->id]) }}" class="btn btn-info btn-sm">{{ __('user/user-recruitment.detail') }}</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $recruitments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
