<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class ProductStockList extends Model
{
    protected $table = 'product_stock_list';
    use HasFactory;
}
