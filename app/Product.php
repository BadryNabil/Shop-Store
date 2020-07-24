<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Product extends Model 
{

    protected $table = 'products';
    public $timestamps = true;
    protected $fillable = array('name', 'price', 'color', 'store_size', 'description','category_id');

    public function products_categorie()
    {
        return $this->belongsTo('Category');
    }
     public function client()
    {
        return $this->belongsToMany('App\Client');
    }

}