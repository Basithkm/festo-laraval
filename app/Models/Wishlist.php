<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Wishlist extends Model
{
    protected $table = 'wishlist';
    use HasFactory;
}
