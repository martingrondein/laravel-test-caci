<div>
    <form wire:submit="save">

        <div class="flex flex-row ">
            <div class="w-full flex-col-4">
                <label for="product" class="block text-gray-700">☕ Product</label>
                <select wire:model="product" id="product" name="product"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    <option value="">Choose a product</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="w-full px-2 flex-col-2 ">
                <label for="quantity" class="block text-gray-700">🔢 Quantity</label>
                <input type="number" wire:model="quantity" id="quantity" name="quantity" min="1" step="1"
                    required class="w-full px-3 py-2 border border-gray-300 rounded-md" wire:input="calculate_cost">
            </div>

            <div class="w-full px-2 flex-col-2 ">
                <label for="unit_cost" class="block text-gray-700">💵 Unit Cost (£)</label>
                <input type="number" wire:model="unit_cost" id="unit_cost" name="unit_cost" min="0.01"
                    step="0.01" required class="w-full px-3 py-2 border border-gray-300 rounded-md"
                    wire:input="calculate_cost">
            </div>

            <div class="w-full px-2 flex-col-2 ">
                <label for="selling_price" class="block text-gray-700 ">📈 Selling Price</label>
                <input type="text" wire:model="selling_price" id="selling_price" name="selling_price" readonly
                    disabled class="w-full px-3 py-2 border-none">
            </div>

            <div class="flex flex-col items-center justify-center w-full px-2">
                <button type="submit" class="px-5 py-2 font-medium text-white bg-indigo-500 rounded-md">
                    💾 Record Sale
                </button>
            </div>
        </div>

    </form>
</div>
