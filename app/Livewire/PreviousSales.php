<?php

namespace App\Livewire;

use App\Models\Sales;
use Livewire\Component;

class PreviousSales extends Component
{
    public $sales;

    public function mount()
    {
        $this->sales = Sales::all();
    }


    public function render()
    {
        return view('livewire.previous-sales');
    }
}
