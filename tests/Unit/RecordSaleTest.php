<?php

namespace Tests\Unit\Livewire;

use Tests\TestCase;
use App\Livewire\RecordSale;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

class RecordSaleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Part 1 Test case for calculating the selling price in different scenarios
     */
    public function test_part1_selling_price_calculations()
    {
        $profit_margin = 0.25; // 25%
        $shipping_cost = 10;

        // Calculation 1
        Livewire::test(RecordSale::class)
            ->set('quantity', 1)
            ->set('unit_cost', 10)
            ->set('profit_margin', $profit_margin)
            ->set('shipping_cost', $shipping_cost)
            ->assertSet('selling_price', '£23.33');

        // Calculation 2
        Livewire::test(RecordSale::class)
            ->set('quantity', 2)
            ->set('unit_cost', 20.50)
            ->set('profit_margin', $profit_margin)
            ->set('shipping_cost', $shipping_cost)
            ->assertSet('selling_price', '£64.67');

        // Calculation 3
        Livewire::test(RecordSale::class)
            ->set('quantity', 5)
            ->set('unit_cost', 12)
            ->set('profit_margin', $profit_margin)
            ->set('shipping_cost', $shipping_cost)
            ->assertSet('selling_price', '£90');
    }

    /**
     * Part 2 Test case for calculating the selling price in different scenarios
     */
    public function test_part2_selling_price_calculations()
    {
        $profit_margin = 0.15; // 15%
        $shipping_cost = 10;

        // Calculation 1
        Livewire::test(RecordSale::class)
            ->set('quantity', 1)
            ->set('unit_cost', 10)
            ->set('profit_margin', $profit_margin)
            ->set('shipping_cost', $shipping_cost)
            ->assertSet('selling_price', '£21.76');

        // Calculation 2
        Livewire::test(RecordSale::class)
            ->set('quantity', 2)
            ->set('unit_cost', 20.50)
            ->set('profit_margin', $profit_margin)
            ->set('shipping_cost', $shipping_cost)
            ->assertSet('selling_price', '£58.24');

        // Calculation 3
        Livewire::test(RecordSale::class)
            ->set('quantity', 5)
            ->set('unit_cost', 12.00)
            ->set('profit_margin', $profit_margin)
            ->set('shipping_cost', $shipping_cost)
            ->assertSet('selling_price', '£80.59');
    }
}
