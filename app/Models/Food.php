<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Food extends Model
{
    // 👇 Ini penting supaya Laravel tahu kita pakai tabel 'foods'
    protected $table = 'foods';

    protected $fillable = [
        'name',
        'description',
        'calories',
        'fat',
        'protein',
        'carbohydrate',
        'cooking_time',
        'ingredients',
        'steps',
        'image',
        'category_id',
    ];

    /**
     * Relasi: Makanan ini milik satu kategori.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
