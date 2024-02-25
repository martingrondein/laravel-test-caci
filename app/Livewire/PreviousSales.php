<?php

namespace App\Livewire;

use App\Models\Products;
use App\Models\Sales;
use Livewire\Component;
use Livewire\Attributes\On;

class PreviousSales extends Component
{
    public $sales;

    public $product = Products::class;

    /**
     * Update the sales records when a sale is recorded.
     *
     * @return void
     */
    #[On('sale-recorded')]
    public function updateRecordSale()
    {
        $this->sales = Sales::all()->reverse();
        // $this->sales = Sales::with('product')->get();
    }

    /**
     * This method is called when the component is being mounted.
     * It retrieves all sales data and assigns it to the $sales property.
     *
     * @return void
     */
    public function mount()
    {

        $this->sales = Sales::all()->reverse();
    }

    /**
     * Renders the view for previous sales
     *
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {


        return view('livewire.previous-sales');
    }
}
