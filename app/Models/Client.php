<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'rs',
        'commercial_name',
        'rfc',
        'curp',
        'address',
        'birthdate',
    ];
}
