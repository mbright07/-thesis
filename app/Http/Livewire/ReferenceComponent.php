<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Models\HomeSlider;
use Livewire\WithPagination;

class ReferenceComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $sliders = HomeSlider::where('status', 1)->get();
        $lposts = Post::orderBy('created_at', 'DESC')->get()->take(8);
        $top_views_posts = Post::orderBy('totalviews_post', 'DESC')->get()->take(8);
        $posts = Post::paginate(4);
        $popular_posts = Post::inRandomOrder()->limit(8)->get();
        return view('livewire.reference-component', [
            'posts' => $posts,
            'sliders' => $sliders,
            'lposts' => $lposts,
            'top_views_posts' => $top_views_posts,
            'popular_posts' => $popular_posts
        ])->layout('layouts.base');
    }
}
