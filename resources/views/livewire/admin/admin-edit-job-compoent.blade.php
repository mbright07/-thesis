<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                {{ __('admin/admin-add-job.edit') }}
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.jobs') }}" class="btn btn-success pull-right">{{ __('admin/admin-add-job.all_jobs') }}</a>    
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>   
                        @endif
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateJob">
                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ __('admin/admin-add-job.job_name') }}</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="{{ __('admin/admin-add-job.job_name') }}" class="form-control input-md" wire:model="name" wire:keyup="generateSlug" />
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ __('admin/admin-add-job.job_slug') }}</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="{{ __('admin/admin-add-job.job_slug') }}" class="form-control input-md" wire:model="slug" />
                                    @error('slug')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ __('admin/admin-add-job.short_description') }}</label>
                                <div class="col-md-4" wire:ignore>
                                    <textarea class="form-control" id="short_description" placeholder="{{ __('admin/admin-add-job.short_description') }}" wire:model="short_description"></textarea>
                                    @error('short_description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ __('admin/admin-add-job.description') }}</label>
                                <div class="col-md-4" wire:ignore>
                                    <textarea class="form-control" id="description" placeholder="{{ __('admin/admin-add-job.description') }}" wire:model="description"></textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ __('admin/admin-add-job.regular_salary') }}</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="{{ __('admin/admin-add-job.regular_salary') }}" class="form-control input-md" wire:model="regular_salary" />
                                    @error('regular_salary')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">SKU</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="SKU" class="form-control input-md" wire:model="SKU" />
                                    @error('SKU')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ __('admin/admin-add-job.stock') }}</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="stock_status">
                                        <option value="instock">{{ __('admin/admin-add-job.instock') }}</option>
                                        <option value="outofstock">{{ __('admin/admin-add-job.out_stock') }}</option>
                                    </select>
                                    @error('stock_status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ __('admin/admin-add-job.featured') }}</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="featured">
                                        <option value="0">{{ __('admin/admin-add-job.no') }}</option>
                                        <option value="1">{{ __('admin/admin-add-job.yes') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ __('admin/admin-add-job.quantity') }}</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="{{ __('admin/admin-add-job.quantity') }}" class="form-control input-md" wire:model="quantity"/>
                                    @error('quantity')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ __('admin/admin-add-job.image') }}</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" wire:model="newimage" />
                                    @if ($newimage)
                                        <img src="{{ $newimage->temporaryUrl() }}" width="120"/>
                                    @else
                                        <img src="{{ asset('assets/image/products') }}/{{ $image }}" width="120" />
                                    @endif
                                    @error('newimage')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ __('admin/admin-add-job.location') }}</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="category_id" wire:change="changeSubcategory">
                                        <option value="">{{ __('admin/admin-add-job.s_location') }}</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ __('admin/admin-add-job.sub_location') }}</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="sub_category_id">
                                        <option value="0">{{ __('admin/admin-add-job.s_location') }}</option>
                                        @foreach ($sub_categories as $sub_category)
                                            <option value="{{ $sub_category->id }}">{{ $sub_category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('sub_category_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">{{ __('admin/admin-add-job.update') }}</button>
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
        $(function(){
            tinymce.init({
                selector:'#short_description',
                setup:function(editor){
                    editor.on('Change',function(e){
                        tinyMCE.triggerSave();
                        var sd_data = $('#short_description').val();
                        @this.set('short_description',sd_data);
                    });
                }
            });

            tinymce.init({
                selector:'#description',
                setup:function(editor){
                    editor.on('Change',function(e){
                        tinyMCE.triggerSave();
                        var d_data = $('#description').val();
                        @this.set('description',d_data);
                    });
                }
            });
        });
    </script>
@endpush