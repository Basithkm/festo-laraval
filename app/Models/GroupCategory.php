<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class GroupCategory extends Model
{
    protected $table = 'group_category';
    use HasFactory;
    public function SubCategory(){ 
        
        return $this->hasMany('App\Models\SubCategory','id','sub_categoryid')->select(['sub_cat_name','id']);
     }
}
