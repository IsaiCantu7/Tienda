<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sales::with(['product', 'category', 'customer'])->paginate(10);
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $products = Product::all();
        $categories = Category::all();
        $customers = Customer::all();
        return view('sales.create', compact('products', 'categories', 'customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_product' => 'required|string',
            'name_category' => 'required|string',
            'name_customer' => 'required|string',
            'date_sale' => 'required|date',
            'subtotal' => 'required|numeric',
            'iva' => 'required|numeric',
            'total' => 'required|numeric',
        ]);
        // Iniciar la transacción
        DB::beginTransaction();

        try {
            // Crear la venta
            $sale = Sales::create($request->all());

            DB::commit(); // Confirmar la transacción

            return redirect()->route('sales.index')->with('success', 'Venta creada exitosamente.');

        } catch (\Exception $e) {
            // Deshacer la transacción
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show(Sales $sale)
    {
        return view('sales.show', compact('sale'));
    }

    public function edit($id)
    {
        $sale = Sales::findOrFail($id);
        $products = Product::all();
        $categories = Category::all();
        $customers = Customer::all();

        return view('sales.edit', compact('sale', 'products', 'categories', 'customers'));
    }

    public function update(Request $request, Sales $sale)
    {
        $request->validate([
            'name_product' => 'required|string',
            'name_category' => 'required|string',
            'name_customer' => 'required|string',
            'date_sale' => 'required|date',
            'subtotal' => 'required|numeric',
            'iva' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        $sale->update($request->all());

        return redirect()->route('sales.index')->with('success', 'Venta actualizada exitosamente.');
    }

    public function destroy(Sales $sale)
    {
        $sale->delete();
        return redirect()->route('sales.index')->with('success', 'Venta eliminada exitosamente.');
    }
}
