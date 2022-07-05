<div class="content">
    <div class="container" style="width: 99%;">
        <div class="row">
            <div class="col-md-12">
                <div class="row" style="margin-left: -10px;">
                    <div class="col-md-3 col-sm-6">
                        <div class="icon-stat">
                            <div class="row">
                                <div class="col-xs-8 text-left">
                                    <span class="icon-stat-label">Total Recruitments Pending</span>
                                    <span class="icon-stat-value">{{ $totalRecruitments }}</span>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <i class="fa fa-file icon-stat-visual bg-primary"></i>
                                </div>
                            </div>
                            <div class="icon-stat-footer">
                                <i class="fa fa-clock-o"></i> Updated Now
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="icon-stat">
                            <div class="row">
                                <div class="col-xs-8 text-left">
                                    <span class="icon-stat-label">Total Recruitments Today</span>
                                    <span class="icon-stat-value">{{ $totalRecruitments_today }}</span>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <i class="fa fa-gift icon-stat-visual bg-secondary"></i>
                                </div>
                            </div>
                            <div class="icon-stat-footer">
                                <i class="fa fa-clock-o"></i> Updated Now
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="icon-stat">
                            <div class="row">
                                <div class="col-xs-8 text-left">
                                    <span class="icon-stat-label">Recruitments Processing</span>
                                    <span class="icon-stat-value">{{ $totalRecruitments_processing }}</span>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <i class="fa fa-file icon-stat-visual bg-primary"></i>
                                </div>
                            </div>
                            <div class="icon-stat-footer">
                                <i class="fa fa-clock-o"></i> Updated Now
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="icon-stat">
                            <div class="row">
                                <div class="col-xs-8 text-left">
                                    <span class="icon-stat-label">Total Recruitments Canceled</span>
                                    <span class="icon-stat-value">{{ $totalRecruitments_canceled }}</span>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <i class="fa fa-gift icon-stat-visual bg-secondary"></i>
                                </div>
                            </div>
                            <div class="icon-stat-footer">
                                <i class="fa fa-clock-o"></i> Updated Now
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="width: 50%;">
                    <div class="col-md-12">
                        <div class="lib-panel">
                            <div class="row box-shadow">
                                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>

                <div class="row" style="margin-left: -10px;">
                    <div class="col-md-12">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                Lastest Recruiment
                            </div>
                            <div class="panel-body" style="margin-left: -10px;">
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
                                        <th class="text-center">Action</th>
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
                                            <td>{{ substr($recruitment->intro, 0, 35) }}</td>
                                            <td>{{ $recruitment->country }}</td>
                                            <td>{{ $recruitment->province }}</td>
                                            <td>{{ $recruitment->city }}</td>
                                            <td><strong>{{ $recruitment->status }}</strong></td>
                                            <td><a
                                                    href="{{ URL::asset('/assets/images/recruitments') }}/{{ $recruitment->file }}">{{ $recruitment->file }}</a>
                                            </td>
                                            <td>{{ $recruitment->created_at }}</td>
                                            <td><a href="{{ route('admin.recruitmentdetails', ['recruitment_id' => $recruitment->id]) }}"
                                                   class="btn btn-info btn-sm">Detail</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script>
    var xValues = ["Recruitments Pending", "Recruitments Processing", "Recruitments Canceled"];
    var yValues = [{{ $totalRecruitments }}, {{ $totalRecruitments_processing }},
        {{ $totalRecruitments_canceled }}
    ];
    var barColors = [
        "#b91d47",
        "#00aba9",
        "#2b5797",
        "#e8c3b9",
        "#1e7145"
    ];

    new Chart("myChart", {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            title: {
                display: true,
                text: "Recruitments"
            }
        }
    });
</script>
