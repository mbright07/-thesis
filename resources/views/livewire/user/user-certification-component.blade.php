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
        <a wire:click="addCertification()" style="color: red; font-size:18px;">
            <i class="fa fa-plus-circle"></i> {{ __('user/user-experience.add_certification') }}
        </a>
        <p style="font-style: italic; font-size:13px; margin-left:20px;">{{ __('user/user-experience.cer_noti') }}
        </p>
    </div>
    <div class="panel-body">
        @if ($isOpen_cer)
            <div class="panel panel-success">
                <div class="panel-heading">{{ __('user/user-experience.cer') }}</div>
                <div class="panel-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="certification_name">{{ __('user/user-experience.cer_name') }} *</label>
                                <input type="text" class="form-control" id="certification_name"
                                    wire:model="certification_name">
                                @error('certification_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="certification_description">{{ __('user/user-experience.description') }}
                                    *</label>
                                <textarea type="text" class="form-control" id="certification_description" wire:model="certification_description"></textarea>
                                @error('certification_description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12" style="margin-top:20px; ">
                                <button wire:click.prevent="storeCertification()"
                                    class="btn btn-success">{{ __('user/user-experience.save') }}</button>
                                <button wire:click="closeModalCer" type="button" class="btn btn-light">
                                    {{ __('user/user-experience.cancel') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endif
        <br>
        @foreach ($certifications as $cer)
            @if ($cer->user_id === Auth::user()->id)
                <div class="col-md-5 no-padding lib-item" data-category="view">
                    <div class="lib-panel">
                        <div class="row box-shadow">
                            <div class="panel-body">
                                <div class="panel-body-left" style="float: left;">
                                    <h5><strong>{{ $cer->certification_name }}</strong></h5>
                                    <h5>{{ $cer->description }}</h5>
                                </div>
                                <div class="panel-body-right" style="float: right">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"
                                        wire:click="editCertification({{ $cer->id }})"
                                        style="color: rgb(63, 136, 245); font-size: 18px;"></i>
                                    <i class="fa fa-trash" aria-hidden="true"
                                        onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                        wire:click.prevent="deleteCertification({{ $cer->id }})"
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
