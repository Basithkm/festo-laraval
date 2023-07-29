<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class ProductsAttributes extends Model
{
    protected $table = 'products_attributes';
    use HasFactory;
}
