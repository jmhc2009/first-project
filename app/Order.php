<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['user_id','phone','address','region','city','message','paymentMethod','cost','status','cod','units'];
    
    public function categories()
    {
        //Relación uno a muchos
        return $this->hasMany('App\Category');
    }

    public function user()
    {
        //Relación muchos a uno
        return $this->belongsTo('App\User');
    }

    public function products()
    {
        //Relación muchos a muchos
        return $this->belongsToMany('App\Product')->withPivot('units');

    }
}
