<div class="collapse navbar-collapse">
    <li class="dropdown dropdown-notifications" style="list-style: none;">

        <a class="dropdown-toggle" href="#notifications-panel" data-toggle="dropdown">
            <i data-count="0" class="fa fa-bell notification-icon"></i>
        </a>
        <div class="dropdown-container" style="margin-top: 30px; width:350px;">
            <div class="dropdown-toolbar">
                <div class="dropdown-toolbar-actions">
                    <a href="#">{{ __('notification.mark') }}</a>
                </div>
                <h3 class="dropdown-toolbar-title">{{ __('notification.noti') }}(<span class="notif-count">0</span>)
                </h3>
            </div>
            <ul class="dropdown-menu">
                <div class=" notification">
                    <div class="menu-notification">
                    </div>
                </div>
                <div class="dropdown-toolbar">
                    <h3 class="dropdown-toolbar-title">
                        {{ __('notification.old_noti') }}
                    </h3>
                </div>
                @if ($notifications)
                    @foreach ($notifications as $notification)
                        @if (Auth::user()->role_id == 3)
                            {{-- @if ($notification->data['type_noti'] == 'have new noti')
                                <div class="notification">
                                    <a class="dropdown-item"
                                        href="{{ route('user.recruitmentdetails', $notification->data['recruitment_id']) }}">
                                        <span>
                                            {{ __('notification.candidate') }}
                                            {{ $notification->data['sender_name'] }}
                                            {{ __('notification.update_status') }} {{ $notification->data['status'] }}
                                            {{ __('notification.for') }}
                                            @foreach (json_decode($notification->data['jobs']) as $job)
                                                {{ $job->name }}
                                            @endforeach
                                            <br />
                                        </span>
                                        <br />
                                    </a>
                                </div>
                            @else
                                <div class="notification">
                                    <a class="dropdown-item"
                                        href="{{ route('employer.recruitmentdetails', $notification->data['recruitment_id']) }}">
                                        <span>{{ __('notification.candidate') }}
                                            {{ $notification->data['candidate_name'] }}
                                            {{ __('notification.apply') }}
                                            {{ $notification->data['job_name'] }}</span><br>
                                        <br />
                                    </a>
                                </div>
                            @endif --}}
                        @elseif (Auth::user()->role_id == 2)
                            <div class="notification">
                                <a class="dropdown-item"
                                    href="{{ route('user.recruitmentdetails', $notification->data['recruitment_id']) }}">
                                    <span>
                                        {{ __('notification.employer') }}
                                        {{ $notification->data['responder_name'] }}
                                        {{ __('notification.update_status') }} {{ $notification->data['status'] }}
                                        {{ __('notification.for') }}
                                        @foreach (json_decode($notification->data['jobs']) as $job)
                                            {{ $job->name }}
                                        @endforeach
                                        <br />
                                    </span>
                                    <br />
                                </a>
                            </div>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
    </li>
</div>

@push('scripts')
    <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
    <script>
        $(function() {
            var notificationsWrapper = $('.dropdown-notifications');
            var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
            var notificationsCountElem = notificationsToggle.find('i[data-count]');
            var notificationsCount = parseInt(notificationsCountElem.data('count'));
            var notifications = notificationsWrapper.find('ul.dropdown-menu');

            var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
                encrypted: true,
                cluster: "{{ env('PUSHER_APP_CLUSTER') }}"
            });
            var channel = pusher.subscribe('NotificationEvent');
            channel.bind('send-message', function(data) {
                const data_ = JSON.parse(data);
                @if (Auth::check())
                    if (data_.receiver_id === {{ Auth::user()->id }}) {
                        var newNotificationHtml;
                        if ({{ Auth::user()->role_id }} === 3) {
                            if (data_.type_noti == 'have new noti') {
                                newNotificationHtml = `
                                        <a class="dropdown-item" href="/user/recruitments/${ data_.recruitment_id }">
                                        <span>
                                            {{ __('notification.candidate') }} ${ data_.sender_name} {{ __('notification.update_status') }} ${ data_.status }
                                        {{ __('notification.for') }}
                                        <br/>`;

                                const newArray = JSON.parse(data_.jobs).map(element =>
                                    newNotificationHtml +=
                                    element.name);

                                newNotificationHtml +=
                                    `<br/>
                                            </span>
                                            <br/><br/>
                                            </a>
                                            `;
                                notificationsCount += 1;
                                notificationsCountElem.attr('data-count', notificationsCount);
                                notificationsWrapper.find('.notif-count').text(notificationsCount);
                                notificationsWrapper.show();
                            } else {
                                newNotificationHtml = `
                                    <a class="dropdown-item" href="/employer/recruitments/${ data_.recruitment_id }">
                                    <span>{{ __('notification.candidate') }} ${ data_.candidate_name } {{ __('notification.apply') }} ${ data_.job_name }</span>
                                    <br/><br/>
                                    </a>
                                `;
                                notificationsCount += 1;
                                notificationsCountElem.attr('data-count', notificationsCount);
                                notificationsWrapper.find('.notif-count').text(notificationsCount);
                                notificationsWrapper.show();
                            }
                        }

                        if ({{ Auth::user()->role_id }} === 2) {
                            newNotificationHtml = `
                                        <a class="dropdown-item" href="/user/recruitments/${ data_.recruitment_id }">
                                        <span>
                                            {{ __('notification.employer') }} ${ data_.responder_name} {{ __('notification.update_status') }} ${ data_.status }
                                        <br/>
                                        {{ __('notification.for') }}
                                        <br/>`;

                            const newArray = JSON.parse(data_.jobs).map(element => newNotificationHtml +=
                                element.name);

                            newNotificationHtml +=
                                `<br/>
                                        </span>
                                        <br/><br/>
                                        </a>
                                        `;
                        }

                        $('.menu-notification').prepend(newNotificationHtml);
                        notificationsCount += 1;
                        notificationsCountElem.attr('data-count', notificationsCount);
                        notificationsWrapper.find('.notif-count').text(notificationsCount);
                        notificationsWrapper.show();
                    }
                @endif

            });



        });
    </script>
@endpush
