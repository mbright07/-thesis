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
            <i class="fa fa-plus-circle"></i> Add Work Preference
        </a>
        <p style="font-style: italic; font-size:13px; margin-left:20px;">Thêm công việc mong muốn của bạn.
        </p>
    </div>
    <div class="panel-body">
        @if ($isOpen_pre)
            <div class="panel panel-success">
                <div class="panel-heading">Work Preference</div>
                <div class="panel-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="expected_location">Expected Location *</label>
                                <select class="form-control" id="expected_location" wire:model="expected_location">
                                    <option>--Select Expected Location--</option>
                                    @foreach ($categories as $item)
                                        <option value={{ str_replace(' ', '_', $item->name) }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('expected_location')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="expected_salary">expected_salary *</label>
                                <input type="text" class="form-control" id="expected_salary"
                                    wire:model="expected_salary">
                                @error('expected_salary')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <button wire:click.prevent="storeWorkPreference()" class="btn btn-success">Save</button>
                        <button wire:click="closeModalPre()" type="button">
                            Cancel
                        </button>
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
                                    <h5>Nơi làm việc:
                                        <strong>{{ str_replace('_', ' ', $per->expected_location) }}</strong>
                                    </h5>
                                    <h5>Mức lương mong muốn (USD / tháng):
                                        <strong>{{ $per->expected_salary }}</strong></h5>
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