<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recruitment Confirmation</title>
</head>
<body>
    <p>Hi {{ $recruitment->firstname }} {{ $recruitment->lastname }},</p>
    <p>Your order has been successfully places</p>
    <br/>

    <div>
        <h3 class="box-title">Jobs Name</h3>
        <ul>    
            @foreach ($recruitment->recruitmentJob as $item )
                <div>
                    <figure><img src="{{ asset('/assets/images/products') }}/{{ $item->job->image }}" alt="{{ $item->job->image }}"></figure>
                </div>
                <div >
                    <strong>{{ $item->job->name }}</strong>
                </div>
                <div><p><strong>Salary:</strong> ${{ $item->job->regular_salary }}</p></div> 
            @endforeach							
        </ul>
    </div>

    <div>               
        <h3 class="box-title">CV Detail</h3>
        <table style="width:800px; text-align: left;">
            <tr>
                <th style="font-size: 15px; font-weight:bold; width:100px;">Họ Và Tên</th>
                <td>{{ $recruitment->firstname }} {{ $recruitment->lastname }}</td>
            </tr>
            <tr>
                <th style="font-size: 15px; font-weight:bold; width:100px;">Email</th>
                <td>{{ $recruitment->email }}</td>
            </tr>
            <tr>
                <th style="font-size: 15px; font-weight:bold; width:100px;">Mobile</th>
                <td>{{ $recruitment->mobile }}</td>
            </tr>
            <tr>
                <th style="font-size: 15px; font-weight:bold; width:100px;">Address</th>
                <td>{{ $recruitment->city }} - {{ $recruitment->province }} - {{ $recruitment->country }}</td>
            </tr>
            <tr>
                <th style="font-size: 15px; font-weight:bold; width:100px;">CV</th>
                <td><a href="{{ URL::asset('/assets/images/recruitments')}}/{{ $recruitment->file }}">{{ $recruitment->file }}</a></td>
            </tr>
            <tr>
                <th style="font-size: 15px; font-weight:bold; width:50px;">Intro</th>
                <td>{{ $recruitment->intro }}</td>
            </tr>
        </table>
    </div>  
</body>
</html>