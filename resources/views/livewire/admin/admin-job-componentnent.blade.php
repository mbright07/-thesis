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
                                All Jobs
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.addjob') }}" class="btn btn-success pull-right">Add New Job</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class='table table-striped'>
                            <thead>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Stock</th>
                                <th>Salary</th>
                                <th>Location</th>
                                <th>Date</th>
                                <th>Action</th>
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
