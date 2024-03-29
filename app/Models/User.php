<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'role_id',
        'password',
        'is_active',
        'person_id',
        'cellphone_number',
        'email_verified_at',
        'genealogy_invitation_code',
        'cellphone_number_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**===========================================
     * RELATIONSHIP
     ===========================================*/

    /**
     * Person one to one relation
     */
    public function person()
    {
        return $this->hasOne(\App\Models\Person::class, 'id', 'person_id');
    }

    /**
     * Store one to one relation
     */
    public function store()
    {
        return $this->hasOne(\App\Models\Store::class, 'id', 'user_id');
    }
}
