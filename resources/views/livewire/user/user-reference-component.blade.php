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
        <a wire:click="addReference()" style="color: red; font-size:18px;">
            <i class="fa fa-plus-circle"></i> {{ __('user/user-experience.add_reference') }}
        </a>
        <p style="font-style: italic; font-size:13px; margin-left:20px;">{{ __('user/user-experience.re_noti') }}</p>
    </div>
    <div class="panel-body">
        @if ($isOpen_re)
            <div class="panel panel-success">
                <div class="panel-heading">{{ __('user/user-experience.re') }}</div>
                <div class="panel-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="re_name">{{ __('user/user-experience.name') }} *</label>
                                <input type="text" class="form-control" id="re_name" wire:model="re_name">
                                @error('re_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="re_positon">{{ __('user/user-experience.position') }} *</label>
                                <input type="text" class="form-control" id="re_positon" wire:model="re_position">
                                @error('re_positon')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="re_company">{{ __('user/user-experience.company') }} *</label>
                            <input type="text" class="form-control" id="re_company" wire:model="re_company">
                            @error('re_company')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="re_email">{{ __('user/user-experience.email') }} *</label>
                                <input type="email" class="form-control" id="re_email" wire:model="re_email">
                                @error('re_email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="re_phone">{{ __('user/user-experience.phone') }} *</label>
                                <input type="text" class="form-control" id="re_phone" wire:model="re_phone">
                                @error('re_phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12" style="margin-top:20px; ">
                                <button wire:click.prevent="storeReference"
                                    class="btn btn-success">{{ __('user/user-experience.save') }}</button>
                                <button wire:click="closeModalRe()" type="button" class="btn btn-light">
                                    {{ __('user/user-experience.cancel') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endif
        <br>
        @foreach ($references as $re)
            @if ($re->user_id === Auth::user()->id)
                <div class="col-md-5 no-padding lib-item" data-category="view">
                    <div class="lib-panel">
                        <div class="row box-shadow">
                            <div class="panel-body">
                                <div class="panel-body-left" style="float: left;">
                                    <h5><strong>{{ $re->name }}</strong></h5>
                                    <h5><strong>{{ $re->position }}</strong></h5>
                                    <h5>{{ $re->company }}</h5>
                                    <p class="card-text">
                                        <strong>
                                            <i class="fa fa-calendar" style="color: rgb(102, 102, 233)"></i>
                                            {{ $re->email }}
                                        </strong>
                                    </p>
                                    <p class="card-text">
                                        <strong>
                                            <i class="fa fa-calendar" style="color: rgb(102, 102, 233)"></i>
                                            {{ $re->phone }}
                                        </strong>
                                    </p>
                                </div>
                                <div class="panel-body-right" style="float: right">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"
                                        wire:click="editReference({{ $re->id }})"
                                        style="color: rgb(63, 136, 245); font-size: 18px;"></i>
                                    <i class="fa fa-trash" aria-hidden="true"
                                        onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                        wire:click.prevent="deleteReference({{ $re->id }})"
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
