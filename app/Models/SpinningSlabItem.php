<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpinningSlabItem extends Model
{

    protected $table = 'spinning_wheel_item';
    use HasFactory;
    public function slab(){ 
        
        return $this->hasMany('App\Models\SpinningSlab','id','slab_id')->select(['name as slab_name','id']);
     }
}
