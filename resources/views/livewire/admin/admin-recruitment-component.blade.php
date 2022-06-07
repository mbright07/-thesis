<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding: 30px 0; width: 99%;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ __('admin/admin-recruitment.all_recruitments') }}
                    </div>                
                    <div class="panel-body" style="margin-left: -10px;">
                        @if (Session::has('recruitment_message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('recruitment_message') }}</div>   
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('admin/admin-recruitment.stt') }}</th>
                                    <th>{{ __('admin/admin-recruitment.f_name') }}</th>
                                    <th>{{ __('admin/admin-recruitment.l_name') }}</th>
                                    <th>{{ __('admin/admin-recruitment.email') }}</th>
                                    <th>{{ __('admin/admin-recruitment.mobile') }}</th>
                                    <th>{{ __('admin/admin-recruitment.intro') }}</th>
                                    <th>{{ __('admin/admin-recruitment.city') }}</th>
                                    <th>{{ __('admin/admin-recruitment.province') }}</th>
                                    <th>{{ __('admin/admin-recruitment.country') }}</th>
                                    <th>{{ __('admin/admin-recruitment.cv') }}</th>
                                    <th>{{ __('admin/admin-recruitment.status') }}</th>
                                    <th>{{ __('admin/admin-recruitment.re_date') }}</th>
                                    <th colspan="2" class="text-center">{{ __('admin/admin-recruitment.action') }}</th>
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
                                        <td><strong>{{ $recruitment->status }}</strong></td>
                                        <td><a href="{{ URL::asset('/assets/images/recruitments')}}/{{ $recruitment->file }}">{{ $recruitment->file }}</a></td>
                                        <td>{{ $recruitment->created_at }}</td>
                                        <td><a href="{{ route('admin.recruitmentdetails',['recruitment_id'=>$recruitment->id]) }}" class="btn btn-info btn-sm">{{ __('admin/admin-recruitment.detail') }}</a></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-success btn-sm dropdown" type="button" data-toggle="dropdown">{{ __('admin/admin-recruitment.status') }}
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#" wire:click.prevent="updateRecruitmentStatus({{ $recruitment->id }},'processing')">{{ __('admin/admin-recruitment.process') }}</a></li>
                                                    <li><a href="#" wire:click.prevent="updateRecruitmentStatus({{ $recruitment->id }},'canceled')">{{ __('admin/admin-recruitment.cancel') }}</a></li>
                                                </ul>
                                            </div>
                                        </td>
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
