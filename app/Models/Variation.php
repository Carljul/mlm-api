<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasFactory;

    protected $fillable = [
        'size',
        'color',
        'weight',
        'height',
        'color_name',
        'weight_type',
        'height_type',
        'custom_size',
    ];
}
