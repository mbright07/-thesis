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
                        All recruitments
                    </div>                
                    <div class="panel-body" style="margin-left: -10px;">
                        @if (Session::has('recruitment_message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('recruitment_message') }}</div>   
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>FirstName</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Intro</th>
                                    <th>City</th>
                                    <th>Province</th>
                                    <th>Country</th>
                                    <th>CV</th>
                                    <th>Status</th>
                                    <th>Recruitment Date</th>
                                    <th colspan="2" class="text-center">Action</th>
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
                                        <td><a href="{{ route('admin.recruitmentdetails',['recruitment_id'=>$recruitment->id]) }}" class="btn btn-info btn-sm">Detail</a></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-success btn-sm dropdown" type="button" data-toggle="dropdown">Status
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#" wire:click.prevent="updateRecruitmentStatus({{ $recruitment->id }},'processing')">Processing</a></li>
                                                    <li><a href="#" wire:click.prevent="updateRecruitmentStatus({{ $recruitment->id }},'canceled')">Canceled</a></li>
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
