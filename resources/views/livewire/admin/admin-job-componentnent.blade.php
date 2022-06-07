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
                        <div class="row">
                            <div class="col-md-6">
                                {{ __('admin/admin-add-job.all_jobs') }}
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.addjob') }}" class="btn btn-success pull-right">{{ __('admin/admin-add-job.add_job') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>   
                        @endif
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
                                @foreach ($jobs as $job )
                                    <tr> 
                                        <td>{{ $job->id }}</td>
                                        <td> <img src = "{{ asset('assets/images/products') }}/{{ $job->image }}" width="60"/></td>
                                        <td>{{ $job->name }}</td>
                                        <td>{{ $job->stock_status }}</td>
                                        <td>{{ $job->regular_salary }}</td>
                                        <td>{{ $job->category->name }}</td>
                                        <td>{{ $job->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.editjob',['job_slug'=>$job->slug]) }}">
                                                <i class="fa fa-edit fa-2x text-info"></i>
                                            </a>
                                            <a href="#" onclick="confirm('{{ __('admin/admin-add-job.sure') }}') || event.stopImmediatePropagation()" wire:click.prevent="deleteJob({{ $job->id }})" style="margin-left: 10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
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
