<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                {{ __('admin/admin-add-home-slider.add_slide') }}
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.homeslider') }}"
                                    class="btn btn-success pull-right">{{ __('admin/admin-add-home-slider.all_slide') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="addSlide">
                            <div class="form-group">
                                <div class="col-md-4 control-label">{{ __('admin/admin-add-home-slider.title') }}
                                    <span class="star">*</span>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" placeholder="{{ __('admin/admin-add-home-slider.title') }}"
                                        class="form-control input-md" wire:model="title" />
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 control-label">{{ __('admin/admin-add-home-slider.subtitle') }}
                                    <span class="star">*</span>
                                </div>
                                <div class="col-md-4">
                                    <input type="text"
                                        placeholder="{{ __('admin/admin-add-home-slider.subtitle') }}"
                                        class="form-control input-md" wire:model="subtitle" />
                                    @error('subtitle')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 control-label">{{ __('admin/admin-add-home-slider.salary') }}
                                    <span class="star">*</span>
                                </div>
                                <div class="col-md-4">
                                    <input type="text"
                                        placeholder="{{ __('admin/admin-add-home-slider.salary') }}"
                                        class="form-control input-md" wire:model="salary" />
                                    @error('salary')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 control-label">{{ __('admin/admin-add-home-slider.link') }}
                                    <span class="star">*</span>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" placeholder="{{ __('admin/admin-add-home-slider.link') }}"
                                        class="form-control input-md" wire:model="link" />
                                    @error('link')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 control-label">{{ __('admin/admin-add-home-slider.image') }}
                                    <span class="star">*</span>
                                </div>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" wire:model="image" />
                                    @if ($image)
                                        <img src="{{ $image->temporaryUrl() }}" width="120" />
                                    @endif
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 control-label">{{ __('admin/admin-add-home-slider.status') }}
                                    <span class="star">*</span>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="status">
                                        <option value="0">{{ __('admin/admin-add-home-slider.inactive') }}
                                        </option>
                                        <option value="1">{{ __('admin/admin-add-home-slider.active') }}
                                        </option>
                                    </select>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 control-label"></div>
                                <div class="col-md-4">
                                    <button type="submit"
                                        class="btn btn-primary">{{ __('admin/admin-add-home-slider.submit') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
