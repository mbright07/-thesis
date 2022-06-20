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
        <a wire:click="addLanguage()" style="color: red; font-size:18px;">
            <i class="fa fa-plus-circle"></i> Add Language
        </a>
        <p style="font-style: italic; font-size:13px; margin-left:20px;">Cập nhật thông tin ngoại ngữ, điều này sẽ giúp
            tăng triển vọng tìm kiếm công việc.</p>
    </div>
    <div class="panel-body">
        @if ($isOpen_lang)
            <div class="panel panel-success">
                <div class="panel-heading">Language</div>
                <div class="panel-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="language">Language *</label>
                                <input type="text" class="form-control" id="language" wire:model="language">
                                @error('language')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="lang_proficiency">proficiency *</label>
                                <select class="form-control" id="proficiency" wire:model="lang_proficiency">
                                    <option>--Select proficiency--</option>
                                    <option value="beginner">beginner</option>
                                    <option value="intermediate">intermediate</option>
                                    <option value="advanced">advanced</option>
                                    <option value="native">native</option>
                                </select>
                                @error('lang_proficiency')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <button wire:click.prevent="storeLanguage()" class="btn btn-success">Save</button>
                        <button wire:click="closeModalLang" type="button">
                            Cancel
                        </button>
                    </form>
                </div>
            </div>
        @endif
        <br>
        @foreach ($languages as $lang)
            @if ($lang->user_id === Auth::user()->id)
                <div class="col-md-5 no-padding lib-item" data-category="view">
                    <div class="lib-panel">
                        <div class="row box-shadow">
                            <div class="panel-body">
                                <div class="panel-body-left" style="float: left;">
                                    <h5><strong>{{ $lang->language }}</strong></h5>
                                    <h5>{{ $lang->proficiency }}</h5>
                                </div>
                                <div class="panel-body-right" style="float: right">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"
                                        wire:click="editLanguage({{ $lang->id }})"
                                        style="color: rgb(63, 136, 245); font-size: 18px;"></i>
                                    <i class="fa fa-trash" aria-hidden="true"
                                        onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                        wire:click.prevent="deleteLanguage({{ $lang->id }})"
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
