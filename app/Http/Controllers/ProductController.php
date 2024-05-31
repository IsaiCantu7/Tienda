<?php

// app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    // Método para mostrar la lista de productos
    public function index() : View
    {
        return view('products.index', [
            'products' => Product::latest()->paginate(4)
        ]);
    }

    // Método para mostrar el formulario de creación de productos
    public function create() : View
    {
        // Obtenemos todas las categorías para el formulario
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    // Método para almacenar un nuevo producto en la base de datos
    public function store(StoreProductRequest $request) : RedirectResponse
    {
        // Validamos los datos del formulario
        $validatedData = $request->validated();
        // Obtenemos la categoría seleccionada del formulario y la agregamos a los datos validados
        $validatedData['category_id'] = $request->input('category_id');
        $validatedData['description_short'] = $request->input('description_short');
        $validatedData['description_large'] = $request->input('description_large');
        $validatedData['colors'] = $request->input('colors');
        // Creamos el nuevo producto en la base de datos
        Product::create($validatedData);

        // Redireccionamos de vuelta a la lista de productos con un mensaje de éxito
        return redirect()->route('products.index')
                ->withSuccess('Nuevo producto agregado.');
    }

    // Método para mostrar los detalles de un producto específico
    public function show(Product $product) : View
    {
        return view('products.show', compact('product'));
    }

    // Método para mostrar el formulario de edición de un producto
    public function edit(Product $product) : View
    {
        // Obtenemos todas las categorías para el formulario de edición
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    // Método para actualizar un producto en la base de datos
    public function update(UpdateProductRequest $request, Product $product) : RedirectResponse
    {
        // Validamos los datos del formulario
        $validatedData = $request->validated();
        // Obtenemos la categoría seleccionada del formulario y la agregamos a los datos validados
        $validatedData['category_id'] = $request->input('category_id');
        $validatedData['description_short'] = $request->input('description_short');
        $validatedData['description_large'] = $request->input('description_large');
        $validatedData['colors'] = $request->input('colors');

        // Actualizamos el producto en la base de datos
        $product->update($validatedData);

        // Redireccionamos de vuelta a la lista de productos con un mensaje de éxito
        return redirect()->route('products.index')
                ->withSuccess('Producto actualizado con éxito.');
    }

    // Método para eliminar un producto de la base de datos
    public function destroy(Product $product) : RedirectResponse
    {
        // Eliminamos el producto de la base de datos
        $product->delete();

        // Redireccionamos de vuelta a la lista de productos con un mensaje de éxito
        return redirect()->route('products.index')
                ->withSuccess('Producto eliminado con éxito.');
    }
}
