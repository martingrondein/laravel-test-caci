<div>
    <form wire:submit="save">

        <div class="flex flex-row ">
            <div class="flex-col-3 ">
                <label for="quantity" class="text-gray-700">Quantity</label>
                <input type="number" wire:model="quantity" id="quantity" name="quantity" min="1" step="1" required
                    class="px-3 py-2 border border-gray-300 rounded-md w-28" wire:input="calculate_cost">
            </div>

            <div class="px-3 flex-col-3 ">
                <label for="unit_cost" class="text-gray-700 ">Unit Cost (£)</label>
                <input type="number" wire:model="unit_cost" id="unit_cost" name="unit_cost" min="0.01" step="0.01" required
                    class="px-3 py-2 border border-gray-300 rounded-md w-28" wire:input="calculate_cost">
            </div>

            <div class="px-3 flex-col-3 ">
                <label for="selling_price" class="text-gray-700 ">Selling Price</label>
                <input type="text" wire:model="selling_price" id="selling_price" name="selling_price" readonly
                    disabled class="px-3 py-2 border-none w-28">
            </div>

            <div class="px-3 flex-col-3">
                <button type="submit" class="px-5 py-2 font-medium text-white bg-indigo-500 rounded-md">
                   Record Sale
                </button>
            </div>
        </div>

    </form>
</div>
