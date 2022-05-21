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
                    All recruitments
                </div>
                <div class="panel-body">
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
                                <th>Recruitment Date</th>
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
                                    <td>{{ $recruitment->intro }}</td>
                                    <td>{{ $recruitment->country }}</td>
                                    <td>{{ $recruitment->province }}</td>
                                    <td>{{ $recruitment->city }}</td>
                                    <td>{{ $recruitment->file }}</td>
                                    <td>{{ $recruitment->created_at }}</td>
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
