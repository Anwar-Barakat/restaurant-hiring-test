<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'name',
        'url',
        'discount',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'is_active',
    ];
}