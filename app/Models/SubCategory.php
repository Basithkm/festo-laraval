<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class SubCategory extends Model
{
    protected $table = 'sub_category';
    use HasFactory;
    public function Category(){ 
        
        return $this->hasMany('App\Models\Category','id','category_id')->select(['cat_name','id']);
     }
}
