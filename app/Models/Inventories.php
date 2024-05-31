<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventories extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_product',
        'id_category',
        'entry_date',
        'departure_date',
        'reason',
        'shift',
        'quantity',
    ];


    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
}
