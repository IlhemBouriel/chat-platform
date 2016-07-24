<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Message;
class Discussion extends Model
{
    protected $fillable = ['nb_msg'];
    public function user1()
    {
    	return $this->belongsTo('App\User','user1');
    }
     public function user2()
    {
    	return $this->belongsTo('App\User','user2');
    }
    public function messages()
    {
    	return $this->hasMany('App\Message');
    }
}
