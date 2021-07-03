<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'amount',
        'price_perunit',
    ];
    public function supplier()
    {
        return $this->belongsToMany(Supplier::class, 'products_suppliers', 'product_id', 'supplier_id');
    }
}
