<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'password','phone','email','api_token');

    

    public function posts()
    {
        return $this->belongsToMany('App\Product');
    }

   
   
    protected $hidden = [
        'password', 'api_token',
    ];

}
