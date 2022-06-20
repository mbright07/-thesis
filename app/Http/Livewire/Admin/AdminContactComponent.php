<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class AdminContactComponent extends Component
{
    use WithPagination;
    public $search;
    public $sortBy = 'ASC';

    public function render()
    {
        $contacts = Contact::paginate(12);
        return view('livewire.admin.admin-contact-component', [
            'contacts' => $contacts,
            'contacts' => Contact::when($this->sortBy, function ($query) {
                $query->orderBy('created_at', $this->sortBy);
            })->search(trim($this->search))
                ->paginate(10),
        ])->layout('layouts.base');
    }
}
