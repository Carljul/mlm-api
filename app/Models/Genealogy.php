<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genealogy extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'downline_id',
    ];
}
