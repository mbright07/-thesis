<?php

namespace App\Http\Livewire\Employer;

use Livewire\Component;

class EmployerDashBoardComponent extends Component
{
    public function render()
    {
        return view('livewire.employer.employer-dash-board-component')->layout('layouts.base');
    }
}
