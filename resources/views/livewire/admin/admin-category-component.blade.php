<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display:block !important;
        }
    </style>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">{{ __('admin/admin-category.all_locations') }}</div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.addcategory') }}" class="btn btn-success pull-right">{{ __('admin/admin-category.add_location') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>   
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>{{ __('admin/admin-category.location_name') }}</th>
                                    <th>{{ __('admin/admin-category.location_slug') }}</th>
                                    <th>{{ __('admin/admin-category.sub_location') }}</th>
                                    <th>{{ __('admin/admin-category.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>
                                            <ul class="sclist">
                                                @foreach ($category->subCategory as $sub_category )
                                                    <li>
                                                        <i class="fa fa-caret-right"></i>{{ $sub_category->name }} 
                                                        <a href="{{ route('admin.editcategory',['category_slug'=>$category->slug,'sub_category_slug'=>$sub_category->slug]) }}" class="slink">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="#" onclick="confirm('{{ __('admin/admin-category.sub_sure') }}') || event.stopImmediatePropagation()" wire:click.prevent="deleteSubCategory({{ $sub_category->id }})" class="slink">
                                                            <i class="fa fa-times text-danger"></i>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.editcategory',['category_slug'=>$category->slug]) }}"><i class="fa fa-edit fa-2x"></i></a>
                                            <a href="#" onclick="confirm('{{ __('admin/admin-category.sure') }}') || event.stopImmediatePropagation()" wire:click.prevent="deleteCategory({{ $category->id }})" style="margin-left: 10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                        </td>
                                    </tr>    
                                @endforeach
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
