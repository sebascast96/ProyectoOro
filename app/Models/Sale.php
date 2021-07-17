<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'sale_date',
        'total_cost',
        'payment_method_id',
        'seller_id',
        'employee_id',
    ];
}
