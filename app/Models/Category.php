<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','description'];

    public function children()
    {
        return $this->belongsToMany(Category::class, 'category_category', 'parent_category_id', 'category_id');
    }

    public function parents()
    {
        return $this->belongsToMany(Category::class, 'category_category', 'parent_category_id', 'category_id');
    }

}
