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
        <a wire:click="addSkill" style="color: red; font-size:18px;">
            <i class="fa fa-plus-circle"></i> {{ __('user/user-experience.add_skill') }}
        </a>
        <p style="font-style: italic; font-size:13px; margin-left:20px;">{{ __('user/user-experience.skill_noti') }}
        </p>
    </div>
    <div class="panel-body">
        @if ($isOpen_skill)
            <div class="panel panel-success">
                <div class="panel-heading">{{ __('user/user-experience.skill') }}</div>
                <div class="panel-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="skillname">{{ __('user/user-experience.skill_name') }} *</label>
                                <input type="text" class="form-control" id="skillname" wire:model="skillname">
                                @error('skillname')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="proficiency">{{ __('user/user-experience.proficiency') }} *</label>
                                <select class="form-control" id="proficiency" wire:model="proficiency">
                                    <option>--{{ __('user/user-experience.select_proficiency') }}--</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                @error('qualification')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <button wire:click.prevent="storeSkill()"
                            class="btn btn-success">{{ __('user/user-experience.save') }}</button>
                        <button wire:click="closeModalSkill()" type="button">
                            {{ __('user/user-experience.cancel') }}
                        </button>
                    </form>
                </div>
            </div>
        @endif
        <br>
        @foreach ($skills as $skill)
            @if ($skill->user_id === Auth::user()->id)
                <div class="col-md-5 no-padding lib-item" data-category="view">
                    <div class="lib-panel">
                        <div class="row box-shadow">
                            <div class="panel-body">
                                <div class="panel-body-left" style="float: left;">
                                    <h5><strong>{{ $skill->skill_name }}</strong></h5>
                                    <h5>{{ $skill->proficiency }}</h5>
                                </div>
                                <div class="panel-body-right" style="float: right">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"
                                        wire:click="editSkill({{ $skill->id }})"
                                        style="color: rgb(63, 136, 245); font-size: 18px;"></i>
                                    <i class="fa fa-trash" aria-hidden="true"
                                        onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                        wire:click.prevent="deleteSkill({{ $skill->id }})"
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
