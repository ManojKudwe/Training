<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

	protected $table = 'user';
    public $timestamps = true;

   protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $fillable = [
        'firstname',
		'lastname',
        'email',
        'password',
		'status',
		'role',
    ];

	 protected $hidden = [
        'password',
        'remember_token',
    ];

}

