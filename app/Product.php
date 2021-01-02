<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['category_id','name','title', 'description', 'price','priceRetail','stock','offer','date','image'];

    public function user()
    {
         //Relación muchos a uno
        return $this->belongsTo('App\User', 'user_id');
    }

    public function category()
    {
        //Relación muchos a uno
        return $this->belongsTo('App\Category','category_id');
    }

    public function orders()
    {
        //Relación muchos a muchos
        return $this->belongsToMany('App\Order')->withTimestamps();
    }


}
