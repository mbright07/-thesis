<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class AdminAddPostComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $image;
    public $description;
    public $status;
    public $slug;

    public function mount()
    {
        $this->status = 0;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required',
            'description' => 'required',
            'slug' => 'required|unique:posts',
            'image' => 'required|mimes:jpeg,png,jpg',
            'status' => 'required'
        ]);
    }

    public function addPost()
    {
        $this->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
            'status' => 'required'
        ]);
        $post = new Post();
        $post->title = $this->title;
        $post->slug = $this->slug;
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('posts', $imageName);
        $post->image = $imageName;
        $post->description = $this->description;
        $post->status = $this->status;
        $post->save();
        session()->flash('message', 'Post has been created successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-post-component')->layout('layouts.base');
    }
}
