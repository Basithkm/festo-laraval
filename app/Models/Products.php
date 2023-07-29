<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Products extends Model
{
    //


    protected $table = 'products';
    public function color(){ 
        
      return $this->hasMany('App\Models\AttributesValue','attribute_value_id','color_id')->select(['attribute_value as color','attribute_color_code']);
   }
    public function scopeCategory($query,$category)
    {
         return $query->where(function($query)use ($category) {
                            // if ($category) {
                                $query->where('category_id', $category);
                            // }
                             });
    }
    public function scopeBrand($query,$brand)
    {
         return $query->where(function($query)use ($brand) {
                            // if ($brand) {
                                $query->where('product_brand', $brand);
                            // }
                             });
    }

    public function scopeCountryActive($query,$country)
    {
         return $query->where(function($query)use ($country) {
                             if ($country) {
                                $query->where($country,'1');
                             }
                            //  else{
                            //     $query->where('KWD','1');
                            //  }
                             });
    }

    public function scopeCountryDeactive($query,$country)
    {
         return $query->where(function($query)use ($country) {
                             if ($country) {
                                $query->where($country, '0');
                             }
                            //  else{
                            //     $query->where('KWD','0');
                            //  }
                             });
    }
    public function scopeNonAttribute($query)
    {
         return $query->where(function($query) {
                                $query->where('if_attribute', 0);
                             });
    }
    public function scopeYesAttribute($query)
    {
         return $query->where(function($query) {
                                $query->where('if_attribute', 1);
                             });
    }
    public function scopePerant($query)
    {
         return $query->where(function($query) {
                                $query->where('parent_id', 0);
                             });
    }
    public function scopePriceBetween($query,$min,$max)
    {
         return $query->where(function($query)use ($min,$max) {
                             if ($min && $max) {
                                $query->whereBetween('product_price_offer',[$min,$max]);
                             }
                            //  else{
                            //     $query->where('KWD','0');
                            //  }
                             });
    }
    public function scopeBrandIn($query,$brand)
    {
         return $query->where(function($query)use ($brand) {
                             if ($brand) {
                                $query->whereIn('product_brand',$brand);
                             }
                            //  else{
                            //     $query->where('KWD','0');
                            //  }
                             });
    }
    public function scopeColorIn($query,$color)
    {
         return $query->where(function($query)use ($color) {
                             if ($color) {
                                $query->whereIn('color_id',$color);
                             }
                            //  else{
                            //     $query->where('KWD','0');
                            //  }
                             });
    }
  
}
