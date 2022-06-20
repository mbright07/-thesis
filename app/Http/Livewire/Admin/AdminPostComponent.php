<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;


class AdminPostComponent extends Component
{
    use WithPagination;
    public $active = null;
    public $search;
    public $sortBy = 'ASC';

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
        return view('livewire.admin.admin-post-component', [
            'posts' => Post::orderBy('created_at', 'ASC')->paginate(10),
            'posts' => Post::when($this->active, function ($query) {
                $query->where('status', $this->active);
            })->search(trim($this->search))
                ->orderBy('created_at', $this->sortBy)
                ->paginate(10),
        ])->layout('layouts.base');
    }
}
