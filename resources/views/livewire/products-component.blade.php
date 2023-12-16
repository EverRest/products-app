<div class="container mx-auto p-4">
    <div class="flex flex-wrap -mx-2">
        <div class="w-full lg:w-1/4 px-2">
            <div class="bg-gray-100 p-4 rounded-lg mb-4">
                <div class="mb-4">
                    <h3 class="text-lg font-semibold mb-2" style="color: #2c3e50;">Price Filter</h3>
                    <input type="number" wire:model="priceFrom" placeholder="Min"
                           class="w-full p-2 rounded border border-gray-300 focus:border-blue-400 focus:outline-none">
                    <input type="number" wire:model="priceTo" placeholder="Max"
                           class="w-full p-2 mt-2 rounded border border-gray-300 focus:border-blue-400 focus:outline-none">
                </div>
                <div class="mb-4">
                    <h3 class="text-lg font-semibold mb-2 text-gray-800">Manufacturer</h3>
                    <div class="grid grid-cols-1 gap-2">
                        @foreach($manufacturers as $manufacturer)
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" wire:model="selectedManufacturers"
                                       value="{{ $manufacturer->manufacturer }}"
                                       class="form-checkbox rounded text-blue-600 focus:ring-blue-500 h-5 w-5">
                                <span class="ml-2 text-gray-700">{{ $manufacturer->manufacturer }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="mb-4">
                    <h3 class="text-lg font-semibold mb-2" style="color: #2c3e50;">Engine Type</h3>
                    <select wire:model="engineType"
                            class="w-full p-2 rounded border border-gray-300 focus:border-blue-400 focus:outline-none">
                        <option value="">Select Engine Type</option>
                        <option value="electric">Electric</option>
                        <option value="diesel">Diesel</option>
                        <option value="hybrid">Hybrid</option>
                        <option value="gasoline">Gasoline</option>
                    </select>
                </div>
                <div class="mb-4">
                    <h3 class="text-lg font-semibold mb-2" style="color: #2c3e50;">Engine</h3>
                    <select wire:model="engine"
                            class="w-full p-2 rounded border border-gray-300 focus:border-blue-400 focus:outline-none">
                        <option value="">Select Engine</option>
                        <option value="1.6">Up to 1.6</option>
                        <option value="1.6-2">1.6 - 2.0</option>
                        <option value="2-3">2.0 - 3.0</option>
                        <option value="3-5">3.0 - 5.0</option>
                        <option value="5+">5.0+</option>
                    </select>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-2" style="color: #2c3e50;">Wheel Size</h3>
                    <select wire:model="wheel"
                            class="w-full p-2 rounded border border-gray-300 focus:border-blue-400 focus:outline-none">
                        <option value="">Select Wheel Size</option>
                        @foreach([13, 14, 15, 16, 17, 18, 19, 20, 21, 22] as $size)
                            <option value="{{ $size }}">{{ $size }}"</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-3/4 px-2">
            <div class="bg-gray-100 p-4 rounded-lg">
                <div class="mb-4">
                    <label for="search">
                        <input id="search" name="search" type="text" wire:model.debounce.300ms="searchTerm"
                               placeholder="Search products..."
                               class="w-full p-2 rounded border border-gray-300 focus:border-blue-400 focus:outline-none">
                    </label>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @forelse ($products as $product)
                        <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300 ease-in-out">
                            <img src="{{ $product->image }}" alt="{{ $product->name }}"
                                 class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h5 class="text-lg font-semibold mb-2" style="color: #16a085;">{{ $product->name }}</h5>
                                <p class="text-sm text-gray-600 mb-1">Manufacturer: {{ $product->manufacturer }}</p>
                                <p class="text-lg font-semibold text-gray-800">Price:
                                    ${{ number_format($product->price, 2) }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-600">No products found.</p>
                    @endforelse
                </div>
                <div class="mt-4">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
