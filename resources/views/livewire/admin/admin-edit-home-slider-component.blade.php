<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                {{ __('admin/admin-add-home-slider.edit') }}
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.homeslider') }}" class="btn btn-success pull-right">{{ __('admin/admin-add-home-slider.all_slide') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>   
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="updateSlide">
                            <div class="form-group">
                                <div class="col-md-4 control-label">{{ __('admin/admin-add-home-slider.title') }}</div>
                                <div class="col-md-4">
                                    <input type="text" placeholder="{{ __('admin/admin-add-home-slider.title') }}" class="form-control input-md" wire:model="title"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 control-label">{{ __('admin/admin-add-home-slider.subtitle') }}</div>
                                <div class="col-md-4">
                                    <input type="text" placeholder="{{ __('admin/admin-add-home-slider.subtitle') }}" class="form-control input-md" wire:model="subtitle"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 control-label">{{ __('admin/admin-add-home-slider.salary') }}</div>
                                <div class="col-md-4">
                                    <input type="text" placeholder="{{ __('admin/admin-add-home-slider.salary') }}" class="form-control input-md" wire:model="salary" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 control-label">{{ __('admin/admin-add-home-slider.link') }}</div>
                                <div class="col-md-4">
                                    <input type="text" placeholder="{{ __('admin/admin-add-home-slider.link') }}" class="form-control input-md" wire:model="link" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 control-label">{{ __('admin/admin-add-home-slider.image') }}</div>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" wire:model="newimage"/>
                                    @if ($newimage)
                                        <img src="{{ $newimage->temporaryUrl() }}" width="120"/>
                                    @else
                                        <img src="{{ asset('assets/image/sliders') }}/{{ $image }}" width="120" />
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 control-label">{{ __('admin/admin-add-home-slider.status') }}</div>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="status">
                                        <option value="0">{{ __('admin/admin-add-home-slider.inactive') }}</option>
                                        <option value="1">{{ __('admin/admin-add-home-slider.active') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 control-label"></div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">{{ __('admin/admin-add-home-slider.update') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
