<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('recruitment-mail.re_conf') }}</title>
</head>
<body>
    <p>{{ __('recruitment-mail.hi') }} {{ $recruitment->firstname }} {{ $recruitment->lastname }},</p>
    <p>{{ __('recruitment-mail.your_re') }}</p>
    <br/>

    <div>
        <h3 class="box-title">{{ __('recruitment-mail.job_name') }}</h3>
        <ul>    
            @foreach ($recruitment->recruitmentJob as $item )
                <div >
                    <strong>{{ $item->job->name }}</strong>
                </div>
                <div><p><strong>{{ __('recruitment-mail.salary') }}:</strong> ${{ $item->job->regular_salary }}</p></div> 
            @endforeach							
        </ul>
    </div>

    <div>               
        <h3 class="box-title">{{ __('recruitment-mail.cv_detail') }}</h3>
        <table style="width:800px; text-align: left;">
            <tr>
                <th style="font-size: 15px; font-weight:bold; width:100px;">{{ __('recruitment-mail.name') }}</th>
                <td>{{ $recruitment->firstname }} {{ $recruitment->lastname }}</td>
            </tr>
            <tr>
                <th style="font-size: 15px; font-weight:bold; width:100px;">{{ __('recruitment-mail.email') }}</th>
                <td>{{ $recruitment->email }}</td>
            </tr>
            <tr>
                <th style="font-size: 15px; font-weight:bold; width:100px;">{{ __('recruitment-mail.mobile') }}</th>
                <td>{{ $recruitment->mobile }}</td>
            </tr>
            <tr>
                <th style="font-size: 15px; font-weight:bold; width:100px;">{{ __('recruitment-mail.address') }}</th>
                <td>{{ $recruitment->city }} - {{ $recruitment->province }} - {{ $recruitment->country }}</td>
            </tr>
            <tr>
                <th style="font-size: 15px; font-weight:bold; width:100px;">CV</th>
                <td><a href="{{ URL::asset('/assets/images/recruitments')}}/{{ $recruitment->file }}">{{ $recruitment->file }}</a></td>
            </tr>
            <tr>
                <th style="font-size: 15px; font-weight:bold; width:50px;">{{ __('recruitment-mail.intro') }}</th>
                <td>{{ $recruitment->intro }}</td>
            </tr>
        </table>
    </div>  
</body>
</html>