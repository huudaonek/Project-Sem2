<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'category','available','description'];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
     public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
