<div>
    <div class="container" style="padding: 30px 0;">
        <style>
            nav svg {
                height: 20px;
            }

            nav.hidden {
                display: block !important;
            }
        </style>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">{{ __('admin/admin-contact.con_mes') }}</label>
                            </div>
                            <div class="col-md-3">
                                <label for="">Search</label>
                                <input type="text" class="form-control" placeholder="Search..."
                                    wire:model="search" />
                            </div>
                            <div class="col-md-2">
                                <label for="sortBy">sortBy</label>
                                <select name="sortBy" class="form-control" wire:model="sortBy">
                                    <option value="asc">Cũ Nhất</option>
                                    <option value="desc">Mới nhất</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('admin/admin-contact.stt') }}</th>
                                    <th>{{ __('admin/admin-contact.name') }}</th>
                                    <th>{{ __('admin/admin-contact.email') }}</th>
                                    <th>{{ __('admin/admin-contact.phone') }}</th>
                                    <th>{{ __('admin/admin-contact.comment') }}</th>
                                    <th>{{ __('admin/admin-contact.time') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>{{ $contact->comment }}</td>
                                        <td>{{ $contact->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $contacts->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
