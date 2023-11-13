<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
