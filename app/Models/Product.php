<?php

// app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Utilizamos el trait HasFactory para generar factories para el modelo
    use HasFactory;

    // Especificamos los campos que pueden ser asignados masivamente
    protected $fillable = [
        'code',
        'name',
        'quantity',
        'price',
        'description_short',
        'description_large',
        'colors',
        'category_id',
    ];

    // Definimos la relación entre Producto y Categoría
    public function category()
    {
        // Un producto pertenece a una categoría
        return $this->belongsTo(Category::class);
    }
}
