<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    use HasFactory;
	protected $table = 'coupon';
    public $timestamps = true;

    
    protected $fillable = ['coupon','coupon_expiry_date','value','status'];
}
