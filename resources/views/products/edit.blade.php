<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ ('Editar producto') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-4">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Editar producto</h2>
                    <a href="{{ route('products.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md shadow-md flex items-center"><i class="bi bi-arrow-left mr-1"></i> Regresar</a>
                </div>
                <div class="row justify-content-center mt-8">
                    <div class="col-md-6">
                        @session('success')
                            <div class="alert alert-success" role="alert">
                                {{ $value }}
                            </div>
                        @endsession

                        <div class="card bg-white dark:bg-gray-800 shadow-sm rounded-lg">
                            <div class="card-body">
                                <form action="{{ route('products.update', $product->id) }}" method="post">
                                    @csrf
                                    @method("PUT")

                                    <div class="mb-4">
                                        <label for="code" class="block text-md font-semibold text-gray-700 dark:text-gray-300 mb-1">Código</label>
                                        <input type="text" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500 @error('code') border-red-500 @enderror" id="code" name="code" value="{{ $product->code }}">
                                        @error('code')
                                            <span class="text-red-500 mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="name" class="block text-md font-semibold text-gray-700 dark:text-gray-300 mb-1">Nombre</label>
                                        <input type="text" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500 @error('name') border-red-500 @enderror" id="name" name="name" value="{{ $product->name }}">
                                        @error('name')
                                            <span class="text-red-500 mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="quantity" class="block text-md font-semibold text-gray-700 dark:text-gray-300 mb-1">Cantidad</label>
                                        <input type="number" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500 @error('quantity') border-red-500 @enderror" id="quantity" name="quantity" value="{{ $product->quantity }}">
                                        @error('quantity')
                                            <span class="text-red-500 mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="price" class="block text-md font-semibold text-gray-700 dark:text-gray-300 mb-1">Precio</label>
                                        <input type="number" step="0.01" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500 @error('price') border-red-500 @enderror" id="price" name="price" value="{{ $product->price }}">
                                        @error('price')
                                            <span class="text-red-500 mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="description_short" class="block text-md font-semibold text-gray-700 dark:text-gray-300 mb-1">Descripción Corta</label>
                                        <textarea class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500 @error('description_short') border-red-500 @enderror" id="description_short" name="description_short">{{ $product->description_short }}</textarea>
                                        @error('description_short')
                                            <span class="text-red-500 mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="description_large" class="block text-md font-semibold text-gray-700 dark:text-gray-300 mb-1">Descripción Larga</label>
                                        <textarea class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500 @error('description_large') border-red-500 @enderror" id="description_large" name="description_large">{{ $product->description_large }}</textarea>
                                        @error('description_large')
                                            <span class="text-red-500 mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="colors" class="block text-md font-semibold text-gray-700 dark:text-gray-300 mb-1">Colores</label>
                                        <input type="text" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500 @error('colors') border-red-500 @enderror" id="colors" name="colors" value="{{ $product->colors }}">
                                        @error('colors')
                                            <span class="text-red-500 mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="category_id" class="block text-md font-semibold text-gray-700 dark:text-gray-300 mb-1">Categoría</label>
                                        <select name="category_id" id="category_id" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                                            <option value="">Seleccionar Categoría</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-red-500 mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-4">
                                        <input type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md shadow-md cursor-pointer" value="Update">
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>    
    </div>
</x-app-layout>
