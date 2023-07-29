<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class TodaysDeals extends Model
{
    protected $table = 'todays_deals';
    use HasFactory;
}
