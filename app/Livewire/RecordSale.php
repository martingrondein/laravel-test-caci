<?php

namespace App\Livewire;

use App\Models\Sales;
use Livewire\Component;
use App\Models\Products;
use Akaunting\Money\Money;
use Livewire\Attributes\Validate;

class RecordSale extends Component
{
    public $products = [];

    #[Validate('required|numeric')]
    public $product;

    #[Validate('required|numeric')]
    public $quantity;

    #[Validate('required|numeric|between:0,999.99')]
    public $unit_cost;

    #[Validate('required', onUpdate: true)]
    public $selling_price;

    public $cost;

    public $profit_margin = 0.15;

    public $shipping_cost = 10;

    /**
     * Calculates the cost of the sale as the user types
     *
     * @return void
     */
    public function calculate_cost()
    {
        // Always enforce the quantity and unit_cost to be numeric
        (!is_numeric($this->quantity)) ? $this->quantity = 0 : $this->quantity;
        (!is_numeric($this->unit_cost)) ? $this->unit_cost = 0 : $this->unit_cost;

        $this->cost = number_format($this->quantity * $this->unit_cost, 2);
    }

    /**
     * Save the record sale data
     *
     * @return void
     */
    public function save()
    {
        $validated = $this->validate();

        Sales::create($validated);

        // Update the Previous Sales component
        $this->dispatch('sale-recorded');

        // Reset the form
        $this->reset();
    }

    /**
     * Calculates the cost, selling price, and updates the view.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        $this->calculate_cost();

        $this->products = Products::all();

        $this->selling_price = "£" . Money::GBP(($this->cost / (1 - $this->profit_margin)) + $this->shipping_cost, false)->getAmount();

        return view('livewire.record-sale');
    }
}
