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
        <a wire:click="addActivity()" style="color: red; font-size:18px;">
            <i class="fa fa-plus-circle"></i> {{ __('user/user-experience.add_activity') }}
        </a>
        <p style="font-style: italic; font-size:13px; margin-left:20px;">{{ __('user/user-experience.acti_noti') }}
        </p>
    </div>
    <div class="panel-body">
        @if ($isOpen_act)
            <div class="panel panel-success">
                <div class="panel-heading">{{ __('user/user-experience.act') }}</div>
                <div class="panel-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="activity_name">{{ __('user/user-experience.act_name') }} *</label>
                                <input type="text" class="form-control" id="activity_name"
                                    wire:model="activity_name">
                                @error('activity_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="activity_description">{{ __('user/user-experience.description') }}
                                    *</label>
                                <textarea type="text" class="form-control" id="activity_description" wire:model="activity_description"></textarea>
                                @error('activity_description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <button wire:click.prevent="storeActivity()"
                            class="btn btn-success">{{ __('user/user-experience.save') }}</button>
                        <button wire:click="closeModalSkill()" type="button">
                            {{ __('user/user-experience.cancel') }}
                        </button>
                    </form>
                </div>
            </div>
        @endif
        <br>
        @foreach ($activities as $act)
            @if ($act->user_id === Auth::user()->id)
                <div class="col-md-5 no-padding lib-item" data-category="view">
                    <div class="lib-panel">
                        <div class="row box-shadow">
                            <div class="panel-body">
                                <div class="panel-body-left" style="float: left;">
                                    <h5><strong>{{ $act->activity_name }}</strong></h5>
                                    <h5>{{ $act->description }}</h5>
                                </div>
                                <div class="panel-body-right" style="float: right">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"
                                        wire:click="editActivity({{ $act->id }})"
                                        style="color: rgb(63, 136, 245); font-size: 18px;"></i>
                                    <i class="fa fa-trash" aria-hidden="true"
                                        onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                        wire:click.prevent="deleteActivity({{ $act->id }})"
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
