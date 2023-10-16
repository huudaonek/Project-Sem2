<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['name', 'product_id', 'url'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

