<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        {{ __('admin/admin-add-category.manage_home_locations') }}
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="updateHomeCategory">
                            <div class="form-group" wire:ignore>
                                <label class="col-md-4 control-label">
                                    {{ __('admin/admin-add-category.choose_locations') }} <span class="star">*</span></label>
                                <div class="col-md-4">
                                    <select class="select sel_categories form-control" name="categories[]"
                                        multiple="multiple" wire:model="selected_categories">
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('selected_categories')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"> {{ __('admin/admin-add-category.no_of_job') }} <span class="star">*</span>
                                </label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model="numberofjobs" />
                                </div>
                                @error('numberofjobs')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('admin/admin-add-category.save') }}</button>
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
        $(document).ready(function() {
            $('.sel_categories').select2();
            $('.sel_categories').on('change', function(e) {
                var data = $('.sel_categories').select2("val");
                @this.set('selected_categories', data);
            });
        });
    </script>
@endpush
