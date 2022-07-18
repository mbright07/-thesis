<div class="wrap-icon-section wishlist">
    {{--<a href="#" class="link-direction">
        <i class="fa fa-bell" aria-hidden="true"></i>
        <div class="left-info">
            <span class="index">0</span>
            <span class="title">{{ __('base.noti') }}</span>
        </div>
    </a>--}}
    <li class="nav-item dropdown dropdown-notifications" style="list-style: none;">
        
        <a id="navbarDropdown" class="nav-link dropdown-toggle link-direction" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <i class="fa fa-bell" aria-hidden="true"></i>
            <div class="left-info">
                <span class="title">{{ __('base.noti') }}</span>
            </div>
            {{-- Notification<span class="caret"></span> --}}
        </a>
        <div class="dropdown-menu dropdown-menu-right menu-notification" aria-labelledby="navbarDropdown">
            @if ($notifications)
                @foreach ($notifications as $notification)
                    <a class="dropdown-item" href="#">
                        <span>{{ $notification->data['candidate_name'] }} da ung tuyen cong viec {{ $notification->data['job_name'] }}</span><br>
                    </a>
                @endforeach
            @endif
        </div>
    </li>
</div>
