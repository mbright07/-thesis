<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        {{ __('user/user-experience.change') }}
                    </div>
                    <div class="panel-body">
                        @if (Session::has('password_success'))
                            <div class="alert alert-success" role="alert">{{ Session::get('password_success') }}</div>
                        @endif
                        @if (Session::has('password_error'))
                            <div class="alert alert-danger" role="alert">{{ Session::get('password_error') }}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="changePassword">
                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ __('user/user-experience.current') }}</label>
                                <div class="col-md-4">
                                    <input type="password" placeholder="{{ __('user/user-experience.current') }}"
                                        class="form-control input-md" name="current_password"
                                        wire:model="current_password" />
                                    @error('current_password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ __('user/user-experience.new') }}</label>
                                <div class="col-md-4">
                                    <input type="password" placeholder="{{ __('user/user-experience.new') }}"
                                        class="form-control input-md" name="password" wire:model="password" />
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ __('user/user-experience.confirm') }}</label>
                                <div class="col-md-4">
                                    <input type="password" placeholder="{{ __('user/user-experience.confirm') }}"
                                        class="form-control input-md" name="password_confirm"
                                        wire:model="password_confirmation" />
                                    @error('password_confirmation')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit"
                                        class="btn btn-primary">{{ __('user/user-experience.submit') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
