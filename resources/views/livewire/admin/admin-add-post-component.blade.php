<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                {{ __('admin/admin-posts.add_post') }}
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.posts') }}"
                                    class="btn btn-success pull-right">{{ __('admin/admin-posts.all_posts') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="addPost">
                            <div class="form-group">
                                <label class="col-md-2 control-label">{{ __('admin/admin-posts.title') }}</label>
                                <div class="col-md-9">
                                    <input type="text" placeholder="{{ __('admin/admin-posts.title') }}"
                                        class="form-control input-md" wire:model="title" wire:keyup="generateSlug" />
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">{{ __('admin/admin-posts.slug') }}</label>
                                <div class="col-md-9">
                                    <input type="text" placeholder="{{ __('admin/admin-posts.slug') }}"
                                        class="form-control input-md" wire:model="slug" />
                                    @error('slug')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">{{ __('admin/admin-posts.short_des') }}</label>
                                <div class="col-md-9" wire:ignore>
                                    <textarea class="form-control" id="short_description" placeholder="{{ __('admin/admin-posts.short_des') }}"
                                        wire:model="short_description"></textarea>
                                    @error('short_description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">{{ __('admin/admin-posts.image') }}</label>
                                <div class="col-md-9">
                                    <input type="file" class="input-file" wire:model="image" />
                                    @if ($image)
                                        <img src="{{ $image->temporaryUrl() }}" width="120" />
                                    @endif
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">{{ __('admin/admin-posts.des') }}</label>
                                <div class="col-md-9" wire:ignore>
                                    <textarea class="form-control" id="description" placeholder="{{ __('admin/admin-posts.des') }}"
                                        wire:model="description"></textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-2 control-label">{{ __('admin/admin-posts.status') }}</div>
                                <div class="col-md-9">
                                    <select class="form-control" wire:model="status">
                                        <option value="0">{{ __('admin/admin-add-home-slider.inactive') }}
                                        </option>
                                        <option value="1">{{ __('admin/admin-add-home-slider.active') }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit"
                                        class="btn btn-primary">{{ __('admin/admin-posts.submit') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(function() {
            tinymce.init({
                selector: '#short_description',
                setup: function(editor) {
                    editor.on('Change', function(e) {
                        tinyMCE.triggerSave();
                        var sd_data = $('#short_description').val();
                        @this.set('short_description', sd_data);
                    });
                }
            });

            tinymce.init({
                selector: '#description',
                setup: function(editor) {
                    editor.on('Change', function(e) {
                        tinyMCE.triggerSave();
                        var d_data = $('#description').val();
                        @this.set('description', d_data);
                    });
                }
            });
        });
    </script>
@endpush
