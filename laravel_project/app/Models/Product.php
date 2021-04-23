<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
	protected $table = 'product';
    public $timestamps = true;

    protected $casts = [
        'price' => 'float'
    ];

    protected $fillable = ['pname','price'];

	public function product_categorys()
    {
        return $this->hasMany('App/Product_categorys');
    }
	public function product_images()
    {
        return $this->hasMany('App/Product_images');
    }
}
