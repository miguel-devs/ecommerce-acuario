<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'category_id',
        'brand_id',
        'nombre',
        'descripcion',
        'precio',
        'detalles',
        'imagen',
        'activo'

    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')->select(["id","nombre","url_clean"]);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class)->select(["id","nombre","url_clean"]);
    }
    public function offer()
    {
        return $this->hasOne(Offer::class)->select(["product_id","descuento","desde","hasta"])
               ->whereDate('desde', '<=', date("Y-m-d"))
               ->whereDate('hasta', '>=', date("Y-m-d"));
    }
    public function categoryOne()
    {
        return $this->hasOne(Category::class, 'category_id', 'id')->select(["id","nombre","url_clean"]);
    }
    public function brandOne()
    {
        return $this->hasOne(Brand::class)->select(["id","nombre","url_clean"]);
    }

    public function productOptions(){
        return $this->hasMany(ProductOption::class)->select(["id","product_id","caracteristicas"]);
    }
    public function imageProducts(){
        return $this->hasMany(Image::class)->select(['id','product_id', 'nombre']);
    }
    public function productOffers(){
        return $this->hasMany(Offer::class)->select(["id","product_id","descuento","desde","hasta"])->orderBy("id","desc");
    }

    
   

    
}
