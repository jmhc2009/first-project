<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','surname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function adminlte_image(){

        return 'https://picsum.photos/300/300';
    }
    public function adminlte_desc()
    {
        return 'Administrador del sitio web';
    }

    public function adminlte_profile_url()
    {
        return 'profile/username';
    }
    public function products()
    {
        //Relación uno a muchos
        return $this->hasMany('App\Products');
    }

    public function hasRoles($role)
    {
        return $this->role === $role;
    }
}
