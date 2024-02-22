<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('New ☕️ Sales') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @csrf {{-- CSRF protection --}}

                    <form method="POST" action="/your-sales-processing-route">
                        <div class="flex flex-row ">
                            <div class="flex-col-3 ">
                                <label for="quantity" class="text-gray-700">Quantity</label>
                                <input type="number" id="quantity" name="quantity" min="1" required
                                    class="px-3 py-2 border border-gray-300 rounded-md w-28 ">
                            </div>

                            <div class="px-3 flex-col-3 ">
                                <label for="unit_cost" class="text-gray-700 ">Unit Cost (£)</label>
                                <input type="number" id="unit_cost" name="unit_cost" step="0.01" required
                                    class="px-3 py-2 border border-gray-300 rounded-md w-28 ">
                            </div>

                            <div class="px-3 flex-col-3 ">
                                <label for="selling_price" class="text-gray-700 ">Selling Price</label>
                                <input type="text" id="selling_price" name="selling_price" readonly disabled
                                    value="£0.00" class="px-3 py-2 border-none w-28">
                            </div>

                            <div class="px-3 flex-col-3">
                                <button type="submit"
                                    class="px-5 py-2 font-medium text-white bg-indigo-500 rounded-md">
                                    Record Sale
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="py-4 text-xl font-semibold text-gray-800">Previous Sales</h2>

                    <div class="min-w-full overflow-x-auto border-2">
                        <div class="grid grid-cols-3 gap-6 p-6 bg-gray-50">
                            <div class="text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Quantity
                            </div>
                            <div class="text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Unit Cost
                            </div>
                            <div class="text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Selling
                                Price</div>
                        </div>

                        <div class="grid grid-cols-3 gap-6 p-6 bg-white">
                            <div class="whitespace-nowrap">10</div>
                            <div class="whitespace-nowrap">£5.00</div>
                            <div class="whitespace-nowrap">£7.50</div>
                        </div>
                        <div class="grid grid-cols-3 gap-6 p-6 bg-gray-100">
                            <div class="whitespace-nowrap">10</div>
                            <div class="whitespace-nowrap">£5.00</div>
                            <div class="whitespace-nowrap">£7.50</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
