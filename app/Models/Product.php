<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id', 'product_code'];
//    protected $fillable = ['price', 'balance', 'available', 'unit'];
}
