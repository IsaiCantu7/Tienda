<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sales::paginate(10);
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        return view('sales.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_product' => 'required|integer',
            'id_category' => 'required|integer',
            'id_customer' => 'required|integer',
            'date_sale' => 'required|date',
            'subtotal' => 'required|numeric',
            'iva' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        Sales::create($request->all());

        return redirect()->route('sales.index')->with('success', 'Venta creada exitosamente.');
    }

    public function show(Sales $sale)
    {
        return view('sales.show', compact('sale'));
    }

    public function edit(Sales $sale)
    {
        return view('sales.edit', compact('sale'));
    }

    public function update(Request $request, Sales $sale)
    {
        $request->validate([
            'id_product' => 'required|integer',
            'id_category' => 'required|integer',
            'id_customer' => 'required|integer',
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
