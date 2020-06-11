<?php

namespace TestCMS\Models;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable /*implements JWTSubject*/
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','status','ip','uuid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

//    public function getJWTIdentifier()
//    {
//        return $this->getKey();// TODO: Implement getJWTIdentifier() method.
//    }
//
//    public function getJWTCustomClaims()
//    {
//        return [];// TODO: Implement getJWTCustomClaims() method.
//    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
