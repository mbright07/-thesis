<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;
use App\Models\Post;
use Illuminate\Support\Str;

class AdminEditPostComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $image;
    public $description;
    public $newimage;
    public $post_id;
    public $status;
    public $slug;

    public function mount($post_id)
    {
        $post = Post::find($post_id);
        $this->slug = $post->slug;
        $this->title = $post->title;
        $this->image = $post->image;
        $this->description = $post->description;
        $this->status = $post->status;
        $this->post_id = $post->id;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updatePost()
    {
        $post = Post::find($this->post_id);
        $post->title = $this->title;
        $post->slug = $this->slug;
        if ($this->newimage) {
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('posts', $imageName);
            $post->image = $imageName;
        }
        $post->description = $this->description;
        $post->status = $this->status;
        $post->save();
        session()->flash('message', 'Post has been updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-post-component')->layout('layouts.base');
    }
}
