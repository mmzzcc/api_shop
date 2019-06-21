<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    //
    public $table='shop_cart';
    public $primarykeys='cart_id';
    public $timestamps= false;
}