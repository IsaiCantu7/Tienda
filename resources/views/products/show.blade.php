<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Show products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-4">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Show Products</h2>
                    <a href="{{ route('products.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md shadow-md flex items-center"><i class="bi bi-arrow-left mr-1"></i> Back</a>
                </div>


                @csrf
                @method('PUT')

                <div>
                    <label for="code" class="block text-md font-semibold text-gray-700 dark:text-gray-300 mb-1">Code</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" id="code" name="code" value="{{ $product->code }}" readonly>
                </div>

                <div>
                    <label for="name" class="block text-md font-semibold text-gray-700 dark:text-gray-300 mb-1">Name</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" id="name" name="name" value="{{ $product->name }}" readonly>
                </div>

                <div>
                    <label for="quantity" class="block text-md font-semibold text-gray-700 dark:text-gray-300 mb-1">Quantity</label>
                    <input type="number" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" id="quantity" name="quantity" value="{{ $product->quantity }}" readonly>
                </div>

                <div>
                    <label for="price" class="block text-md font-semibold text-gray-700 dark:text-gray-300 mb-1">Price</label>
                    <input type="number" step="0.01" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" id="price" name="price" value="{{ $product->price }}" readonly>
                </div>

                <div>
                    <label for="description" class="block text-md font-semibold text-gray-700 dark:text-gray-300 mb-1">Description</label>
                    <textarea class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" id="description" name="description" readonly>{{ $product->description }}</textarea>
                </div>
                
                <div>
                    <label for="category_id" class="block text-md font-semibold text-gray-700 dark:text-gray-300 mb-1">Category</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" id="category_id" name="category_id" value="{{ $product->category->name }}" readonly>
                </div>
        </div>
    </div>
</div>

</x-app-layout>
