<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Venta') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <div class="text-center text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6">
                        {{ __('Crear nueva venta') }}
                    </div>
                    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <form action="{{ route('sales.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name_product" class="block text-md font-semibold text-gray-700 dark:text-gray-300 mb-1">Producto</label>
                            <select name="name_product" id="name_product" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                                <option value="">Seleccionar Producto</option>
                                @foreach ($products as $product)
                                <option value="{{ $product->name }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="name_category" class="block text-md font-semibold text-gray-700 dark:text-gray-300 mb-1">Categoría</label>
                            <select name="name_category" id="name_category" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                                <option value="">Seleccionar Categoría</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="name_customer" class="block text-md font-semibold text-gray-700 dark:text-gray-300 mb-1">Cliente</label>
                            <select name="name_customer" id="name_customer" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                                <option value="">Seleccionar Cliente</option>
                                @foreach ($customers as $customer)
                                <option value="{{ $customer->first_name }}">{{ $customer->first_name }} {{ $customer->last_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="date_sale" class="block text-md font-semibold text-gray-700 dark:text-gray-300 mb-1">{{ __('Date Sale') }}</label>
                            <input type="date" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500 @error('date_sale') border-red-500 @enderror" id="date_sale" name="date_sale" value="{{ old('date_sale') }}">
                            @error('date_sale')
                                <span class="text-red-500 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="subtotal" class="block text-md font-semibold text-gray-700 dark:text-gray-300 mb-1">{{ __('Subtotal') }}</label>
                            <input type="text" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500 @error('subtotal') border-red-500 @enderror" id="subtotal" name="subtotal" value="{{ old('subtotal') }}">
                            @error('subtotal')
                                <span class="text-red-500 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="iva" class="block text-md font-semibold text-gray-700 dark:text-gray-300 mb-1">{{ __('IVA') }}</label>
                            <input type="text" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500 @error('iva') border-red-500 @enderror" id="iva" name="iva" value="{{ old('iva') }}">
                            @error('iva')
                                <span class="text-red-500 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="total" class="block text-md font-semibold text-gray-700 dark:text-gray-300 mb-1">{{ __('Total') }}</label>
                            <input type="text" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500 @error('total') border-red-500 @enderror" id="total" name="total" value="{{ old('total') }}">
                            @error('total')
                                <span class="text-red-500 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <input type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md shadow-md cursor-pointer" value="{{ __('Create Sale') }}">
                        </div>
                    </form>
               
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
