<?php

namespace App\Livewire;

use App\Models\Sales;
use Livewire\Component;
use Akaunting\Money\Money;

class RecordSale extends Component
{
    public $quantity;

    public $unit_cost;

    public $cost;

    public $selling_price;

    public $profit_margin = 0.25;

    public $shipping_cost = 10;

    /**
     * Calculates the cost of the sale as the user types
     *
     * @return void
     */
    public function calculate_cost()
    {
        // If the quantity is not set, default to 1
        (!$this->quantity) ? $this->quantity = 1 : $this->quantity;

        $this->cost = $this->quantity * $this->unit_cost;
    }

    /**
     * Save the record sale data
     *
     * @return void
     */
    public function save()
    {
        Sales::create(
            $this->only(['quantity', 'unit_cost', 'selling_price'])
        );

        $this->reset();
    }

    /**
     * Renders the view for recording a sale
     *
     * Calculates the cost, selling price, and updates the view.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {

        $this->cost = $this->quantity * $this->unit_cost;

        $this->selling_price = "£" . Money::GBP((($this->cost) / (1 - $this->profit_margin)) + $this->shipping_cost)->getAmount();

        return view('livewire.record-sale');
    }
}
