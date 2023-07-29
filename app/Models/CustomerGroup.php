<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class CustomerGroup extends Model
{
    protected $table = 'customer_group';
    use HasFactory;
}
