<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Purchase extends Model
{
    protected $table = 'purchase';
    use HasFactory;

    public function scopeIntwodate($query,$from_date,$to_date)
    {
         return $query->where(function($query)use ($from_date,$to_date) {
                            if ($from_date && $to_date) {
                                $query->whereBetween('purchase_date', [$from_date, $to_date]);
                            }
                             });
    } 
}
