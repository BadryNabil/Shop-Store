<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientProduct extends Model
{

    protected $table = 'client_product';
    public $timestamps = true;
    protected $fillable = array('product_id', 'client_id');

}
