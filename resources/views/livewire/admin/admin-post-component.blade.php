<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }
    </style>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                All Posts
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.addpost') }}" class="btn btn-success pull-right">Add New
                                    Post</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <table class='table table-striped'>
                            <thead>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Title</th>
                                {{-- <th>Description</th> --}}
                                <th>Status</th>
                                <th>Created Time</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td> <img src="{{ asset('assets/images/posts') }}/{{ $post->image }}"
                                                width="100" /></td>
                                        <td><strong>{{ $post->title }}</strong></td>
                                        {{-- <td>{{ substr($post->description, 0, 35) }}</td> --}}
                                        <td>{{ $post->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td>{{ $post->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.editpost', ['post_id' => $post->id]) }}">
                                                <i class="fa fa-edit fa-2x text-info"></i>
                                            </a>
                                            <a href="#"
                                                onclick="confirm('{{ __('admin/admin-add-job.sure') }}') || event.stopImmediatePropagation()"
                                                wire:click.prevent="deletePost({{ $post->id }})"
                                                style="margin-left: 10px;"><i
                                                    class="fa fa-times fa-2x text-danger"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
