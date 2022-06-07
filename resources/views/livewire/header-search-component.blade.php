<div class="wrap-search center-section">
    <div class="wrap-search-form">
        <form action="{{ route('job.search') }}" id="form-search-top" name="form-search-top">
            <input type="text" name="search" value="{{ $search }}" placeholder="{{ __('search.here') }}">
            <button form="form-search-top" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            <div class="wrap-list-cate">
                <input type="hidden" name="job_cat" value="{{ $job_cat }}" id="job-cate">
                <input type="hidden" name="job_cat_id" value="{{ $job_cat_id }}" id="job-cate-id">
                <a href="#" class="link-control">{{ str_split($job_cat, 12)[0] }}</a>
                <ul class="list-cate">
                    <li class="level-0">{{ __('search.all_location') }}</li>
                    @foreach ( $categories as $category )
                        <li class="level-1" data-id="{{ $category->id }}">{{ $category->name }}</li>                        
                    @endforeach                    
                </ul>
            </div>
        </form>
    </div>
</div>
