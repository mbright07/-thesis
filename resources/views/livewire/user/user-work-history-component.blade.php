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
        <a wire:click="addWorkHistory()" style="color: red; font-size:18px;">
            <i class="fa fa-plus-circle"></i> Add Work History
        </a>
        <p style="font-style: italic; font-size:13px; margin-left:20px;">Mô tả toàn bộ quá trình học vấn của bạn, cũng
            như các bằng cấp bạn đã được và các khóa huấn luyện bạn đã tham gia</p>
    </div>
    <div class="panel-body">
        @if ($isOpen_work)
            <div class="panel panel-success">
                <div class="panel-heading">Work History</div>
                <div class="panel-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="positon">Position *</label>
                                <input type="text" class="form-control" id="positon" wire:model="position">
                                @error('positon')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="company">Company *</label>
                                <input type="text" class="form-control" id="positon" wire:model="company">
                                @error('company')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="from_month">From Month *</label>
                                <input type="date" class="form-control" id="from_month" wire:model="from_month">
                                @error('from_month')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="to_month">To Month *</label>
                                <input type="date" class="form-control" id="to_month" wire:model="to_month">
                                @error('to_month')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="description">Description *</label>
                                <textarea type="text" class="form-control" name="description" id="description" wire:model="description"></textarea>
                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <button wire:click.prevent="storeWorkHistory" class="btn btn-success">Save</button>
                        <button wire:click="closeModalWorkHistory()" type="button">
                            Cancel
                        </button>
                    </form>
                </div>
            </div>
        @endif
        <br>
        @foreach ($work_histories as $work_history)
            @if ($work_history->user_id === Auth::user()->id)
                <div class="col-md-5 no-padding lib-item" data-category="view">
                    <div class="lib-panel">
                        <div class="row box-shadow">
                            <div class="panel-body">
                                <div class="panel-body-left" style="float: left;">
                                    <h5><strong>{{ $work_history->position }}</strong></h5>
                                    <h5>{{ $work_history->company }}</h5>
                                    <p class="card-text">
                                        <strong>
                                            <i class="fa fa-calendar" style="color: rgb(102, 102, 233)"></i>
                                            {{ $work_history->from_month }} -
                                            {{ $work_history->to_month }}
                                        </strong>
                                    </p>
                                    <p class="card-text">{{ $work_history->description }}</p>
                                </div>
                                <div class="panel-body-right" style="float: right">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"
                                        wire:click="editWorkHistory({{ $work_history->id }})"
                                        style="color: rgb(63, 136, 245); font-size: 18px;"></i>
                                    <i class="fa fa-trash" aria-hidden="true"
                                        onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                        wire:click.prevent="deleteWorkHistory({{ $work_history->id }})"
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
