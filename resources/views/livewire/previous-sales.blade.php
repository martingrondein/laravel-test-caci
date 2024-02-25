<div>
    <h2 class="py-4 text-xl font-semibold text-gray-800">Previous Sales</h2>

    <div class="min-w-full overflow-x-auto border-2">
        <div class="overflow-y-auto h-96">
            <div class="grid grid-cols-3 gap-6 p-5 bg-gray-50">
                <div class="text-xs font-bold tracking-wider text-left text-gray-600 uppercase">Quantity</div>
                <div class="text-xs font-bold tracking-wider text-left text-gray-600 uppercase">Unit Cost</div>
                <div class="text-xs font-bold tracking-wider text-left text-gray-600 uppercase">Selling Price</div>
            </div>

            @foreach ($sales as $index => $sale)
                <div
                    class="grid grid-cols-3 gap-2 px-6 py-2 bg-white {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-100' }}">
                    <div class="whitespace-nowrap">{{ $sale->quantity }}</div>
                    <div class="whitespace-nowrap">{{ money($sale->unit_cost * 100, 'GBP') }}</div>
                    <div class="whitespace-nowrap">{{ $sale->selling_price }}</div>
                </div>
            @endforeach
        </div>
    </div>


</div>
