<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Discussion;
class Message extends Model
{
    protected $fillable = ['content', 'sending_date','seen'];

    public function sender()
    {
    	return $this->belongsTo('App\User','sender');
    }
    public function receiver()
    {
    	return $this->belongsTo('App\User','receiver');
    }
    public function discussion()
    {
    	return $this->belongsTo('App\Discussion');
    }

}
