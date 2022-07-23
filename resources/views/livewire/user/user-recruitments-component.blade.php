<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }
    </style>
    <div class="container" style="padding: 30px 0;">
        <div class="row" style="margin-left: 15%">
            <div class="col-md-3 col-sm-6">
                <div class="icon-stat">
                    <div class="row">
                        <div class="col-xs-8 text-left">
                            <span class="icon-stat-label">{{ __('employee/dashboard.total') }}</span>
                            <span class="icon-stat-value">{{ $totalRecruitments }}</span>
                        </div>
                        <div class="col-xs-4 text-center">
                            <i class="fa fa-file icon-stat-visual bg-primary"></i>
                        </div>
                    </div>
                    <div class="icon-stat-footer">
                        <i class="fa fa-clock-o"></i> {{ __('employee/dashboard.update') }}
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="icon-stat">
                    <div class="row">
                        <div class="col-xs-8 text-left">
                            <span class="icon-stat-label">{{ __('employee/dashboard.process') }}</span>
                            <span class="icon-stat-value">{{ $totalRecruitments_processing }}</span>
                        </div>
                        <div class="col-xs-4 text-center">
                            <i class="fa fa-file icon-stat-visual bg-primary"></i>
                        </div>
                    </div>
                    <div class="icon-stat-footer">
                        <i class="fa fa-clock-o"></i> {{ __('employee/dashboard.update') }}
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="icon-stat">
                    <div class="row">
                        <div class="col-xs-8 text-left">
                            <span class="icon-stat-label">{{ __('employee/dashboard.total_cancel') }}</span>
                            <span class="icon-stat-value">{{ $totalRecruitments_canceled }}</span>
                        </div>
                        <div class="col-xs-4 text-center">
                            <i class="fa fa-gift icon-stat-visual bg-secondary"></i>
                        </div>
                    </div>
                    <div class="icon-stat-footer">
                        <i class="fa fa-clock-o"></i> {{ __('employee/dashboard.update') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-3">
                                {{ __('user/user-recruitment.all_recruitments') }}
                            </div>
                            <div>
                                <div class="col-md-2">
                                    <label for="active">{{ __('admin/admin-add-home-slider.status') }}</label>
                                    <select name="active" class="form-control" wire:model="active">
                                        <option value="">{{ __('admin/admin-add-home-slider.no_selected') }}
                                        </option>
                                        <option value="pending">{{ __('admin/admin-recruitment.pending') }}</option>
                                        <option value="Processing">{{ __('admin/admin-recruitment.process') }}
                                        </option>
                                        <option value="canceled">{{ __('admin/admin-recruitment.cancel') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="sortBy">{{ __('admin/admin-add-home-slider.sortBy') }}</label>
                                    <select name="sortBy" class="form-control" wire:model="sortBy">
                                        <option value="asc">{{ __('admin/admin-add-home-slider.oldest') }}
                                        </option>
                                        <option value="desc">{{ __('admin/admin-add-home-slider.newest') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
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
                                        <td><a
                                                href="{{ URL::asset('/assets/images/recruitments') }}/{{ $recruitment->file }}">{{ $recruitment->file }}</a>
                                        </td>
                                        <td><strong>{{ $recruitment->status }}</strong></td>
                                        <td>{{ $recruitment->created_at }}</td>
                                        <td>
                                            <a href="{{ route('user.recruitmentdetails', ['recruitment_id' => $recruitment->id]) }}"
                                                class="btn btn-info btn-sm">{{ __('user/user-recruitment.detail') }}</a>
                                            <a href="#"
                                                onclick=" return confirm('{{ __('bookmark.sure') }}') || event.stopImmediatePropagation()"
                                                wire:click.prevent="updateRecruitmentStatus({{ $recruitment->id }},'canceled')"
                                                class="btn btn-danger" title="">{{ __('user/user-recruitment.cancel_recruitment') }}</a>

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
