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
            <i class="fa fa-plus-circle"></i> Add Certification
        </a>
        <p style="font-style: italic; font-size:13px; margin-left:20px;">Chứng chỉ không ảnh hưởng đến bậc hồ sơ của bạn.
        </p>
    </div>
    <div class="panel-body">
        @if ($isOpen_cer)
            <div class="panel panel-success">
                <div class="panel-heading">Certification</div>
                <div class="panel-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="certification_name">Certification Name *</label>
                                <input type="text" class="form-control" id="certification_name"
                                    wire:model="certification_name">
                                @error('certification_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="certification_description">Description *</label>
                                <textarea type="text" class="form-control" id="certification_description" wire:model="certification_description"></textarea>
                                @error('certification_description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <button wire:click.prevent="storeCertification()" class="btn btn-success">Save</button>
                        <button wire:click="closeModalCer" type="button">
                            Cancel
                        </button>
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
