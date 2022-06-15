<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class AdminPostComponent extends Component
{
    use WithPagination;
    public function deletePost($id)
    {
        $post = Post::find($id);
        if ($post->image) {
            unlink('/assets/images/posts' . '/' . $post->image);
        }

        $post->delete();
        session()->flash('message', 'Post has been deleted successfully!');
    }
    public function render()
    {
        $posts = Post::paginate(10);
        return view('livewire.admin.admin-post-component', ['posts' => $posts])->layout('layouts.base');
    }
}
