<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $incrementing = false;
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'category_id',
        'slug',
        'name',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'image',
        'status',
        'trending',
        'meta_title',
        'meta_descrip',
        'meta_keywords',
    ];

    public function categories()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }
}
