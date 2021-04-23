<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

	protected $table = 'configurations';
    public $timestamps = true;

    
    protected $fillable = ['config_name','config_value','short_code'];
}
