<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = 'persons';

    protected $fillable = [
        'suffix',
        'gender',
        'lastname',
        'firstname',
        'birthdate',
        'middlename',
        'civil_status',
    ];

    protected $appends = [
        'fullname'
    ];

    // Appends
    public function getFullnameAttribute()
    {
        return $this->firstname.' '.($this->middlename ? substr($this->middlename, 0, 1).'.' : '').' '.$this->lastname.($this->suffix ? ' '.$this->suffix : '');
    }
}
