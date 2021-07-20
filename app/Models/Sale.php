<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Employee;
use App\Models\Seller;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'sale_date',
        'total_cost',
        'payment_method_id',
        'seller_id',
        'employee_id',
        'client_id'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_sales', 'sale_id', 'product_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function Client()
    {
        return $this->belongsTo(Client::class);
    }


    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

}
