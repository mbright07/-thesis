<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                {{ __('admin/admin-add-category.add_location') }}
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.categories') }}"
                                    class="btn btn-success pull-right">{{ __('admin/admin-add-category.all_locations') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="storeCategory">
                            <div class="form-group">
                                <label
                                    class="col-md-4 control-label">{{ __('admin/admin-add-category.location_name') }}</label>
                                <div class="col-md-4">
                                    <input type="text"
                                        placeholder="{{ __('admin/admin-add-category.location_name') }}"
                                        class="form-control input-md" wire:model="name" wire:keyup="generateslug" />
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label
                                    class="col-md-4 control-label">{{ __('admin/admin-add-category.location_slug') }}</label>
                                <div class="col-md-4">
                                    <input type="text"
                                        placeholder="{{ __('admin/admin-add-category.location_slug') }}"
                                        class="form-control input-md" wire:model="slug" />
                                    @error('slug')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label
                                    class="col-md-4 control-label">{{ __('admin/admin-add-category.parent_location') }}</label>
                                <div class="col-md-4">
                                    <select class="form-control input-md" wire:model="category_id">
                                        <option value="">{{ __('admin/admin-add-category.none') }}</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit"
                                        class="btn btn-primary">{{ __('admin/admin-add-category.submit') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
