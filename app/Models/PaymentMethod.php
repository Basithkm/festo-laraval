<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class PaymentMethod extends Model
{
    protected $table = 'payment_method';
    use HasFactory;
}