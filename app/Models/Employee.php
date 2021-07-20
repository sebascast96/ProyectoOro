<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'email',
        'rfc',
        'curp',
        'address',
        'birthdate',
    ];
    use HasFactory;

    public function sale()
    {
        return $this->hasMany(Sale::class);
    }
}
