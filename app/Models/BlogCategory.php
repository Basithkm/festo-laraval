<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class BlogCategory extends Model
{
    protected $table = 'blog_category';
    use HasFactory;
}
