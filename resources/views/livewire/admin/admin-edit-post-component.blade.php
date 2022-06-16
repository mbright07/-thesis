<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Edit Post
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.posts') }}" class="btn btn-success pull-right">All Posts</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updatePost">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Title</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Title" class="form-control input-md"
                                        wire:model="title" wire:keyup="generateSlug" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Slug</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="slug" class="form-control input-md"
                                        wire:model="slug" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label
                                    class="col-md-4 control-label">{{ __('admin/admin-add-job.short_description') }}</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" id="short_description"
                                        placeholder="{{ __('admin/admin-add-job.short_description') }}" wire:model="short_description"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Image</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" wire:model="newimage" />
                                    @if ($newimage)
                                        <img src="{{ $newimage->temporaryUrl() }}" width="120" />
                                    @else
                                        <img src="{{ asset('/assets/image/posts') }}/{{ $image }}"
                                            width="120" />
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">description</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" id="description" placeholder="description" wire:model="description"></textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 control-label">{{ __('admin/admin-add-home-slider.status') }}
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="status">
                                        <option value="0">{{ __('admin/admin-add-home-slider.inactive') }}</option>
                                        <option value="1">{{ __('admin/admin-add-home-slider.active') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">update</button>
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
