<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }
    </style>
    <div>
        <a wire:click="addWorkPreference()" style="color: red; font-size:18px;">
            <i class="fa fa-plus-circle"></i> {{ __('user/user-experience.add_work_pre') }}
        </a>
        <p style="font-style: italic; font-size:13px; margin-left:20px;">{{ __('user/user-experience.work_pre_noti') }}
        </p>
    </div>
    <div class="panel-body">
        @if ($isOpen_pre)
            <div class="panel panel-success">
                <div class="panel-heading">{{ __('user/user-experience.work_pre') }}</div>
                <div class="panel-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="expected_location">{{ __('user/user-experience.ex_loca') }} *</label>
                                <select class="form-control" id="expected_location" wire:model="category_id">
                                    <option>--{{ __('user/user-experience.select_ex_loca') }}--</option>
                                    @foreach ($categories as $item)
                                        <option value={{ $item->id }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="expected_salary">{{ __('user/user-experience.ex_sala') }} *</label>
                                <input type="text" class="form-control" id="expected_salary"
                                    wire:model="expected_salary">
                                @error('expected_salary')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="type">
                                    {{ __('admin/admin-add-job.type') }}
                                    <span class="star">*</span>
                                </label>
                                <div id="type">
                                    <select class="form-control" wire:model="type">
                                        <option value="1">{{ __('admin/admin-add-job.fulltime') }}</option>
                                        <option value="2">{{ __('admin/admin-add-job.parttime') }}</option>
                                    </select>
                                    @error('type')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""></label>
                            <div>
                                <button wire:click.prevent="storeWorkPreference()"
                                    class="btn btn-success">{{ __('user/user-experience.save') }}</button>
                                <button wire:click="closeModalPre()" type="button" class="btn btn-light">
                                    {{ __('user/user-experience.cancel') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endif
        <br>
        @foreach ($work_preferences as $per)
            @if ($per->user_id === Auth::user()->id)
                <div class="col-md-5 no-padding lib-item" data-category="view">
                    <div class="lib-panel">
                        <div class="row box-shadow">
                            <div class="panel-body">
                                <div class="panel-body-left" style="float: left;">
                                    <h5>{{ __('user/user-experience.ex_loca') }}:
                                        {{-- <strong>{{ $per->expected_location}}</strong> --}}
                                    </h5>
                                    <h5>{{ __('user/user-experience.ex_sala_month') }}:
                                        <strong>{{ $per->expected_salary }}</strong>
                                    </h5>
                                    <h5>{{ __('user/user-experience.type') }}:
                                        @if ($per->type === 1)
                                            <strong>{{ __('admin/admin-add-job.fulltime') }}</strong>
                                        @else
                                            <strong>{{ __('admin/admin-add-job.parttime') }}</strong>
                                        @endif
                                    </h5>
                                </div>
                                <div class="panel-body-right" style="float: right">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"
                                        wire:click="editWorkPreference({{ $per->id }})"
                                        style="color: rgb(63, 136, 245); font-size: 18px;"></i>
                                    <i class="fa fa-trash" aria-hidden="true"
                                        onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                        wire:click.prevent="deleteWorkPreference({{ $per->id }})"
                                        style="color: rgb(248, 66, 66); font-size: 18px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            @endif
        @endforeach
    </div>
</div>
