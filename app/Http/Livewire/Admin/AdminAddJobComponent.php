<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Job;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class AdminAddJobComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_salary;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;
    public $sub_category_id;

    public function mount()
    {
        $this->stock_status = 'instock';
        $this->featured = 0;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:jobs',
            'short_description' => 'required',
            'description' => 'required',
            'regular_salary' => 'required|numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'image' => 'required|mimes:jpeg,png,jpg',
            'category_id' => 'required'
        ]);
    }
    public function addJob()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:jobs',
            'short_description' => 'required',
            'description' => 'required',
            'regular_salary' => 'required|numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'image' => 'required|mimes:jpeg,png,jpg',
            'category_id' => 'required'
        ]);
        $job = new Job();
        $job->user_id = Auth::user()->id;
        $job->name = $this->name;
        $job->slug = $this->slug;
        $job->short_description = $this->short_description;
        $job->description = $this->description;
        $job->regular_salary = $this->regular_salary;
        $job->SKU = $this->SKU;
        $job->stock_status = $this->stock_status;
        $job->featured = $this->featured;
        $job->quantity = $this->quantity;
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('products', $imageName);
        $job->image = $imageName;
        $job->category_id = $this->category_id;
        if ($this->sub_category_id) {
            $job->sub_category_id = $this->sub_category_id;
        }
        @$job->save();
        session()->flash('message', 'Job has been created successfully!');
    }

    public function changeSubcategory()
    {
        $this->sub_category_id = 0;
    }

    public function render()
    {
        $categories = Category::all();
        $sub_categories = Subcategory::where('category_id', $this->category_id)->get();
        return view('livewire.admin.admin-add-job-component', ['categories' => $categories, 'sub_categories' => $sub_categories])->layout('layouts.base');
    }
}
