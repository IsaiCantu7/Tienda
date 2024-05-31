<?php
// app/Models/Sales.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $fillable = [
        'name_product', 'name_category', 'name_customer', 'date_sale', 'subtotal', 'iva', 'total'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'name_product');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'name_category');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'name_customer');
    }
}
