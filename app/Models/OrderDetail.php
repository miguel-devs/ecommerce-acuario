<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'product_id',
        'product_option_id',
        'descripcion',
        'precio',
        'cantidad'
    ];

    
    public function productOrder(){
        return $this->hasMany(Product::class, 'id', 'product_id')->select(["id","category_id","brand_id","nombre","descripcion","precio","imagen","activo"])->with(["brand","category","offer"]);
    }


}
