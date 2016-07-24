<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Publication;
use App\User;
class Comment extends Model
{
    protected $fillable = ['content'];
    public function publication()
    {
    	return $this->belongsTo('App\Publication');
    }
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    
}
