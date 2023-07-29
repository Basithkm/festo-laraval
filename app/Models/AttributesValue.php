<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class AttributesValue extends Model
{
    protected $table = 'attributes_value';
    use HasFactory;
}
