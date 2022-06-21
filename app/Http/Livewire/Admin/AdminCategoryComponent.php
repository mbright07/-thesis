<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;
    public $search;

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        session()->flash('message', 'Location has been deleted successfully!');
    }

    public function deleteSubCategory($id)
    {
        $sub_category = Subcategory::find($id);
        $sub_category->delete();
        session()->flash('message', 'Sub Location has been deleted successfully!');
    }

    public function render()
    {
        $search = "%" . $this->search . "%";
        $categories = Category::where('name', 'LIKE', $search)->paginate(5);


        return view('livewire.admin.admin-category-component', ['categories' => $categories])->layout('layouts.admin-base');
    }
}
