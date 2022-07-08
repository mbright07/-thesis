<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        {{ __('admin/admin-setting.setting') }}
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="saveSettings">
                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ __('admin/admin-setting.email') }}</label>
                                <div class="col-md-4">
                                    <input type="email" placeholder="{{ __('admin/admin-setting.email') }}"
                                        class="form-control input-md" wire:model="email" />
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ __('admin/admin-setting.phone') }}</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="{{ __('admin/admin-setting.phone') }}"
                                        class="form-control input-md" wire:model="phone" />
                                    @error('phone')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ __('admin/admin-setting.phone2') }}</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="{{ __('admin/admin-setting.phone2') }}"
                                        class="form-control input-md" wire:model="phone2" />
                                    @error('phone2')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ __('admin/admin-setting.address') }}</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="{{ __('admin/admin-setting.address') }}"
                                        class="form-control input-md" wire:model="address" />
                                    @error('address')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ __('admin/admin-setting.map') }}</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="{{ __('admin/admin-setting.map') }}"
                                        class="form-control input-md" wire:model="map" />
                                    @error('map')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ __('admin/admin-setting.twitter') }}</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="{{ __('admin/admin-setting.twitter') }}"
                                        class="form-control input-md" wire:model="twitter" />
                                    @error('twitter')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label
                                    class="col-md-4 control-label">{{ __('admin/admin-setting.facebook') }}</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="{{ __('admin/admin-setting.facebook') }}"
                                        class="form-control input-md" wire:model="facebook" />
                                    @error('facebook')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ __('admin/admin-setting.pin') }}</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="{{ __('admin/admin-setting.pin') }}"
                                        class="form-control input-md" wire:model="pinterest" />
                                    @error('pinterest')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label
                                    class="col-md-4 control-label">{{ __('admin/admin-setting.instagram') }}</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="{{ __('admin/admin-setting.instagram') }}"
                                        class="form-control input-md" wire:model="instagram" />
                                    @error('instagram')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary"
                                        style="margin-left:40%">{{ __('admin/admin-setting.submit') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
