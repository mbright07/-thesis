<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Export element list to PDF</title>
    <style type="text/css">
        .main-content {
            min-height: 100vh;
            width: 80%;
            margin: 2rem auto;
            display: grid;
            grid-template-columns: repeat(7, 1fr);
        }

        .left-section-cv {
            grid-column: span 2;
            height: 100%;
            background-color: #f84242;
        }

        .right-section-cv {
            grid-column: span 5;
            background-color: #f7f7f7;
            height: 100%;
        }


        .left-content {
            padding: 2rem 3rem;
        }

        .profile {
            width: 100%;
            border-bottom: 1px solid #002333;
        }

        .image {
            width: 100%;
            text-align: center;
        }

        .profile img {
            width: 100%;
            border-radius: 50%;
            border: 8px solid #002333;

        }

        .name {
            font-size: 2rem;
            color: white;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 1.2rem 0;
        }

        .career {
            font-size: 1.2rem;
            color: #ecf8fc;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding-bottom: 1rem;
        }

        .main-title {
            font-size: 1.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #f7f7f7ec;
            padding-top: 3rem;
        }

        .contact-info ul {
            padding-top: 2rem;
            margin-left: -40px;
        }

        .contact-info ul li {
            padding: .4rem 0;
            display: flex;
            align-items: center;
            color: white;
        }

        .contact-info ul li i {
            padding-right: 1rem;
            font-size: 1.2rem;
            color: #ebf3f7;
        }

        .skills-section ul {
            padding-top: 2rem;
            margin-left: -40px;
        }

        .skills-section ul li {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            padding: .4rem 0;
            font-size: 0.8rem;
        }

        .progress-bar {
            width: 100%;
            height: .4rem;
            background-color: #2f81ed5b;
            position: relative;
            border-radius: 12px;
        }

        .progress {
            height: 100%;
            position: absolute;
            left: 0;
            background-color: #2D9CDB;
            border-radius: 12px;
        }

        .js-progress {
            width: 70%;
        }

        .ps-progress {
            width: 90%;
        }

        .j-progress {
            width: 85%;
        }

        .c-progress {
            width: 40%;
        }

        .n-progress {
            width: 63%;
        }

        .w-progress {
            width: 78%;
        }


        .skill-title {
            text-transform: uppercase;
            color: #f7f7f7;
            font-size: 13px;
        }

        .sub-title {
            padding-top: 2rem;
            font-size: 1.2rem;
            text-transform: uppercase;
            color: #f7f7f7;
        }

        .sub-para {
            color: #ccc;
            padding: .4rem 0;
        }

        .references-section li {
            color: #ccc;
            padding: .2rem 0;
        }

        .references-section li i {
            padding-right: .5rem;
            font-size: 1.2rem;
            color: #2D9CDB;
        }

        .right-main-content {
            padding: 2rem 3rem;
        }


        .right-title {
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #2F80ED;
            margin-bottom: 1.2rem;
            position: relative;
        }

        .right-title::after {
            content: "";
            position: absolute;
            width: 60%;
            height: .2rem;
            background-color: #ccc;
            border-radius: 12px;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
        }

        .para {
            line-height: 1.6rem;
            color: #718096;
            font-size: 1.1rem;
        }

        .sect {
            padding-bottom: 2rem;
        }

        .timeline {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
        }

        .tl-title {
            letter-spacing: 1px;
            font-size: 1.3rem;
            color: #002333;
            text-transform: uppercase;
        }

        .tl-title-2 {
            letter-spacing: 1px;
            font-size: 1.3rem;
            color: #2D9CDB;
            text-transform: uppercase;
        }

        .tl-content {
            border-left: 1px solid #ccc;
            padding-left: 2rem;
            position: relative;
            padding-bottom: 2rem;
        }

        .tl-title-2::before {
            content: "";
            position: absolute;
            width: .7rem;
            height: .7rem;
            background-color: #2D9CDB;
            border-radius: 50%;
            transform: translateX(-50%);
            left: 0;
        }

        /*Media Querries*/
        @media screen and (max-width:823px) {
            .right-title::after {
                width: 40%;
            }
        }

        @media screen and (max-width:681px) {
            .right-title::after {
                width: 30%;
            }
        }

        @media screen and (max-width:780px) {
            .timeline {
                grid-template-columns: repeat(1, 1fr);
            }
        }

        @media screen and (max-width:780px) {
            .left-section-cv {
                grid-column: span 3;
            }

            .right-section-cv {
                grid-column: span 4;
            }
        }

        @media screen and (max-width:1200px) {
            .main-content {
                grid-template-columns: repeat(1, 1fr);
            }

            .profile img {
                width: 40%;
            }
        }

        @media screen and (max-width:700px) {
            .profile img {
                width: 60%;
            }
        }

        @media screen and (max-width:390px) {
            .name {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <button class="btn btn-success" style="float: right;">
        <a href="{{ route('user.experience.donwload-cv') }}">Download CV</a>
    </button>
    <div class="container">
        <div class="main-content">
            <div class="left-section-cv">
                <div class="left-content">
                    <div class="profile">
                        <div class="image">
                            {{-- <img src="{{ asset('/assets/images/profile') }}/{{ $profiles->image }}" alt=""> --}}
                        </div>
                        <h2 class="name">{{ $users->name }}</h2>
                        <p class="career">Công việc mong muốn</p>
                    </div>
                    <div class="contact-info">
                        <h3 class="main-title">Contact Info</h3>
                        <ul>
                            <li>
                                <i class="fa fa-phone"></i>
                                {{ $users->profile->mobile }}
                            </li>
                            <li>
                                <i class="fa fa-fax"></i>
                                {{ $users->email }}
                            </li>
                            <li>
                                <i class="fa fa-globe"></i>
                                #
                            </li>
                            <li>
                                <i class="fa fa-facebook"></i>
                                #
                            </li>
                            <li>
                                <i class="fa fa-instagram"></i>
                                #
                            </li>
                            <li>
                                <i class="fa fa-map-marker"></i>
                                {{ $users->profile->address }}
                            </li>
                        </ul>
                    </div>
                    <div class="skills-section">
                        <h3 class="main-title">Skills</h3>
                        <ul>
                            @foreach ($skills as $skill)
                                @if ($skill->user_id === Auth::user()->id)
                                    <li>
                                        <p class="skill-title">{{ $skill->skill_name }}</p>
                                        <div class="progress-bar">
                                            <div class="progress js-progress"></div>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="skills-section">
                        <h3 class="main-title">Languages</h3>
                        <ul>
                            @foreach ($languages as $lang)
                                @if ($lang->user_id === Auth::user()->id)
                                    <li>
                                        <p class="skill-title">{{ $lang->language }}</p>
                                        <div class="progress-bar">
                                            <div class="progress js-progress"></div>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="references-section">
                        <h3 class="main-title">References</h3>
                        @foreach ($references as $re)
                            @if ($re->user_id === Auth::user()->id)
                                <div class="referee">
                                    <h6 class="sub-title">{{ $re->name }}</h6>
                                    <p class="sub-para">{{ $re->position }}</p>
                                    <p class="sub-para">{{ $re->company }}</p>
                                    <ul>
                                        <li>
                                            <i class="fa fa-phone"></i>
                                            {{ $re->phone }}
                                        </li>
                                        <li>
                                            <i class="fa fa-fax"></i>
                                            {{ $re->email }}
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="right-section-cv">
                <div class="right-main-content">
                    <div class="about sect">
                        <h2 class="right-title">About Me</h2>
                        <p class="para">
                            {{ $users->profile->intro }}
                        </p>
                    </div>

                    <div class="experince sect">
                        <h2 class="right-title">Experience</h2>
                        @foreach ($work_histories as $work_history)
                            @if ($work_history->user_id === Auth::user()->id)
                                <div class="timeline">
                                    <div class="left-tl-content">
                                        <h5 class="tl-title">{{ $work_history->company }}</h5>
                                        <p class="para">{{ $work_history->from_month }} -
                                            {{ $work_history->to_month }}</p>
                                    </div>
                                    <div class="right-tl-content">
                                        <div class="tl-content">
                                            <h5 class="tl-title-2">{{ $work_history->position }}</h5>
                                            <p class="para">
                                                {{ $work_history->description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                    <div class="education sect">
                        <h2 class="right-title">education</h2>
                        @foreach ($my_education as $my_education)
                            @if ($my_education->user_id === Auth::user()->id)
                                <div class="timeline">
                                    <div class="left-tl-content">
                                        <h5 class="tl-title">{{ $my_education->school }}</h5>
                                        <p class="para">{{ $my_education->from_month }} -
                                            {{ $my_education->to_month }}</p>
                                    </div>
                                    <div class="right-tl-content">
                                        <div class="tl-content">
                                            <h5 class="tl-title-2">{{ $my_education->qualifications }}</h5>
                                            <p class="para">
                                                {{ $my_education->achievements }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="awards sect">
                        <h2 class="right-title">Activities</h2>
                        @foreach ($activities as $act)
                            @if ($act->user_id === Auth::user()->id)
                                <div class="timeline">
                                    <div class="left-tl-content">
                                        <h5 class="tl-title">{{ $act->activity_name }}</h5>
                                    </div>
                                    <div class="right-tl-content">
                                        <div class="tl-content">
                                            <h5 class="tl-title-2"></h5>
                                            <p class="para">
                                                {{ $act->description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="awards sect">
                        <h2 class="right-title">Certifications</h2>
                        @foreach ($certifications as $cer)
                            @if ($cer->user_id === Auth::user()->id)
                                <div class="timeline">
                                    <div class="left-tl-content">
                                        <h5 class="tl-title">{{ $cer->certification_name }}</h5>
                                    </div>
                                    <div class="right-tl-content">
                                        <div class="tl-content">
                                            <h5 class="tl-title-2"></h5>
                                            <p class="para">
                                                {{ $cer->description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
