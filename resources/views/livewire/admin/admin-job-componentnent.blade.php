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
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="">{{ __('admin/admin-add-job.all_jobs') }}</label>
                                <div><a href="{{ route('admin.addjob') }}"
                                        class="btn btn-success pull-right">{{ __('admin/admin-add-job.add_job') }}</a>
                                </div>
                            </div>
                            <div>
                                {{-- <div class="col-md-3">
                                    <label for="">Location</label>
                                    <select wire:model="location" class="form-control">
                                        <option value="">No Selected</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <div class="col-md-3">
                                    <label for="">Search</label>
                                    <input type="text" class="form-control" placeholder="Search..."
                                        wire:model="search" />
                                </div>
                                <div class="col-md-2">
                                    <label for="active">Status</label>
                                    <select name="active" class="form-control" wire:model="active">
                                        <option value="">No Selected</option>
                                        <option value="instock">instock</option>
                                        <option value="outofstock">outofstock</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="sortBy">sortBy</label>
                                    <select name="sortBy" class="form-control" wire:model="sortBy">
                                        <option value="asc">Cũ Nhất</option>
                                        <option value="desc">Mới nhất</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class='table table-striped'>
                            <thead>
                                <th>Id</th>
                                <th>{{ __('admin/admin-add-job.image') }}</th>
                                <th>{{ __('admin/admin-add-job.job_name') }}</th>
                                <th>{{ __('admin/admin-add-job.stock') }}</th>
                                <th>{{ __('admin/admin-add-job.regular_salary') }}</th>
                                <th>{{ __('admin/admin-add-job.location') }}</th>
                                <th>{{ __('admin/admin-add-job.date') }}</th>
                                <th>{{ __('admin/admin-add-job.action') }}</th>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $job)
                                    <tr>
                                        <td>{{ $job->id }}</td>
                                        <td> <img src="{{ asset('assets/images/products') }}/{{ $job->image }}"
                                                width="60" /></td>
                                        <td>{{ $job->name }}</td>
                                        <td>{{ $job->stock_status }}</td>
                                        <td>{{ $job->regular_salary }}</td>
                                        <td>{{ $job->category->name }}</td>
                                        <td>{{ $job->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.editjob', ['job_slug' => $job->slug]) }}">
                                                <i class="fa fa-edit fa-2x text-info"></i>
                                            </a>
                                            <a href="#"
                                                onclick="confirm('{{ __('admin/admin-add-job.sure') }}') || event.stopImmediatePropagation()"
                                                wire:click.prevent="deleteJob({{ $job->id }})"
                                                style="margin-left: 10px;"><i
                                                    class="fa fa-times fa-2x text-danger"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $jobs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
