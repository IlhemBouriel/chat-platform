<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Publication extends Model
{
    protected $fillable = ['content', 'type'];

    public function user()
    {
       return $this->belongsTo('App\User');
    }
}
