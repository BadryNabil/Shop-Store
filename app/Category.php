<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Category extends Model 
{

    protected $table = 'Categories';
    public $timestamps = true;
    protected $fillable = array('name');

    public function category_products()
    {
        return $this->hasMany('Product');
    }

}