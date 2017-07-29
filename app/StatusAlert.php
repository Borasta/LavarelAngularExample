<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusAlert extends Model
{
    protected $fillable = [
        'status',
    ];

		public function alerts()
    {
        return $this->hasMany('App\Alert');
    }
}
