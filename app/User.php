<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Publication;
use App\Discussion;
use App\Comment;
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //les publications
    public function publications()
    {
        return $this->hasMany('App\Publication');
    }
    //les personnes ajoutées par moi
    public function Added_users()
    {
        return $this->hasMany('App\User','request_sender');
    }
    //mes invitations reçues
    public function requests()
    {
        return $this->hasMany('App\User','request_receiver');
    }
    //les discussions
      public function Sender()
    {
        return $this->hasMany('App\Discussion','user1');
    }
      public function Receiver()
    {
        return $this->hasMany('App\Discussion','user2');
    }
    public function comments()
    {
      return $this->hasMany('App\Comment');
    }

}
