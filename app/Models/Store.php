<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id'
    ];

    /**===========================================
     * RELATIONSHIP
     ===========================================*/
    /**
     * User one to one relation
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
