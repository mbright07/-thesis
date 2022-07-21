<div>

    <div class="container" style="padding: 30px 0;">
        <style>
            nav svg {
                height: 20px;
            }

            nav .hidden {
                display: block !important;
            }
        </style>
        <div class="row">
            @if (Session::has('recruitment_message'))
                <div class="alert alert-success" role="alert">{{ Session::get('recruitment_message') }}
                </div>
            @endif
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">{{ __('admin/admin-recruitment.all_recruitments') }}</label>
                            </div>
                            <div>
                                <div class="col-md-3">
                                    <label for="">{{ __('admin/admin-add-home-slider.search') }}</label>
                                    <input type="text" class="form-control"
                                        placeholder="{{ __('admin/admin-add-home-slider.search') }}..."
                                        wire:model="search" />
                                </div>
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
                                <div class="col-md-2">
                                    <label for="job_id">{{ __('admin/admin-recruitment.job_name') }}</label>
                                    <select name="job_id" class="form-control" wire:model="job_id">
                                        <option value="" selected="selected">
                                            {{ __('admin/admin-recruitment.no_selected') }}</option>
                                        @foreach ($jobs as $job)
                                            <option value="{{ $job->id }}">{{ $job->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body" style="margin-left: -10px;">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('admin/admin-recruitment.stt') }}</th>
                                    <th>{{ __('admin/admin-recruitment.f_name') }}</th>
                                    <th>{{ __('admin/admin-recruitment.l_name') }}</th>
                                    <th>{{ __('admin/admin-recruitment.email') }}</th>
                                    <th>{{ __('admin/admin-recruitment.mobile') }}</th>
                                    <th>{{ __('admin/admin-recruitment.city') }}</th>
                                    <th>{{ __('admin/admin-recruitment.province') }}</th>
                                    <th>{{ __('admin/admin-recruitment.country') }}</th>
                                    <th>{{ __('admin/admin-recruitment.status') }}</th>
                                    <th>{{ __('admin/admin-recruitment.cv') }}</th>
                                    <th>{{ __('admin/admin-recruitment.re_date') }}</th>
                                    <th colspan="2" class="text-center">
                                        {{ __('admin/admin-recruitment.action') }}
                                    </th>
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
                                        <td>{{ $recruitment->country }}</td>
                                        <td>{{ $recruitment->province }}</td>
                                        <td>{{ $recruitment->city }}</td>
                                        <td><strong>{{ $recruitment->status }}</strong></td>
                                        <td><a
                                                href="{{ URL::asset('/assets/images/recruitments') }}/{{ $recruitment->file }}">{{ $recruitment->file }}</a>
                                        </td>
                                        <td>{{ $recruitment->created_at }}</td>
                                        <td><a href="{{ route('employer.recruitmentdetails', ['recruitment_id' => $recruitment->id]) }}"
                                                class="btn btn-info btn-sm">{{ __('admin/admin-recruitment.detail') }}</a>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-success btn-sm dropdown" type="button"
                                                    data-toggle="dropdown">{{ __('admin/admin-recruitment.status') }}
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#"
                                                            wire:click.prevent="updateRecruitmentStatus({{ $recruitment->id }},'processing')">{{ __('admin/admin-recruitment.process') }}</a>
                                                    </li>
                                                    <li><a href="#"
                                                            wire:click.prevent="updateRecruitmentStatus({{ $recruitment->id }},'canceled')">{{ __('admin/admin-recruitment.cancel') }}</a>
                                                    </li>
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
