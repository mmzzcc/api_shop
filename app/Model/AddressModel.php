<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AddressModel extends Model
{
    //
    public $table='shop_order_address';
    public $primarykeys='id';
    public $timestamps= false;
}