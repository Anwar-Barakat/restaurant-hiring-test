<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'price',
        'discount',
        'gst',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'is_featured',
        'is_best_seller',
        'is_active',
    ];

    public function scopeActive($query)
    {
        return $query->where(['is_active' => 1]);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id')->select('id', 'parent_id', 'name', 'url');
    }

    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id')->select('id', 'parent_id', 'name', 'url')->where('parent_id', '!=', 0);
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'item_menu');
    }
}
