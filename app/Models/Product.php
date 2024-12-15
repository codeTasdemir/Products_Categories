<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Carbon\Carbon;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','price','image'];

    
    public function categories(){
        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id');

    }

    //Tarih değeri tüm projede bu formatta daha iyi
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d m Y');
    }

}
