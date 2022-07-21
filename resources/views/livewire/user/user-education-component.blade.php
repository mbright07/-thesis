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
        <a wire:click="addEducation" style="color: red; font-size:18px;">
            <i class="fa fa-plus-circle"></i> {{ __('user/user-experience.add_education') }}
        </a>
        <p style="font-style: italic; font-size:13px; margin-left:20px;">{{ __('user/user-experience.edu_noti') }}</p>
    </div>
    <div class="panel-body">
        @if ($isOpen_edu)
            <div class="panel panel-success">
                <div class="panel-heading">{{ __('user/user-experience.edu') }}</div>
                <div class="panel-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="subject">{{ __('user/user-experience.subject') }} *</label>
                                <input type="text" class="form-control" id="positon" wire:model="subject">
                                @error('subject')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="school">{{ __('user/user-experience.school') }} *</label>
                                <input type="text" class="form-control" id="school" wire:model="school">
                                @error('school')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="qualification">{{ __('user/user-experience.qualification') }} *</label>
                                <select class="form-control" id="qualification" wire:model="qualification">
                                    {{-- <option>--Select qualification--
                                    </option> --}}
                                    <option value="high_school">{{ __('user/user-experience.high_school') }}</option>
                                    <option value="associate_degree">{{ __('user/user-experience.associate_degree') }}
                                    </option>
                                    <option value="college">{{ __('user/user-experience.college') }}</option>
                                    <option value="bachelors">{{ __('user/user-experience.bachelors') }}</option>
                                    <option value="masters">{{ __('user/user-experience.masters') }}</option>
                                    <option value="doctorate">{{ __('user/user-experience.doctorate') }}</option>
                                    <option value="others">{{ __('user/user-experience.others') }}</option>
                                </select>
                                @error('qualification')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="edu_from_month">{{ __('user/user-experience.from') }} *</label>
                                <input type="date" class="form-control" id="edu_from_month"
                                    wire:model="edu_from_month">
                                @error('edu_from_month')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="edu_to_month">{{ __('user/user-experience.to') }} *</label>
                                <input type="date" class="form-control" id="edu_to_month" wire:model="edu_to_month">
                                @error('edu_to_month')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="achievement">{{ __('user/user-experience.achievement') }} *</label>
                                <textarea type="text" class="form-control" name="achievement" id="achievement" wire:model="achievement"></textarea>
                                @error('achievement')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12" style="margin-top:20px; ">
                                <button wire:click.prevent="storeEducation"
                                    class="btn btn-success">{{ __('user/user-experience.save') }}</button>
                                <button wire:click="closeModalEdu()" type="button" class="btn btn-light">
                                    {{ __('user/user-experience.cancel') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endif
        <br>
        @foreach ($my_education as $my_education)
            @if ($my_education->user_id === Auth::user()->id)
                <div class="col-md-5 no-padding lib-item" data-category="view">
                    <div class="lib-panel">
                        <div class="row box-shadow">
                            <div class="panel-body">
                                <div class="panel-body-left" style="float: left;">
                                    <h5><strong>{{ $my_education->subject }}</strong></h5>
                                    <h5>{{ $my_education->school }}</h5>
                                    <p class="font-style:italic">
                                        <i class="fa fa-graduation-cap"
                                            aria-hidden="true"></i>{{ $my_education->qualifications }}
                                    </p>
                                    <p class="card-text">
                                        <strong>
                                            <i class="fa fa-calendar" style="color: rgb(102, 102, 233)"></i>
                                            {{ $my_education->from_month }} -
                                            {{ $my_education->to_month }}
                                        </strong>
                                    </p>
                                    <p class="card-text">
                                        <i class="fa fa-trophy" aria-hidden="true" style="color: rgb(245, 245, 42)"></i>
                                        {{ $my_education->achievements }}
                                    </p>
                                </div>
                                <div class="panel-body-right" style="float: right">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"
                                        wire:click="editEducation({{ $my_education->id }})"
                                        style="color: rgb(63, 136, 245); font-size: 18px;"></i>
                                    <i class="fa fa-trash" aria-hidden="true"
                                        onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                        wire:click.prevent="deleteEducation({{ $my_education->id }})"
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
