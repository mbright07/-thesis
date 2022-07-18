<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-2">
                                {{ __('admin/admin-add-home-slider.all_slide') }}
                            </div>
                            <div>
                                <div class="col-md-3">
                                    <label for="">{{ __('admin/admin-add-home-slider.search') }}</label>
                                    <input type="text" class="form-control"
                                        placeholder="{{ __('admin/admin-add-home-slider.search') }}..."
                                        wire:model="search" />
                                </div>
                                <div class="col-md-2">
                                    <label for="active">{{ __('admin/admin-add-home-slider.status') }}</label>
                                    <select name="active" class="form-control" wire:model="active">
                                        <option value="">{{ __('admin/admin-add-home-slider.no_selected') }}
                                        </option>
                                        <option value="false">{{ __('admin/admin-add-home-slider.inactive') }}
                                        </option>
                                        <option value="1">{{ __('admin/admin-add-home-slider.active') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="sortBy">{{ __('admin/admin-add-home-slider.sortBy') }}</label>
                                    <select name="sortBy" class="form-control" wire:model="sortBy">
                                        <option value="asc">{{ __('admin/admin-add-home-slider.oldest') }}</option>
                                        <option value="desc">{{ __('admin/admin-add-home-slider.newest') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3" style="float: right">
                                <label for=""></label>
                                <div><a href="{{ route('admin.addhomeslider') }}"
                                        class="btn btn-success pull-right">{{ __('admin/admin-add-home-slider.add_slide') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{ __('admin/admin-add-home-slider.image') }}</th>
                                    <th>{{ __('admin/admin-add-home-slider.title') }}</th>
                                    <th>{{ __('admin/admin-add-home-slider.subtitle') }}</th>
                                    <th>{{ __('admin/admin-add-home-slider.salary') }}</th>
                                    <th>{{ __('admin/admin-add-home-slider.link') }}</th>
                                    <th>{{ __('admin/admin-add-home-slider.status') }}</th>
                                    <th>{{ __('admin/admin-add-home-slider.date') }}</th>
                                    <th>{{ __('admin/admin-add-home-slider.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $slider)
                                    <tr>
                                        <td>{{ $slider->id }}</td>
                                        <td><img src="{{ asset('assets/images/sliders') }}/{{ $slider->image }}"
                                                width="120" /></td>
                                        <td>{{ $slider->title }}</td>
                                        <td>{{ $slider->subtitle }}</td>
                                        <td>{{ $slider->salary }}</td>
                                        <td>{{ $slider->link }}</td>
                                        <td>{{ $slider->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td>{{ $slider->created_at }}</td>
                                        <td>
                                            <a
                                                href="{{ route('admin.edithomeslider', ['slider_id' => $slider->id]) }}">
                                                <i class="fa fa-edit fa-2x text-info"></i>
                                            </a>
                                            <a href="#"
                                                onclick="confirm('{{ __('admin/admin-add-home-slider.sure') }}') || event.stopImmediatePropagation()"
                                                wire:click.prevent="deleteSlide({{ $slider->id }})"
                                                style="margin-left: 10px;"><i
                                                    class="fa fa-times fa-2x text-danger"></i></a>
                                        </td>
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
