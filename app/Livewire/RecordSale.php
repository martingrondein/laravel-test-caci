<?php

namespace App\Livewire;

use App\Models\Sales;
use Livewire\Component;
use App\Models\Products;
use Akaunting\Money\Money;
use Akaunting\Money\Currency;
use Livewire\Attributes\Validate;

class RecordSale extends Component
{
    public $products = [];

    public $product;

    #[Validate]
    public $quantity;

    #[Validate]
    public $unit_cost;

    public $cost;

    public $selling_price;

    public $profit_margin = 0.15;

    public $shipping_cost = 10;

    public function rules()
    {
        return [
            'quantity' => 'required|numeric',
            'unit_cost' => 'required|numeric|between:0,999.99',
        ];
    }

    /**
     * Calculates the cost of the sale as the user types
     *
     * @return void
     */
    public function calculate_cost()
    {
        (!is_numeric($this->quantity)) ? $this->quantity = 0 : '';
        (!is_numeric($this->unit_cost)) ? $this->unit_cost = 0 : '';

        $this->cost = number_format($this->quantity * $this->unit_cost,2);

    }

    /**
     * Save the record sale data
     *
     * @return void
     */
    public function save()
    {
        $this->validate();

        Sales::create(
            $this->only(['product', 'quantity', 'unit_cost', 'selling_price'])
        );

        // Update the Previous Sales component
        $this->dispatch('sale-recorded');

        // Reset the form
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
        $this->calculate_cost();

        $this->products = Products::all();

        $this->selling_price = "£" . Money::GBP(($this->cost / (1 - $this->profit_margin)) + $this->shipping_cost,false)->getAmount();

        return view('livewire.record-sale');
    }
}
