<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class DetailPostComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function render()
    {
        $post = Post::where('slug', $this->slug)->first();
        $popular_posts = Post::inRandomOrder()->limit(5)->get();
        $lposts = Post::orderBy('created_at', 'DESC')->get()->take(8);
        return view('livewire.detail-post-component', ['post' => $post, 'popular_posts' => $popular_posts, 'lposts' => $lposts,])->layout('layouts.base');
    }
}
