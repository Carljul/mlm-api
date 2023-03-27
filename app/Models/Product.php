<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'stocks_id',
        'created_by',
        'updated_by',
        'variation_id',
        'product_details_id',
    ];
}
