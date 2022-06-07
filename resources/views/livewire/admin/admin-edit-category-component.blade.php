<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                {{ __('admin/admin-edit-category.edit_location') }}
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.categories') }}" class="btn btn-success pull-right">{{ __('admin/admin-edit-category.all_locations') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        
                        <form class="form-horizontal" wire:submit.prevent="updateCategory">
                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ __('admin/admin-edit-category.location_name') }}</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="{{ __('admin/admin-edit-category.location_name') }}" class="form-control input-md" wire:model="name" wire:keyup="generateslug" />
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ __('admin/admin-edit-category.location_slug') }}</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Location Slug" class="form-control input-md" wire:model="slug" />
                                    @error('slug')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            @if ($this->sub_category_id)
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">{{ __('admin/admin-edit-category.parent_location') }}</label>
                                    <div class="col-md-4">
                                        <select class="form-control input-md" wire:model="category_id">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('slug') <p class="text-danger">{{ $message }}</p>  @enderror
                                    </div>
                                </div>
                            @endif

                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">{{ __('admin/admin-edit-category.update') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
