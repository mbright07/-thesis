<div class="wrap-search center-section">
    <div class="wrap-search-form">
        <form action="{{ Auth::user() && Auth::user()->role_id === 3 ? route('employer.candidates') : route('jobs') }}" id="form-search-top" name="form-search-top">
            <input type="text" name="search" value="{{ $search }}" placeholder="{{ __('search.here') }}">
            <button form="form-search-top" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            <div class="wrap-list-cate">
                <input type="hidden" name="job_cat" value="{{ $job_cat }}" id="job-cate">
                <input type="hidden" name="job_cat_id" value="{{ $job_cat_id }}" id="job-cate-id">
                <input type="hidden" name="is_sub_cat" value="{{ $is_sub_cat }}" id="job-is_sub_cat">
                <a href="#" class="link-control">{{ $job_cat }}</a>
                <ul class="list-cate">
                    <li class="level-0">{{ __('search.all_location') }}</li>
                    @foreach ( $categories as $category )
                        <li class="level-1" data-id="{{ $category->id }}">{{ $category->name }}</li>
                        @if(Auth::user() && Auth::user()->role_id !== 3)
                            @if (count($category->subCategory) > 0)
                                    @foreach ($category->subCategory as $sub_category)
                                        <li class="level-2" data-id="{{ $sub_category->id }}" data-subcat="true">
                                            {{ $sub_category->name }}
                                        </li>
                                    @endforeach
                            @endif
                        @endif
                    @endforeach
                </ul>
            </div>
        </form>
    </div>
</div>
