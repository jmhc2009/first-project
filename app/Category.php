<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name'];


    public function products()
    {
        //Relacion one to many/ uno a muchos
        return $this->hasMany('App\Product');
    }

    public function orders()
    {
        //Relacion one to many/ uno a muchos
        return $this->hasMany('App\Order');
    }    

    public function user()
    {
         //Relación muchos a uno
        return $this->belongsTo('App\User', 'user_id');
    }
}

